<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelapak_model');
	}

	// Halaman Signin
	public function index()
	{
		// Validasi
		$this->form_validation->set_rules('email_pelapak','Email/username','required', array('required' => '%s harus diisi'));

		$this->form_validation->set_rules('password','Password','required', array('required' => '%s harus diisi'));
		if($this->form_validation->run())
		{
			$email_pelapak = $this->input->post('email_pelapak');
			$password = $this->input->post('password');
			//  proses ke simple login
			$this->simple_pelapak->login($email_pelapak,$password);
		}
		
		// end validasi

		$data = array('title'	=> 'Login Pelaku Usaha',
			'isi'	=> 'signin/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
		
	}
	// Logout
	public function logout()
	{
		// Ambil fungsi logout di Simple_pelapak yang udah di set di aouto load libraries
		$this->simple_pelapak->logout(); 
	}


	private function _sendEmail($token, $type)	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'Ganti Email Anda',
			'smtp_pass' => 'Ganti Password Anda',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n", 
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('GANTI EMAIL ANDA', 'Admin Fe-Preneur');
		$this->email->to($this->input->post('email_pelapak'));
		

		if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset password : <a href="' . base_url() . 'signin/resetpassword?email_pelapak=' . $this->input->post('email_pelapak') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if($this->email->send()){
			return true;
		}else{
			echo $this->email->print_debugger();
			die;
		}
		
	}


	public function forgotPassword(){

		$this->form_validation->set_rules('email_pelapak', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$data['title']	= 'Lupa Password';
			$data['isi']	= 'signin/lupapassword';

			$this->load->view('layout/wrapper', $data);
		} else {
			$email = $this->input->post('email_pelapak');
			$user = $this->db->get_where('pelapak', ['email_pelapak'=> $email])->row_array();

			if ($user) {

				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email_pelapak' => $email,
					'token'			=> $token,
					'tanggal_daftar'=> time()
				];

				$this->db->insert('pelapak_token', $user_token);

				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please Check your email to reset your password !</div>');
				redirect('signin/forgotPassword');

			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered !</div>');
				redirect('signin/forgotPassword','refresh');
			}
		}

	}

	public function resetpassword(){
		$email_pelapak = $this->input->get('email_pelapak');
		$token = $this->input->get('token');

		$users = $this->db->get_where('pelapak', ['email_pelapak' => $email_pelapak])->row_array();

		if ($users) {
			$users_token = $this->db->get_where('pelapak_token', ['token' => $token])->row_array();
			if ($users_token) {
				$this->session->set_userdata('reset_email', $email_pelapak);
				$this->changePassword();
			}else{
				$this->session->set_flashdata('info', 'Reset password gagal !');
				redirect('signin');
			}
		}else{
			$this->session->set_flashdata('info', 'Reset password gagal !');
			redirect('signin');
		}
	}


	public function changePassword()	{

		if (!$this->session->userdata('reset_email')) {
			redirect('signin');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|min_length[8]|matches[password1]');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Reset Password';
			// $data = array('title'	=> 'Login Pelaku Usaha',
			$data['isi']	= 'signin/resetpassword';
		
		$this->load->view('layout/wrapper', $data);
			// $this->load->view('signin/resetpassword', $data);
		} else {
			$password = SHA1($this->input->post('password1'));
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email_pelapak', $email);
			$this->db->update('pelapak');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('info', 'Password berhasil diubah!');
			redirect('signin');
		}
	}


}

/* End of file Signin.php */
/* Location: ./application/controllers/Signin.php */