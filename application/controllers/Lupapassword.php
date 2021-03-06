<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('encryption');
	}

	// data user
	public function index()
	{
		$user = $this->user_model->listing();

		$data['title']	=	'Data Pengguna';
		$data['user'] = $user;
		$data['isi']	= 'admin/user/list';
		
		$this->load->view('admin/layout/wrapper', $data);


	}

	// Edit data user
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user); 
		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama Lengkap','required', array( 'required'	=> '%s harus diisi' ) );
		
		$valid->set_rules('email','Email','required|valid_email', 
			array( 'required'	=> '%s harus diisi',
				'valid_email' => '%s tidak valid' ));

		$valid->set_rules('password','Password','required', array( 'required'	=> '%s harus diisi' ));


		if($valid->run()===FALSE) {
			//End Validasi
			$data = array ('title'	=>	'Edit Pengguna',
				'user'	=> $user,
				'isi'	=> 'lupapassword'
			);
			$this->load->view('admin/layout/wrapper', $data, FALSE);

		}else{ 
			$i = $this->input;
			$data = array( 	'id_user'		=> $id_user,
				'nama'			=> $i->post('nama'),
				'email'			=> $i->post('email'),
				'username'		=> $i->post('username'),
				'password'		=> SHA1($i->post('password')),
				'akses_level'	=> $i->post('akses_level')
			);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
		// redirect(base_url('admin/user'),'refresh');
		}



	}

}

/* End of file User.php */
/* Location: ./applicfation/controllers/admin/User.php */