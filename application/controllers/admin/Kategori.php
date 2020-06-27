<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
	}

// data kategori
	public function index()
	{
		$kategori = $this->kategori_model->listing();

		$data = array ('title'	=>	'Data Kategori produk',
						'kategori' => $kategori,
						'isi'	=> 'admin/kategori/list'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);


	}

	// Tambah data kategori
	public function tambah()
	{
		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama kategori','required|is_unique[kategori.nama_kategori]', array( 
			'required'		=> '%s harus diisi',
			'is_unique'		=> '%s sudah ada. Buat kategori baru!') );
		
		

		if($valid->run()===FALSE) {
			//End Validasi
		$data = array ('title'	=>	'Tambah Kategori produk',
						'isi'	=> 'admin/kategori/tambah'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);


	}else{
		$i 				= $this->input;
		$slug_kategori 	= url_title($this->input->post('nama_kategori'), 'dash', TRUE);


		$data = array( 	'slug_kategori'		=> $slug_kategori,
						'nama_kategori'		=> $i->post('nama_kategori'),
						'urutan'			=> $i->post('urutan')
					);
		$this->kategori_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		redirect(base_url('admin/kategori'),'refresh');
	}
	// End masuk database
}

	// Edit data kategori
	public function edit($id_kategori)
	{
		$kategori = $this->kategori_model->detail($id_kategori); 
		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama kategori','required', array( 'required'	=> '%s harus diisi' ) );
		

		if($valid->run()===FALSE) {
			//End Validasi
		$data = array ('title'	=>	'Edit Kategori produk',
						'kategori'	=> $kategori,
						'isi'	=> 'admin/kategori/edit'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}else{ 
		$i 				= $this->input;
		$slug_kategori 	= url_title($this->input->post('nama_kategori'), 'dash', TRUE);

		$data = array( 	'id_kategori'			=> $id_kategori,
						'slug_kategori'			=> $slug_kategori,
						'nama_kategori'			=> $i->post('nama_kategori'),
						'urutan'				=> $i->post('urutan')
					);
		$this->kategori_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/kategori'),'refresh');
	}



	}

	//Delete USer
	public function delete($id_kategori)
	{
		$data = array('id_kategori'		=> $id_kategori);
		$this->kategori_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kategori'),'refresh');


	}
	

}

/* End of file Kategori.php */
/* Location: ./applicfation/controllers/admin/Kategori.php */