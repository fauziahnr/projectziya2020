<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//HALAMAN LOGIN
	public function index()
	{
		// Validasi
		$this->form_validation->set_rules('username','Username','required', array('required' => '%s harus diisi'));

		$this->form_validation->set_rules('password','Password','required', array('required' => '%s harus diisi'));
		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//  proses ke simple login
			$this->simple_login->login($username,$password);
		}
		
		// end validasi
		

		$data = array('title' => 'Login Admin Sebar');
		$this->load->view('login/list', $data, FALSE);
	}
	// FUNGSI LOGOUT
	public function logout()
	{
		// Ambil fungsi logout dari simple login
		$this->simple_login->logout();
	}


	private function _sendEmail($token, $type)	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => '(GANTI EMAILMU)',
			'smtp_pass' => '(GANTI PASSWORDMU)',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n", 
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('GANTI EMAILMU', 'Admin Web Sebar');
		$this->email->to($this->input->post('email'));
		

		if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset password : <a href="' . base_url() . 'login/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if($this->email->send()){
			return true;
		}else{
			echo $this->email->print_debugger();
			die;
		}
		
	}
	public function forgotPassword(){

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			// $data['title']	= 'Lupa Password';
			// $data['isi']	= 'login/lupapassword';

			// $this->load->view('layout/wrapper', $data);

			$data = array('title' => 'Login Admin Sebar');
			$this->load->view('login/lupapassword', $data, FALSE);
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('users', ['email'=> $email])->row_array();

			if ($user) {

				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token'			=> $token,
					'tanggal_daftar'=> time()
				];

				$this->db->insert('users_token', $user_token);

				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please Check your email to reset your password !</div>');
				redirect('login/forgotPassword');

			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered !</div>');
				redirect('login/forgotPassword','refresh');
			}
		}

	}

	public function resetpassword(){
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$users = $this->db->get_where('users', ['email' => $email])->row_array();

		if ($users) {
			$users_token = $this->db->get_where('users_token', ['token' => $token])->row_array();
			if ($users_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			}else{
				$this->session->set_flashdata('info', 'Reset password gagal !');
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('info', 'Reset password gagal !');
			redirect('login');
		}
	}


	public function changePassword()	{

		if (!$this->session->userdata('reset_email')) {
			redirect('masuk');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Reset Password';
			// $data = array('title'	=> 'Login Pelapak',
			// $data['isi']	= 'login/resetpassword';

			$this->load->view('login/resetpassword', $data);
			// $this->load->view('signin/resetpassword', $data);
		} else {
			$password = SHA1($this->input->post('password1'));
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('users');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('info', 'Password berhasil diubah!');
			redirect('login');
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */