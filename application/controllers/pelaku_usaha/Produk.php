<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('header_produk_model');
		$this->load->model('kategori_model');
	}

// data produk
	public function index()
	{
		$id_pelapak = $this->session->userdata('id_pelapak');
		$pelapak 			= $this->pelapak_model->detail($id_pelapak);
		$produk = $this->header_produk_model->listing($id_pelapak);
		
		$data = array('title' => 'Data Produk Pelaku Usaha',
			'produk' 		=> $produk,
			'id_pelapak'	=> $id_pelapak,
			'pelapak'		=> $pelapak,
			'isi'			=> 'pelaku_usaha/produk/list'
		);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);

	}
	// Foto Produk dr Pelaku Usaha
	public function gambar($id_produk)
	{

		$id_pelapak = $this->session->userdata('id_pelapak');
		$pelapak 	= $this->pelapak_model->detail($id_pelapak);
		$produk 	= $this->header_produk_model->detail($id_produk);
		$gambar 	= $this->header_produk_model->gambar($id_produk);

				//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('judul_gambar','Judul/Nama Gambar','required', array( 'required'	=> '%s harus diisi' ));
		

		if($valid->run()) {
			$config['upload_path'] 		 	= './assets/upload/image/';
			$config['allowed_types']	 	= 'gif|jpg|png|jpeg';
			$config['max_size']  			= '3000'; //dalam KB
			$config['max_width']  			= '2024';
			$config['max_height']  			= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
			//End Validasi
				$data = array ('title'	=>	'Tambah Foto Produk '.$produk->nama_produk,
					'produk' => $produk,
					'gambar' => $gambar,
					'id_pelapak'	=> $id_pelapak,
					'pelapak'	=> $pelapak,
					'error'	=> $this->upload->display_errors(),
					'isi'	=> '      pelaku_usaha/produk/gambar'
				);
				$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);


			}else{
				$upload_gambar = array('upload_data' => $this->upload->data());

			// Create thumbnail gambar
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
		// Lokasi folder thumbnail
				$config['new_image']	= './assets/upload/image/thumbs/';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
		$config['width']         = 250;//pixel
		$config['height']       = 250;
		$config['thumb_marker'] = '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();


			// End create thumbnail 
		$i = $this->input;
		
		$data = array( 	
			'id_produk' => $id_produk,

			'judul_gambar' => $i->post('judul_gambar'),

						// disimpan nama file gambar
			'gambar'			=> $upload_gambar['upload_data']['file_name']


		);
		$this->header_produk_model->tambah_gambar($data);
		$this->session->set_flashdata('sukses', 'Data foto produk Anda telah ditambahkan');
		redirect(base_url('pelaku_usaha/produk/gambar/'.$id_produk),'refresh');
	}}
	// End masuk database
	$data = array (	'title'		=>	'Tambah Foto Produk '.$produk->nama_produk,
		'produk' 	=> $produk,
		'gambar'	=> $gambar,
		'id_pelapak' => $id_pelapak,
		'pelapak'	=> $pelapak,
		'isi'		=> 'pelaku_usaha/produk/gambar'
	);
	$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);

}


	// Tambah data produk
public function tambah()
{

	$id_pelapak = $this->session->userdata('id_pelapak');
	$pelapak 	= $this->pelapak_model->detail($id_pelapak);
		// Ambil data kategori
	$kategori = $this->kategori_model->listing();
		//Validasi Input
	$valid = $this->form_validation;

	$valid->set_rules('nama_produk','Nama Produk','required', array( 'required'	=> '%s harus diisi' ));

	$valid->set_rules('kode_produk','Kode Produk','required|is_unique[produk.kode_produk]', array( 'required'		=> '%s harus diisi', 
		'is_unique'		=> '%s sudah ada. Buat kode produk baru'));



	if($valid->run()) {
		$config['upload_path'] 			= './assets/upload/image/';
		$config['allowed_types']	 	= 'gif|jpg|png|jpeg';
			$config['max_size']  			= '3000'; //dalam KB
			$config['max_width']  			= '2024';
			$config['max_height']  			= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
			//End Validasi
				$data = array ('title'	=>	'Tambah Produk Usahamu',
					'id_pelapak' => $id_pelapak,
					'pelapak' => $pelapak,
					'kategori' => $kategori,
					'error'	=> $this->upload->display_errors(),
					'isi'	=> 'pelaku_usaha/produk/tambah'
				);
				$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);


			}else{
				$upload_gambar = array('upload_data' => $this->upload->data());

			// Create thumbnail gambar
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
		// Lokasi folder thumbnail
				$config['new_image']	= './assets/upload/image/thumbs/';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
		$config['width']         = 250;//pixel
		$config['height']       = 250;
		$config['thumb_marker'] = '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();


			// End create thumbnail 
		$i = $this->input;
		// SLUG PRODUK / Keterangan produk pelaku usaha
		$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

		$data = array( 	
			'id_pelapak'		=> $this->session->userdata('id_pelapak'),
			'id_kategori'		=> $i->post('id_kategori'),
			'kode_produk'		=> $i->post('kode_produk'),
			'nama_produk'		=> $i->post('nama_produk'),
			'slug_produk'			=>$slug_produk,
			'keterangan'		=> $i->post('keterangan'),
			'keywords'			=> $i->post('keywords'),
			'harga'				=> $i->post('harga'),
			'stok'				=> $i->post('stok'),
						// disimpan nama file gambar
			'gambar'			=> $upload_gambar['upload_data']['file_name'],
			'berat'				=> $i->post('berat'),
			'ukuran'			=> $i->post('ukuran'),
			'status_produk'		=> $i->post('status_produk'),
			'tanggal_post'		=> date('Y-m-d H:i:s')

		);
		$this->header_produk_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data Produk telah ditambahkan');
		redirect(base_url('pelaku_usaha/produk'),'refresh');
	}}
	// End masuk database
	$data = array (	'title'		=>	'Tambah Produk Usahamu',
		'kategori' 	=> $kategori,
		'id_pelapak' => $id_pelapak,
		'pelapak' => $pelapak,
		'isi'		=> 'pelaku_usaha/produk/tambah'
	);
	$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);

}

	// Edit data produk
public function edit($id_produk)
{

	$id_pelapak = $this->session->userdata('id_pelapak');
	$pelapak 	= $this->pelapak_model->detail($id_pelapak);
	$produk 	= $this->header_produk_model->detail($id_produk);
		// AMbil data kategori
	$kategori = $this->kategori_model->listing();

		//Validasi Input
	$valid = $this->form_validation;

	$valid->set_rules('nama_produk','Nama Produk','required', array( 'required'	=> '%s harus diisi' ));

	$valid->set_rules('kode_produk','Kode Produk','required', array( 'required'		=> '%s harus diisi'));



	if($valid->run()) {
			// Check jika gambar diganti, jgn melebihi kapasitas
		if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 			= './assets/upload/image/';
			$config['allowed_types']	 	= 'gif|jpg|png|jpeg';
			$config['max_size']  			= '3000'; //dalam KB
			$config['max_width']  			= '2024';
			$config['max_height']  			= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
			//End Validasi
				$data = array ('title'	=>	'Edit Produk: '.$produk->nama_produk,
					'kategori' => $kategori,
					'produk'	=> $produk,
					'id_pelapak'	=> $id_pelapak,
					'pelapak'	=> $pelapak,
					'error'	=> $this->upload->display_errors(),
					'isi'	=> '      pelaku_usaha/produk/edit'
				);
				$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);

		// Masuk Database
			}else{
				$upload_gambar = array('upload_data' => $this->upload->data());

			// Create thumbnail gambar
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
		// Lokasi folder thumbnail
				$config['new_image']	= './assets/upload/image/thumbs/';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
		$config['width']         = 250;//pixel
		$config['height']       = 250;
		$config['thumb_marker'] = '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();


			// End create thumbnail 
		
		$i = $this->input;
		// SLUG PRODUK PELAKU USAHA
		$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

		$data = array( 	
			'id_produk'			=> $id_produk,
			'id_pelapak'		=> $this->session->userdata('id_pelapak'),
			'id_kategori'		=> $i->post('id_kategori'),
			'kode_produk'		=> $i->post('kode_produk'),
			'nama_produk'		=> $i->post('nama_produk'),
			'slug_produk'		=> $slug_produk,
			'keterangan'		=> $i->post('keterangan'),
			'keywords'			=> $i->post('keywords'),
			'harga'				=> $i->post('harga'),
			'stok'				=> $i->post('stok'),
						// disimpan nama file gambar
			'gambar'			=> $upload_gambar['upload_data']['file_name'],
			'berat'				=> $i->post('berat'),
			'ukuran'			=> $i->post('ukuran'),
			'status_produk'		=> $i->post('status_produk')

		);
		$this->header_produk_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah edit');
		redirect(base_url('pelaku_usaha/produk'),'refresh');
	}}else{
		// edit produk tanpa edit gambar
		$i = $this->input;
		// SLUG PRODUK PELAKU USAHA
		$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);

		$data = array( 	
			'id_produk'			=> $id_produk,
			'id_pelapak'		=> $this->session->userdata('id_pelapak'),
			'id_kategori'		=> $i->post('id_kategori'),
			'kode_produk'		=> $i->post('kode_produk'),
			'nama_produk'		=> $i->post('nama_produk'),
			'slug_produk'		=> $slug_produk,
			'keterangan'		=> $i->post('keterangan'),
			'keywords'			=> $i->post('keywords'),
			'harga'				=> $i->post('harga'),
			'stok'				=> $i->post('stok'),
						// disimpan nama file gambar tidak diganti

						// 'gambar'			=> $upload_gambar['upload_data']['file_name'],
			'berat'				=> $i->post('berat'),
			'ukuran'			=> $i->post('ukuran'),
			'status_produk'		=> $i->post('status_produk')

		);
		$this->header_produk_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah edit');
		redirect(base_url('pelaku_usaha/produk'),'refresh');


	}}
	// End masuk database
	$data = array (	'title'		=> 'Edit Produk: '.$produk->nama_produk,
		'kategori' 	=> $kategori,
		'produk'	=> $produk,
		'id_pelapak'	=> $id_pelapak,
		'pelapak'	=> $pelapak,
		'isi'		=> 'pelaku_usaha/produk/edit'
	);
	$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);
}

	//Delete Produk Pelaku Usaha
public function delete($id_produk)
{
		// Proses hapus gambar
	$produk = $this->header_produk_model->detail($id_produk);
	unlink('./assets/upload/image/'.$produk->gambar);
	unlink('./assets/upload/image/thumbs/'.$produk->gambar);

		// End proses hapus

	$data = array('id_produk'		=> $id_produk);
	$this->header_produk_model->delete($data);
	$this->session->set_flashdata('sukses', 'Data telah dihapus');
	redirect(base_url('pelaku_usaha/produk'),'refresh');


}
// DELETE GAMBAR PRODUK PELAKU USAHA
public function delete_gambar($id_produk,$id_gambar)
{
		// Proses hapus gambar
	$gambar = $this->header_produk_model->detail_gambar($id_gambar);
	unlink('./assets/upload/image/'.$gambar->gambar);
	unlink('./assets/upload/image/thumbs/'.$gambar->gambar);

		// End proses hapus

	$data = array('id_gambar'		=> $id_gambar);
	$this->header_produk_model->delete_gambar($data);
	$this->session->set_flashdata('sukses', 'Data gambar telah dihapus');
	redirect(base_url('pelaku_usaha/produk/gambar/'.$id_produk),'refresh');


}





public function filter(){
	$filters = $this->input->post('filter');

	if ($filters == 1 ) {
		$id_pelapak = $this->session->userdata('id_pelapak');
		$pelapak 			= $this->pelapak_model->detail($id_pelapak);
		$produk = $this->header_produk_model->produkAtas($id_pelapak);

		$data = array('title' => 'Data Produk Pelaku Usaha',
			'produk' 		=> $produk,
			'id_pelapak'	=> $id_pelapak,
			'pelapak'		=> $pelapak,
			'isi'			=> 'pelaku_usaha/produk/list'
		);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);

	}elseif ($filters == 2) {
		$id_pelapak = $this->session->userdata('id_pelapak');
		$pelapak 			= $this->pelapak_model->detail($id_pelapak);
		$produk = $this->header_produk_model->produkBawah($id_pelapak);

		$data = array('title' => 'Data Produk Pelaku Usaha',
			'produk' 		=> $produk,
			'id_pelapak'	=> $id_pelapak,
			'pelapak'		=> $pelapak,
			'isi'			=> 'pelaku_usaha/produk/list'
		);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);
	}else{
		$id_pelapak = $this->session->userdata('id_pelapak');
		$pelapak 			= $this->pelapak_model->detail($id_pelapak);
		$produk = $this->header_produk_model->listing($id_pelapak);

		$data = array('title' => 'Data Produk Pelaku Usaha',
			'produk' 		=> $produk,
			'id_pelapak'	=> $id_pelapak,
			'pelapak'		=> $pelapak,
			'isi'			=> 'pelaku_usaha/produk/list'
		);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);
	}
}
}

/* End of file Produk.php */
/* Location: ./applicfation/controllers/pelapak/Produk.php */