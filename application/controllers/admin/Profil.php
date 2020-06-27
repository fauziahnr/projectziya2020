<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		// Halaman ini diproteksi di Simple_pelanggan =? check login
		$this->simple_login->cek_login();
	}


	public function index()
	{
		// Ambil data login dari session
		$id_user			= $this->session->userdata('id_user');
		$user				= $this->user_model->detail($id_user);

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama Lengkap','required', array( 'required'	=> '%s harus diisi' ) );

		$valid->set_rules('email','Email','required|valid_email', 
					array( 'required'	=> '%s harus diisi',
					'valid_email' => '%s tidak valid' ));
		$valid->set_rules('username','Nama User','required', array( 'required'	=> '%s harus diisi' ) );
		
		$valid->set_rules('password','Password','required', array( 'required'	=> '%s harus diisi' ));


		if($valid->run()===FALSE) {
			//End Validasi

		$data = array( 	'title'				=> 'Data Akun',
						'user'				=> $user,
						'isi'				=> 'admin/profil/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
		$i = $this->input;
		// Jika password lebih dari 6 karakter, maka ganti password
		if(strlen($i->post('password')) >= 6) {

			$data = array( 	'id_user'			=> $id_user,
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username'),
							'password'			=> SHA1($i->post('password'))
						);
		}else{
			// Jika password kurang dari 6 maka tidak diganti
				$data = array('id_user'			=> $id_user,
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username')
						);
			// End data Update

		}
		$this->user_model->edit($data);
		// End create session

		$this->session->set_flashdata('sukses', 'Update profil berhasil');
		redirect(base_url('admin/profil'),'refresh');
	}
	// End masuk database
		
	}

		// konfigurasi logo website
	public function foto()
	{
		//$user = $this->user_model->listing();

		$id_user			= $this->session->userdata('id_user');
		$user				= $this->user_model->detail($id_user);

		//Validasi Input
		$valid = $this->form_validation;
                 
		//$valid->set_rules('nama','Nama ','required', array( 'required'=> '%s harus diisi' ));

		if($valid->run()) {
			// Check jika gambar diganti
			if(!empty($_FILES['foto']['name'])) {

			$config['upload_path'] 			= './assets/upload/image/';
			$config['allowed_types']	 	= 'gif|jpg|png|jpeg';
			$config['max_size']  			= '3000'; //dalam KB
 			$config['max_width']  			= '2024';
			$config['max_height']  			= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto')){
				
			//End Validasi
		$data = array ('title'				=>	'Ubah Foto Profil',
						'user'	 			=> $user,
						'id_user'			=> $id_user,
						'error'				=> $this->upload->display_errors(),
						'isi'				=> 'admin/profil/foto'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);


	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());
			
			// Create thumbnail gambar
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
		// Lokasi folder thumbnail
		$config['new_image']		= './assets/upload/image/thumbs/';
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		$config['width']         	= 250;//pixel
		$config['height']       	= 250;
		$config['thumb_marker'] 	= '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();


			// End create thumbnail 
		
		$i = $this->input;
		$data = array( 	
						'id_user'		=> $user->id_user,
						'nama'			=> $i->post('nama'),
						'foto'			=> $upload_gambar['upload_data']['file_name']
					);
		$this->user_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/profil/foto'),'refresh');
	}}else{
		// edit produk tanpa edit gambar
		$i = $this->input;
		$data = array( 	
						'id_user'	=> $user->id_user,
						'nama'			=> $i->post('nama'),
						//'logo'			=> $upload_gambar['upload_data']['file_name']
					);
		$this->user_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('admin/profil/foto'),'refresh');
	

	}}
	// End masuk database
		//End Validasi
		$data = array ('title'			=>	'Foto Profil',
						'user' 			=> $user,
						'isi'			=> 'admin/profil/foto'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	

	}


}

/* End of file Profil.php */
/* Location: ./application/controllers/admin/Profil.php */