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

		if($this->form_validation->run())
		{
			$email_pelapak = $this->input->post('email_pelapak');
			//  proses ke simple login
			$this->simple_pelapak->login($email_pelapak);
		}
		
		// end validasi

		$data = array('title'	=> 'Lupa Kata Sandi Pelaku Usaha',
						'isi'	=> 'pelaku_usaha/lupapassword/list'
				);
		$this->load->view('layout/wrapper', $data, FALSE);
		
	}
	// Logout
	public function logout()
	{
		// Ambil fungsi logout di Simple_pelapak yang udah di set di aouto load libraries
		$this->simple_pelapak->logout(); 
	}


}

/* End of file Signin.php */
/* Location: ./application/controllers/Signin.php */