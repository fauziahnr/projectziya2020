<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	// Login pelanggan
	public function index()
	{
		// Validasi
		$this->form_validation->set_rules('email_pelanggan','Email/username','required', array('required' => '%s harus diisi'));

		$this->form_validation->set_rules('password','Password','required', array('required' => '%s harus diisi'));
		if($this->form_validation->run())
		{
			$email_pelanggan = $this->input->post('email_pelanggan');
			$password = $this->input->post('password');
			//  proses ke simple login
			$this->simple_pelanggan->login($email_pelanggan,$password);
		}
		
		// end validasi

		$data = array( 'title'	=> 'Login Pelanggan',
			'isi'	=> 'masuk/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
		
	}

	// Logout
	public function logout()
	{
		// Ambil fungsi logout di Simple_pelanggan yang udah di set di aouto load libraries
		$this->simple_pelanggan->logout(); 
	}

	private function _sendEmail($token, $type)	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'fauziyah.rahma50@gmail.com',
			'smtp_pass' => 'xmkbpdx-72',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n", 
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('fauziyah.rahma50@gmail.com', 'Admin Female Preneur');
		$this->email->to($this->input->post('email_pelanggan'));
		

		if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset password : <a href="' . base_url() . 'masuk/resetpassword?email_pelanggan=' . $this->input->post('email_pelanggan') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if($this->email->send()){
			return true;
		}else{
			echo $this->email->print_debugger();
			die;
		}
		
	}
	public function forgotPassword(){

		$this->form_validation->set_rules('email_pelanggan', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$data['title']	= 'Lupa Password';
			$data['isi']	= 'masuk/lupapassword';

			$this->load->view('layout/wrapper', $data);
		} else {
			$email = $this->input->post('email_pelanggan');
			$user = $this->db->get_where('pelanggan', ['email_pelanggan'=> $email])->row_array();

			if ($user) {

				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email_pelanggan' => $email,
					'token'			=> $token,
					'tanggal_daftar'=> time()
				];

				$this->db->insert('pelanggan_token', $user_token);

				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please Check your email to reset your password !</div>');
				redirect('masuk/forgotPassword');

			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered !</div>');
				redirect('masuk/forgotPassword','refresh');
			}
		}

	}

	public function resetpassword(){
		$email_pelanggan = $this->input->get('email_pelanggan');
		$token = $this->input->get('token');

		$users = $this->db->get_where('pelanggan', ['email_pelanggan' => $email_pelanggan])->row_array();

		if ($users) {
			$users_token = $this->db->get_where('pelanggan_token', ['token' => $token])->row_array();
			if ($users_token) {
				$this->session->set_userdata('reset_email', $email_pelanggan);
				$this->changePassword();
			}else{
				$this->session->set_flashdata('info', 'Reset password gagal !');
				redirect('masuk');
			}
		}else{
			$this->session->set_flashdata('info', 'Reset password gagal !');
			redirect('masuk');
		}
	}


	public function changePassword()	{

		if (!$this->session->userdata('reset_email')) {
			redirect('masuk');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|min_length[8]|matches[password1]');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Reset Password';
			// $data = array('title'	=> 'Login Pelapak',
			$data['isi']	= 'masuk/resetpassword';

			$this->load->view('layout/wrapper', $data);
			// $this->load->view('signin/resetpassword', $data);
		} else {
			$password = SHA1($this->input->post('password1'));
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email_pelanggan', $email);
			$this->db->update('pelanggan');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('info', 'Password berhasil diubah!');
			redirect('masuk');
		}
	}

}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */