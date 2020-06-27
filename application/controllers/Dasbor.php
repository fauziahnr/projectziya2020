<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('produk_model');
		// Halaman ini diproteksi di Simple_pelanggan =? check login
		$this->simple_pelanggan->cek_login();

	}

	public function index()
	{
		// Ambil data login id_pelanggan dari session

		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

		$data = array( 'title'	=> 'Halaman Dashboard Female Preneur',
						'header_transaksi'	=> $header_transaksi,
						'isi'	=> 'dasbor/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		
	}
	// Belanja Gabung Pelaku Usaha
	public function belanja() 
	{
		// Ambil data login id_pelanggan dari session

		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$pelapak = $this->produk_model->listing();
		$header_transaksi = $this->header_transaksi_model->pelanggan($id_pelanggan);

		$data = array( 'title'				=> 'Riwayat Gabung Pelaku Usaha',
						'pelapak'			=> $pelapak,
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'dasbor/belanja'
					);
		$this->load->view('layout/wrapper', $data, FALSE);

	}

	// Detail
	public function detail($kode_transaksi) 
	{
		// Ambil data login id_pelanggan dari session

		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
		

		// Pastikan bahwa pelanggan/female preneur hanya mengakses data transaksinya
		if($header_transaksi->id_pelanggan != $id_pelanggan) {
			$this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
			redirect (base_url('masuk'));
		}

		$data = array( 	'title'				=> 'Riwayat Gabung',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'isi'				=> 'dasbor/detail'
					);
		$this->load->view('layout/wrapper', $data, FALSE);

	}

	// Profil Female Preneur
	public function profil()
	{
		// Ambil data login dari session
		$id_pelanggan		= $this->session->userdata('id_pelanggan');
		$pelanggan 			= $this->pelanggan_model->detail($id_pelanggan);

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan','Nama Lengkap','required', array( 'required'	=> '%s harus diisi' ));

		$valid->set_rules('alamat','Alamat Lengkap','required', array( 'required'	=> '%s harus diisi' ));

		$valid->set_rules('telepon','Nomor Telepon','required', array( 'required'	=> '%s harus diisi' ));

		if($valid->run()===FALSE) {
			//End Validasi

		$data = array( 	'title'				=> 'Profil Saya',
						'pelanggan'			=> $pelanggan,
						'isi'				=> 'dasbor/profil'
					);
		$this->load->view('layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
		$i = $this->input;
		// Jika password lebih dari 6 karakter, maka ganti password
		if(strlen($i->post('password')) >= 6) {

			$data = array( 	'id_pelanggan'		=> $id_pelanggan,
							'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'password'			=> SHA1($i->post('password')),
							'telepon'			=> $i->post('telepon'),
							'alamat'			=> $i->post('alamat')
						);
		}else{
			// Jika password kurang dari 6 maka tidak diganti
			$data = array( 	'id_pelanggan'	=> $id_pelanggan,
							'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'telepon'			=> $i->post('telepon'),
							'alamat'			=> $i->post('alamat')
						);
			// End data Update

		}
		$this->pelanggan_model->edit($data);
		// End create session

		$this->session->set_flashdata('sukses', 'Update profil berhasil');
		redirect(base_url('dasbor/profil'),'refresh');
	}
	// End masuk database
	}

	//Bonus atau Komisi female Preneur
	public function bonus()
	{
		// Ambil data login dari session
		$id_pelanggan		= $this->session->userdata('id_pelanggan');
		$pelanggan 			= $this->pelanggan_model->detail($id_pelanggan);

		//Validasi Input
		// $valid = $this->form_validation;

		// $valid->set_rules('nama_pelanggan','Nama Lengkap','required', array( 'required'	=> '%s harus diisi' ));

		// $valid->set_rules('alamat','Alamat Lengkap','required', array( 'required'	=> '%s harus diisi' ));

		// $valid->set_rules('telepon','Nomor Telepon','required', array( 'required'	=> '%s harus diisi' ));

		// if($valid->run()===FALSE) {
		// 	//End Validasi

		// $data = array( 	'title'				=> 'Profil Saya',
		// 				'pelanggan'			=> $pelanggan,
		// 				'isi'				=> 'dasbor/profil'
		// 			);
		// $this->load->view('layout/wrapper', $data, FALSE);

		// Masuk database
	// 	}else{
	// 	$i = $this->input;
	// 	// Jika password lebih dari 6 karakter, maka ganti password
	// 	if(strlen($i->post('password')) >= 6) {

	// 		$data = array( 	'id_pelanggan'		=> $id_pelanggan,
	// 						'nama_pelanggan'	=> $i->post('nama_pelanggan'),
	// 						'password'			=> SHA1($i->post('password')),
	// 						'telepon'			=> $i->post('telepon'),
	// 						'alamat'			=> $i->post('alamat')
	// 					);
	// 	}else{
	// 		// Jika password kurang dari 6 maka tidak diganti
	// 		$data = array( 	'id_pelanggan'	=> $id_pelanggan,
	// 						'nama_pelanggan'	=> $i->post('nama_pelanggan'),
	// 						'telepon'			=> $i->post('telepon'),
	// 						'alamat'			=> $i->post('alamat')
	// 					);
	// 		// End data Update

	// 	}
	// 	$this->pelanggan_model->edit($data);
	// 	// End create session

	// 	$this->session->set_flashdata('sukses', 'Update profil berhasil');
	// 	redirect(base_url('dasbor/profil'),'refresh');
	// }

	}

	//Verifikasi Akun Untuk Pencairan Bonus
	public function verifikasi_female()
	{
		// Ambil data login dari session
		$id_pelanggan		= $this->session->userdata('id_pelanggan');
		$pelanggan 			= $this->pelanggan_model->detail($id_pelanggan);
		

		//Validasi Input
		$valid = $this->form_validation;

		// $valid->set_rules('nama_pelanggan','Nama Lengkap','required', array( 'required'	=> '%s harus diisi' ));

		// $valid->set_rules('alamat','Alamat Lengkap','required', array( 'required'	=> '%s harus diisi' ));

		// $valid->set_rules('telepon','Nomor Telepon','required', array( 'required'	=> '%s harus diisi' ));

		if($valid->run()) {
				$config['upload_path'] 			= './assets/upload/image/ktp_female/';
				$config['allowed_types']	 	= 'gif|jpg|png|jpeg';
				$config['max_size']  			= '3000'; //dalam KB
				$config['max_width']  			= '2024';
				$config['max_height']  			= '2024';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar')){
				
				//End Validasi

				$data = array( 	'title'				=> 'Verifikasi Akun Saya',
								'pelanggan'			=> $pelanggan,
								'error'				=> $this->upload->display_errors(),
								'isi'				=> 'dasbor/verifikasi_female'
				);
				$this->load->view('layout/wrapper', $data, FALSE);

		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());

			//buat thumbnail gambarnya
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/upload/image/ktp_female/'.$upload_gambar['upload_data']['file_name'];
			//lokasi folder thumbnail
				$config['new_image']	= './assets/upload/image/thumbs/';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 250;//pixel
				$config['height']       = 250;
				$config['thumb_marker'] = '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();

				//end create thumbnail
				$i = $this->input;
		// }

		// Masuk database
		// }else{
		 $i = $this->input;
		// Jika password lebih dari 6 karakter, maka ganti password
		// if(strlen($i->post('password')) >= 6) {

			$data = array( 	'id_pelanggan'		=> $id_pelanggan,
							'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'password'			=> SHA1($i->post('password')),
							'telepon'			=> $i->post('telepon'),
							'alamat'			=> $i->post('alamat'),
								//simpan nama file foto ktp female
							'gambar'			=> $upload_gambar['upload_data']['file_name']
						);
		// }else{
		// 	// Jika password kurang dari 6 maka tidak diganti
		// 	$data = array( 	'id_pelanggan'	=> $id_pelanggan,
		// 					'nama_pelanggan'	=> $i->post('nama_pelanggan'),
		// 					'telepon'			=> $i->post('telepon'),
		// 					'alamat'			=> $i->post('alamat')
		// 				);
		// 	// End data Update

		// }
		$this->pelanggan_model->tambah_ktp($data);
		$this->session->set_flashdata('sukses', 'Berhasil, Foto KTP Kamu sudah tersimpan');
		redirect(base_url('dasbor/verifikasi_female'),'refresh');
		// End create session

	}}
	// End masuk database
	$data = array( 	'title'		=> 'Verifikasi Akun Saya',
					'pelanggan'	=> $pelanggan,
					'isi'		=> 'dasbor/verifikasi_female'
				);
				$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Konfirmasi pembayaran
	public function konfirmasi($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$rekening 	= $this->rekening_model->listing();
		$produk = $this->produk_model->listing();
		//Validasi Input
		$valid = $this->form_validation;
                 
		$valid->set_rules('nama_bank','Nama Bank','required', array( 'required'	=> '%s harus diisi' ));

		$valid->set_rules('rekening_pembayaran','Nomor Rekening','required', array( 'required'		=> '%s harus diisi'));

		$valid->set_rules('rekening_pelanggan','Nama Pemilik Rekening','required', array( 'required'		=> '%s harus diisi'));

		$valid->set_rules('tanggal_bayar','Tanggal Pembayaran','required', array( 'required'		=> '%s harus diisi'));

		$valid->set_rules('jumlah_bayar','Jumlah Pembayaran','required', array( 'required'		=> '%s harus diisi'));

		if($valid->run()) {
			// Check jika gambar diganti
			if(!empty($_FILES['bukti_bayar']['name'])) {

			$config['upload_path'] 			= './assets/upload/image/';
			$config['allowed_types']	 	= 'gif|jpg|png|jpeg';
			$config['max_size']  			= '3000'; //dalam KB
 			$config['max_width']  			= '2024';
			$config['max_height']  			= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti_bayar')){
				
			//End Validasi
		
		$data 	= array('title'	=> 'Konfirmasi Pembayaran',
						'header_transaksi'	=> $header_transaksi,
						'rekening' => $rekening,
						// 'produk' => $produk,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'dasbor/konfirmasi'
						);
		$this->load->view('layout/wrapper', $data, FALSE);

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

		$data = array( 	
						'id_header_transaksi'	=> $header_transaksi->id_header_transaksi,
						// 'id_pelapak'			=> $produk->id_pelapak,
						// 'status_sewa'			=> 'Konfirmasi',
						'jumlah_bayar'			=> $i->post('jumlah_bayar'),
						'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),
						'rekening_pelanggan'	=> $i->post('rekening_pelanggan'),
						'bukti_bayar'			=> $upload_gambar['upload_data']['file_name'],
						'id_rekening'			=> $i->post('id_rekening'),
						'tanggal_bayar'			=> $i->post('tanggal_bayar'),
						'nama_bank'				=> $i->post('nama_bank')

						
					);
		$this->header_transaksi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
		redirect(base_url('dasbor'),'refresh');
	}}else{
		// edit produk tanpa edit gambar
		$i = $this->input;

		
		$data = array( 	
						'id_header_transaksi'	=> $header_transaksi->id_header_transaksi,
						// 'id_pelapak'			=> $produk->id_pelapak,
						// 'status_sewa'			=> 'Konfirmasi',
						'jumlah_bayar'			=> $i->post('jumlah_bayar'),
						'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),
						'rekening_pelanggan'	=> $i->post('rekening_pelanggan'),
						// 'bukti_bayar'			=> $upload_gambar['upload_data']['file_name'],
						'id_rekening'			=> $i->post('id_rekening'),
						'tanggal_bayar'			=> $i->post('tanggal_bayar'),
						'nama_bank'				=> $i->post('nama_bank')


						
					);
		$this->header_transaksi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
		redirect(base_url('dasbor'),'refresh');
	

	}}
	// End masuk database

		$data 	= array('title'	=> 'Konfirmasi Pembayaran',
						'header_transaksi'	=> $header_transaksi,
						'rekening' => $rekening,
						// 'produk'	=> $produk,
						'isi'	=> 'dasbor/konfirmasi'
						);
		$this->load->view('layout/wrapper', $data, FALSE);

	}



}

/* End of file Dasbor.php */
/* Location: ./application/controllers/Dasbor.php */