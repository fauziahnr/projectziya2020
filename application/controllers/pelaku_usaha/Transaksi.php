<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('konfigurasi_model');
	}

	// Load Data Transaksi
	public function index()
	{
		$id_pelapak = $this->session->userdata('id_pelapak');
		$header_transaksi = $this->header_transaksi_model->listing_id($id_pelapak);
		$pelapak 			= $this->pelapak_model->detail($id_pelapak);
		$data = array ('title'				=>	'Data Pemesanan Fe-Preneur',
			'header_transaksi'	=> $header_transaksi,
			'id_pelapak'		=> $id_pelapak,
			'pelapak'			=> $pelapak,
			'isi'				=> 'pelaku_usaha/transaksi/list'
		);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);


	}
	// DETAIL
	public function detail($kode_transaksi) 
	{
		$id_pelapak = $this->session->userdata('id_pelapak');

		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$pelapak 			= $this->pelapak_model->detail($id_pelapak);


		$data = array( 	'title'				=> 'Riwayat Gabung',
			'header_transaksi'	=> $header_transaksi,
			'id_pelapak'		=> $id_pelapak,
			'transaksi'			=> $transaksi,
			'pelapak'			=> $pelapak,
			'isi'				=> 'pelaku_usaha/transaksi/detail'
		);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);

	}

	public function status_sewa($kode_transaksi)
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array( 	'title'				=> 'Riwayat Gabung',
			'header_transaksi'	=> $header_transaksi,
			'transaksi'			=> $transaksi,
			'isi'				=> 'pelaku_usaha/transaksi/detail'
		);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);
	}


	// CETAK
	public function cetak($kode_transaksi) 
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site = $this->konfigurasi_model->listing();

		$data = array( 	'title'				=> 'Riwayat Gabung',
			'header_transaksi'	=> $header_transaksi,
			'transaksi'			=> $transaksi,
			'site'	=> $site
		);
		$this->load->view('pelaku_usaha/transaksi/cetak', $data, FALSE);

	}

	// Unduh PDF
	public function pdf($kode_transaksi) 
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site = $this->konfigurasi_model->listing();

		$data = array( 	'title'				=> 'Riwayat Gabung',
			'header_transaksi'	=> $header_transaksi,
			'transaksi'			=> $transaksi,
			'site'	=> $site
		);
		// $this->load->view('pelapak/transaksi/cetak', $data, FALSE);
		$html = $this->load->view('pelaku_usaha/transaksi/cetak', $data, TRUE);
		$mpdf = new \Mpdf\Mpdf();

		// Write some HTML code:
		$mpdf->WriteHTML($html);

		// Output a PDF file directly to the browser
		$mpdf->Output();
	}

	// Pengiriman
	public function kirim($kode_transaksi) 
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site = $this->konfigurasi_model->listing();

		$data = array( 	'title'				=> 'Riwayat Gabung',
			'header_transaksi'	=> $header_transaksi,
			'transaksi'			=> $transaksi,
			'site'				=> $site
		);
		// $this->load->view('pelapak/transaksi/cetak', $data, FALSE);
		$html = $this->load->view('pelaku_usaha/transaksi/kirim', $data, TRUE);
		// Load fungsi mpdf
		$mpdf = new \Mpdf\Mpdf();

		// Setting header dan footer
		$mpdf->SetHTMLHeader('
			<div style="text-align: left; font-weight: bold;">
			<img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height: 50px;  width=auto;">
			</div>');
		$mpdf->SetHTMLFooter('
			<div style="padding: 10px 20px; background-color:grey; color:white; font-size:12px; ">
			Alamat: '.$site->namaweb.'('.$site->alamat.')<br>
			Telepon: '.$site->telepon.'
			</div>
			');
		// end setting header dan footer

		// Write some HTML code:
		$mpdf->WriteHTML($html);

		// Output tampil dengan nama baru
		$nama_file_pdf = url_title($site->namaweb,'dash','true').'-'.$kode_transaksi.'.pdf';
		$mpdf->Output($nama_file_pdf,'I');
	}



	public function konfirmasi_produk($id_produk)
	{
		$konfirm = $this->produk_model->konfirmProduk('produk',$id_produk);
		if($konfirm > 0){
			echo "Sukses";
			redirect('pelaku_usaha/transaksi');
		}else{
			echo 'Gagal !';
		}
	}

	public function status_setuju($kode_transaksi)
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
    	// $konfirm = $this->produk_model->konfirmProduk('produk',$id_produk);
		$stok_kurang = $this->input->post('id_produk'); 
		$data = array('status_sewa' => $this->input->post('status_sewa'));
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->update('header_transaksi', $data);

		$stok = $this->input->post('stok');
		$this->db->set('stok', "stok-$stok", FALSE);
		$this->db->where('id_produk',$stok_kurang);

		$this->db->update('produk');
		redirect('pelaku_usaha/transaksi');

	}


	public function status_selesai($kode_transaksi)
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
    	// $konfirm = $this->produk_model->konfirmProduk('produk',$id_produk);
		$stok_kurang = $this->input->post('id_produk'); 
		$data = array('status_sewa' => $this->input->post('status_sewa'));
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->update('header_transaksi', $data);

		$this->db->where('id_produk',$stok_kurang);
		
		$this->db->set('stok', 'stok + 1', FALSE);
		$this->db->update('produk');
		redirect('pelaku_usaha/transaksi');

	}



}

/* End of file Transaksi.php */
/* Location: ./application/controllers/pelapak/Transaksi.php */