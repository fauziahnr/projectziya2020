<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	// Halaman Registrasi
	public function index(){
		$this->form_validation->set_rules('nama_pelanggan','Nama Lengkap','required', array( 'required'	=> '%s harus diisi' ));
		$this->form_validation->set_rules('alamat','Alamat','required', array( 'required'	=> '%s harus diisi' ));
		
		// $this->form_validation->set_rules('email_pelanggan','Email','required|valid_email|is_unique[pelanggan.email_pelanggan]',  
		// 	array(  'required'		=> '%s harus diisi',
		// 		'valid_email' 	=> '%s tidak valid',
		// 		'is_unique'		=> '%s sudah terdaftar'));

		$this->form_validation->set_rules('password','Password','required', array( 'required'	=> '%s harus diisi' ));


		if($this->form_validation->run() == FALSE) {
			$x['title'] 	= 'Registrasi Female Preneur';
			$x['isi'] 	= 'registrasi/list';
			$x['data'] = $this->pelanggan_model->get_kota();
			$this->load->view('layout/wrapper', $x);

		// Masuk database
		}else{
			$data = array( 
				'status_pelanggan'	=> 'Pending',
				'nama_pelanggan'	=> $this->input->post('nama_pelanggan'),
				'email_pelanggan'	=> $this->input->post('email_pelanggan'),
				'password'			=> SHA1($this->input->post('password')),
				'alamat'			=> $this->input->post('alamat'),
				'kota'				=> $this->input->post('kota'),
				'kecamatan'			=> $this->input->post('kecamatan'),
				'tanggal_daftar'	=> date('Y-m-d H:i:s')
			);

			$this->db->insert('pelanggan', $data);
			//INI DIKOMENTARIN LG KALO ERROR
			$this->pelanggan_model->tambah($data);
			//sampe sini

			$this->_sendEmail();


			$this->session->set_userdata('email_pelanggan',$this->input->post('email_pelanggan'));
			$this->session->set_userdata('nama_pelanggan',$this->input->post('nama_pelanggan'));


			$this->session->set_flashdata('sukses', 'Registrasi berhasil');
			redirect(base_url('registrasi/sukses'),'refresh');
		}
	// End masuk database

		
	}

	public function get_kecamatan(){
		$id=$this->input->post('id');
		$data=$this->pelanggan_model->get_kecamatan($id);
		echo json_encode($data);
	}


	// Sukses
	public function sukses()
	{
		$data = array( 'title' => ' Registrasi Berhasil',
			'isi'	=> 'registrasi/sukses');
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	private function _sendEmail()	{
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
		$this->email->subject('Testing');
		$this->email->message('Hello Female, Selamat Kamu Telah Bergabung!');
		
		// $this->email->send();
		
		// echo $this->email->print_debugger();
		
		// $this->email->from('fauziyah.rahma50@gmail.com', 'Fauziyah Nur Rahmawati');
		// $this->email->to($this->input->post('email_pelanggan'));

		// if ($type == 'verify') {
		// 	$this->email->subject('Account Verification');
		// 	$this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		// }else if ($type == 'forgot') {
		// 	$this->email->subject('Reset Password');
		// 	$this->email->message('Click this link to reset password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		// }

		if($this->email->send()){
			return true;
		}else{
			echo $this->email->print_debugger();
			die;
		}
		
	}

	public function register(){
		$this->form_validation->set_rules('nama_pelanggan','Nama Lengkap','required', array( 'required'	=> '%s harus diisi' ));
		
		$this->form_validation->set_rules('email_pelanggan','Email','required|valid_email|is_unique[pelanggan.email_pelanggan]',  
			array(  'required'		=> '%s harus diisi',
				'valid_email' 	=> '%s tidak valid',
				'is_unique'		=> '%s sudah terdaftar'));

		$this->form_validation->set_rules('password','Password','required', array( 'required'	=> '%s harus diisi' ));
		// $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
		// $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
		// $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) { 
			$x['title'] 	= 'Registrasi Female Preneur';
			$x['isi'] 	= 'registrasi/list';
			$x['data'] = $this->pelanggan_model->get_kota();
			$this->load->view('layout/wrapper', $x);
		}
		else{

			$nama_pelanggan	= $this->input->post('nama_pelanggan');
			$email_pelanggan	= $this->input->post('email_pelanggan');
			$password			= SHA1($this->input->post('password'));
			$alamat			= $this->input->post('alamat');
			$tanggal_daftar	= date('Y-m-d H:i:s');

			// $email = $this->input->post('email');
			// $password = $this->input->post('password');


			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);

			$user['nama_pelanggan'] = $nama_pelanggan;
			$user['email_pelanggan'] = $email_pelanggan;
			$user['password'] = $password;
			$user['alamat'] = $alamat;
			$user['tanggal_daftar'] = $tanggal_daftar;
			$user['code'] = $code;
			$user['active'] = false;

			$id = $this->pelanggan_model->insert($user);

			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'fauziyah.rahma50@gmail.com',
				'smtp_pass' => 'xmkbpdx-72',
				'smtp_username' => 'Fauziah Nur Rahmawati',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);

			$message =  "
			<html>
			<head>
			<title>Verification Code</title>
			</head>
			<body>
			<h2>Thank you for Registering.</h2>
			<p>Your Account:</p>
			<p>Email: ".$email_pelanggan."</p>
			<p>Password: ".$password."</p>
			<p>Please click the link below to activate your account.</p>
			<h4><a href='".base_url()."registrasi/activate/".$id."/".$code."'>Activate My Account</a></h4>
			</body>
			</html>
			";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($config['smtp_user']);
			$this->email->to($email_pelanggan);
			$this->email->subject('Signup Verification Email');
			$this->email->message($message);


			if($this->email->send()){
				$this->session->set_flashdata('message','Activation code sent to email');
			}
			else{
				$this->session->set_flashdata('message', $this->email->print_debugger());

			}

			redirect('registrasi/register');
		}

	}

	public function activate(){
		$id =  $this->uri->segment(3);
		$code = $this->uri->segment(4);


		$user = $this->users_model->getUser($id);

		if($user['code'] == $code){

			$data['active'] = true;
			$query = $this->users_model->activate($data, $id);

			if($query){
				$this->session->set_flashdata('message', 'User activated successfully');
			}
			else{
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		}
		else{
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}

		redirect('register');

	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */