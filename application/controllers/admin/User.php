<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('encryption');

		//Proteksi Halaman
		$this->simple_login->cek_login();

	}


// data user
	public function index()
	{
		$user = $this->user_model->listing();

		$data = array ('title'	=>	'Data Admin',
						'user' => $user,
						'isi'	=> 'admin/user/list'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);


	}

	public function pelapak()
	{
		$pelapak = $this->pelapak_model->listing();
		$data = array( 'title'	=> 'Data Pelapak',
						'pelapak'	=> $pelapak,
						'isi'	=> 'admin/user/pelapak'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}
	public function update_status($id_pelapak)
	{
		$pelapak = $this->pelapak_model->detail($id_pelapak);
		if($pelapak->is_active==1)
		{
			$is_active = 0;
		}
		else
		{
			$is_active = 1;
		}
		$data = array(
			'id_pelapak'	=> $id_pelapak,
			'is_active'	=> $is_active
		);
		$this->pelapak_model->edit($data);
		$this->session->set_flashdata('sukses', 'Akses pelapak telah diubah');
		redirect(base_url('admin/user/pelapak'),'refresh');
	}

	public function status($id_pelapak)
	{
		$pelapak = $this->pelapak_model->detail($id_pelapak);
		if($pelapak->status==1)
		{
			$status = 0;
		}
		else
		{
			$status = 1;
		}
		$data = array(
			'id_pelapak'	=> $id_pelapak,
			'status'	=> $status
		);
		$this->pelapak_model->edit($data);
		$this->session->set_flashdata('sukses', 'Akses pelapak telah diubah');
		redirect(base_url('admin/user/pelapak'),'refresh');
	}

	// // Deactive pelapak
	// public function nonactivepelapak($id_pelapak)
	// {
	// 	$pelapak = $this->pelapak_model->detail($id_pelapak); 
	// 	$data = array( 	'id_pelapak'	=> $id_pelapak,
	// 					'is_active' 	=> '0'
	// 				);
	// 	$this->pelapak_model->edit($data);
	// 	$this->session->set_flashdata('sukses', 'Pelapak telah difreeze');
	// 	redirect(base_url('admin/user/pelapak'),'refresh');
	// }


	// // Edit data user
	// public function accpelapak($id_pelapak)
	// {
	// 	$pelapak = $this->pelapak_model->detail($id_pelapak); 
	// 	$data = array( 	'id_pelapak'		=> $id_pelapak,
	// 					'is_active' 	=> '1'
	// 				);
	// 	$this->pelapak_model->edit($data);
	// 	$this->session->set_flashdata('sukses', 'Pelapak telah aktif');
	// 	redirect(base_url('admin/user/pelapak'),'refresh');
	// }

	


	public function pelanggan()
	{
		$pelanggan = $this->pelanggan_model->listing();
		$data = array( 'title'	=> 'Data Pelanggan',
						'pelanggan'	=> $pelanggan,
						'isi'	=> 'admin/user/pelanggan'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	// Tambah data user
	public function tambah()
	{
		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama Lengkap','required', array( 'required'	=> '%s harus diisi' ) );
		
		$valid->set_rules('email','Email','required|valid_email', 
			array( 'required'	=> '%s harus diisi',
					'valid_email' => '%s tidak valid' ));

		$valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[users.username]', 
			array( 'required'		=> '%s harus diisi',
					'min_length' 	=>	'%s minimal 6 karakter',
					'max_length' 	=> '%s maksimal 32 karakter',
					'is_unique'		=> '%s sudah ada. Buat username baru.'));

		$valid->set_rules('password','Password','required', array( 'required'	=> '%s harus diisi' ));

		


		if($valid->run()===FALSE) {
			//End Validasi
		$data = array ('title'	=>	'Tambah Pengguna',
						'isi'	=> 'admin/user/tambah'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk database
	}else{
		$i = $this->input;
		$data = array( 	'nama'			=> $i->post('nama'),
						'email'			=> $i->post('email'),
						'username'		=> $i->post('username'),
						'password'		=> SHA1($i->post('password')),
						'foto'			=> $upload_gambar['upload_data']['file_name'],
						'akses_level'	=> $i->post('akses_level')
					);
		$this->user_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		redirect(base_url('admin/user'),'refresh');
	}
	// End masuk database
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
						'isi'	=> 'admin/user/edit'
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
		redirect(base_url('admin/user'),'refresh');
	}



	}

	//Delete USer
	public function delete($id_user)
	{
		$data = array('id_user'		=> $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');


	}
	

}

/* End of file User.php */
/* Location: ./applicfation/controllers/admin/User.php */