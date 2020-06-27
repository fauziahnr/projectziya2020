<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rekening_model');
		$this->load->model('pelapak_model');
	}

// data rekening
	public function index()
	{
		$id_pelapak = $this->session->userdata('id_pelapak');

		$pelapak 	= $this->pelapak_model->detail($id_pelapak);
		$rekening = $this->rekening_model->listing_id($id_pelapak);

		$data = array (	'title'	=>	'Data Rekening',
						'id_pelapak' => $id_pelapak,
						'rekening' => $rekening,
						'pelapak'	=> $pelapak,
						'isi'	=> 'pelaku_usaha/rekening/list'
	);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);


	}

	// Tambah data rekening
	public function tambah()
	{
		$id_pelapak = $this->session->userdata('id_pelapak');
		$pelapak_list = $this->rekening_model->listing_id($id_pelapak);

		$pelapak 	= $this->pelapak_model->detail($id_pelapak);
		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank','Nama bank','required', array( 
			'required'		=> '%s harus diisi') );

		$valid->set_rules('nama_pemilik','Nama pemilik rekening','required', array( 
			'required'		=> '%s harus diisi') );

		$valid->set_rules('nomer_rekening','Nomer rekening','required|is_unique[rekening.nomer_rekening]', array( 
			'required'		=> '%s harus diisi',
			'is_unique'		=> '%s sudah ada. Buat nomor rekening baru!') );		
		

		if($valid->run()===FALSE) {
			//End Validasi
		$data = array ('title'	=>	'Tambah Rekening',
						'pelapak_list'	=> $pelapak_list,
						'pelapak'	=> $pelapak,
						'id_pelapak' => $id_pelapak,
						'isi'	=> 'pelaku_usaha/rekening/tambah'
	);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);


	}else{
		$i 				= $this->input;
	
		$data = array( 	'id_pelapak'		=> $this->session->userdata('id_pelapak'),
						'nama_bank'		=> $i->post('nama_bank'),
						'nomer_rekening' => $i->post('nomer_rekening'),	
						'nama_pemilik'			=> $i->post('nama_pemilik')
					);
		$this->rekening_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		redirect(base_url('pelaku_usaha/rekening'),'refresh');
	}
	// End masuk database
}

	// Edit data rekening
	public function edit($id_rekening)
	{
		$id_pelapak = $this->session->userdata('id_pelapak');
		$rekening = $this->rekening_model->detail($id_rekening); 
		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank','Nama rekening','required', array( 'required'	=> '%s harus diisi' ) );
		

		if($valid->run()===FALSE) {
			//End Validasi
		$data = array ('title'	=>	'Edit Rekening',
						'id_pelapak' => $id_pelapak,
						'rekening'	=> $rekening,
						'isi'	=> 'pelaku_usaha/rekening/edit'
	);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);

	}else{ 
		$i 				= $this->input;


		$data = array( 	'id_rekening'			=> $id_rekening,
						'nama_bank'		=> $i->post('nama_bank'),
						'nomer_rekening' => $i->post('nomer_rekening'),	
						'nama_pemilik'			=> $i->post('nama_pemilik')
					);
		$this->rekening_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('pelaku_usaha/rekening'),'refresh');
	}



	}

	//Delete USer
	public function delete($id_rekening)
	{
		$id_pelapak = $this->session->userdata('id_pelapak');
		$data = array('id_rekening'		=> $id_rekening);
		$this->rekening_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('pelaku_usaha/rekening'),'refresh');


	}
	

}

/* End of file Rekening.php */
/* Location: ./applicfation/controllers/pelapak/Rekening.php */