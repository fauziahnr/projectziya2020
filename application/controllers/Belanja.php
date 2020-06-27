<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {
	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');


		// Load Helper random string
		$this->load->helper('string');

	
	}

	// Halaman gabung pu
	public function index()
	{
		$keranjang = $this->cart->contents();
		$produk = $this->produk_model->listing();


		$data = array( 'title'	=> 'Gabung Mitra',
						'keranjang'	=> $keranjang,
						'produk'	=> $produk,
						'isi'	=> 'belanja/list'
	);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	// Tambahkan ke gabung mitra
	public function add()
	{
		// AMBIL DATA DARI FORM
		$id 	= $this->input->post('id');
		$id_pelapak = $this->input->post('id_pelapak');
		$stok	= $this->input->post('stok');
		$qty 	= $this->input->post('qty'); 
		$price 	= $this->input->post('price');
		$name 	= $this->input->post('name');
		$redirect_page 	= $this->input->post('redirect_page');
		// Proses masukan ke gabung pu
		$data = array(	'id'	=> $id,
						'id_pelapak' => $id_pelapak,
						'stok'	=> $stok,
						'qty'	=> $qty,
						'price'	=> $price,
						'name'	=> $name
					);
		$this->cart->insert($data);

		// Redirect page (kalau sdh berhasil insert akan refresh page, bs ganti modal bhw sukses insert)
		redirect($redirect_page,'refresh');

	} 


	// Sukses belanja
	public function sukses()
	{
		$data = array( 'title'	=> 'Gabung Mitra Berhasil',
						'isi'	=> 'belanja/sukses'
	);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Gabung
	public function checkout()
	{
		// Check female preneur sudah login atau belum? jika belum maka nanti harus registrasi dan sekaligus login. Mengecek dengan session email.

		// Kondisi sudah login

		if($this->session->userdata('email_pelanggan')) {
			$email_pelanggan 	= $this->session->userdata('email_pelanggan');
			$nama_pelanggan 	= $this->session->userdata('nama_pelanggan');
			$pelanggan 			= $this->pelanggan_model->sudah_login($email_pelanggan,$nama_pelanggan);
			$produk				= $this->produk_model->listing();
			$keranjang = $this->cart->contents();

			//Validasi Input
			$valid = $this->form_validation;

			$valid->set_rules('nama_pelanggan','Nama Lengkap','required', array( 'required'	=> '%s harus diisi' ));

			$valid->set_rules('telepon','Nomor telepon','required', array( 'required'	=> '%s harus diisi' ));
			
			$valid->set_rules('alamat','Alamat','required', array( 'required'	=> '%s harus diisi' ));

			// $valid->set_rules('tanggal_sewa','Tanggal Sewa','required', array('required' => '%s harus diisi' ));
			
			$valid->set_rules('email_pelanggan','Email','required|valid_email',  
						array(  'required'		=> '%s harus diisi',
								'valid_email' 	=> '%s tidak valid'));

			if($valid->run() == FALSE) {
				//End Validasi

			$data = array( 'title'	=> 'Gabung',
							'produk'	=> $produk,
							'keranjang'	=> $keranjang,
							'pelanggan' => $pelanggan,
							'isi'	=> 'belanja/checkout'
	);
		$this->load->view('layout/wrapper', $data, FALSE);

		// Masuk Database

		}else{
			$i = $this->input;
				$data = array( 	'id_pelapak'			=> $i->post('id_pelapak'),
								'id_pelanggan'			=> $pelanggan->id_pelanggan,
								'id_produk'				=> $i->post('id_produk'),
								'nama_pelanggan'		=> $i->post('nama_pelanggan'),
								'email_pelanggan'		=> $i->post('email_pelanggan'),
								'telepon'				=> $i->post('telepon'),
								// 'tanggal_sewa'			=> $i->post('tanggal_sewa'),
								'stok'					=> $i->post('stok'),
								// 'jumlah_hari'			=> $i->post('qty'),
								'alamat'				=> $i->post('alamat'),
								'kode_transaksi'		=> $i->post('kode_transaksi'),
								'tanggal_transaksi'		=> $i->post('tanggal_transaksi'),
								'jumlah_transaksi'		=> $i->post('jumlah_transaksi'),
								'status_sewa'			=> 'Menunggu Konfirmasi',
								// 'status_pembayaran'		=> $i->post('status_pembayaran'),
								'tanggal_post'			=> date('Y-m-d H:i:s')
							);
				// Proses masuk ke header transaksi
				$this->header_transaksi_model->tambah($data);				

			// Proses masuk ke tabel transaksi

			foreach ($keranjang as $keranjang) {
				$sub_total = $keranjang['price'] * $keranjang['stok'];

				$data = array(  'id_pelapak'			=> $i->post('id_pelapak'),
								'id_pelanggan' 			=> $pelanggan->id_pelanggan,
								'kode_transaksi'		=> $i->post('kode_transaksi'),
								'id_produk'				=> $keranjang['id'],
								'harga'					=> $keranjang['price'],
								'stok'					=> $keranjang['stok'],
								// 'jumlah'				=> $keranjang['qty'],
								'total_harga'			=> $sub_total,
								'tanggal_transaksi'		=> $i->post('tanggal_transaksi') 
							);
				$this->transaksi_model->tambah($data); 

			}


			// End proses masuk ke tabel transaksi
			// Setelah masuk tabel transaksi, maka keranjang dikosongkan lagi
			$this->cart->destroy();
			// End pengosongan keranjang


			// End create session

			$this->session->set_flashdata('sukses', 'Gabung Mitra Telah Berhasil');
			redirect(base_url('belanja/sukses'),'refresh');
		}


		// End masuk Database


		}else{
			// Kalau belum, maka harus registrasi
			$this->session->set_flashdata('sukses', 'Silahkan login atau registrasi terlebih dahulu');
			redirect(base_url('registrasi'),'refresh');


		}

	}


	// UPDATE GABUNG MITRA
	public function update_cart($rowid)
	{
		// Jika ada data rowid
		if($rowid)
		{
			$data = array( 'rowid' => $rowid,
							'stok'	=> $this->input->post('stok'),
							'qty'	=> $this->input->post('qty')
						);
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Data Gabung Mitra Telah diupdate');
			redirect(base_url('belanja'),'refresh');
		}else{
			// Jika ga ada rowid
			redirect(base_url('belanja'),'refresh');

		}

	}


	// HAPUS SEMUA DATA GABUNG PU
	public function hapus($rowid='')
	{
		if ($rowid) {
			// Hapus per item gabung
		$this->cart->remove($rowid);
		$this->session->set_flashdata('sukses','Data Gabung Mitra telah dihapus');
		redirect(base_url('belanja'),'refresh');

		}else{
			// Hapus all
		$this->cart->destroy();
		$this->session->set_flashdata('sukses','Data Gabung Mitra telah dihapus');
		redirect(base_url('belanja'),'refresh');
	}

	}

}

/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */