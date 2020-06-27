<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasewalapak extends CI_Controller {

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
		$header_transaksi 	= $this->header_transaksi_model->listing();

		$data 	= array( 'title'	=> 'Data Transaksi',
						'header_transaksi'	=> $header_transaksi,
						'isi'	=> 'admin/datasewalapak/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		
	}

	// DETAIL
	public function detail($kode_transaksi) 
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array( 	'title'				=> 'Riwayat Sewaan',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'isi'				=> 'admin/datasewalapak/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	// CETAK
	public function cetak($kode_transaksi) 
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site = $this->konfigurasi_model->listing();

		$data = array( 	'title'				=> 'Riwayat Sewaan',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'	=> $site
					);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);

	}

	// Unduh Excel
	function excel($kode_transaksi)
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site = $this->konfigurasi_model->listing();
		$data = array( 	'title'				=> 'Riwayat Sewaan',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
					);

		$this->load->view('admin/transaksi/detail_excel', $data, FALSE);

	}

	// Unduh PDF
	public function pdf($kode_transaksi) 
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site = $this->konfigurasi_model->listing();

		$data = array( 	'title'				=> 'Riwayat Sewaan',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'	=> $site
					);
		// $this->load->view('admin/transaksi/cetak', $data, FALSE);
		$html = $this->load->view('admin/transaksi/cetak', $data, TRUE);
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

		$data = array( 	'title'				=> 'Riwayat Sewaan',
						'header_transaksi'	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
					);
		// $this->load->view('admin/transaksi/cetak', $data, FALSE);
		$html = $this->load->view('admin/transaksi/kirim', $data, TRUE);
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
		$nama_file_pdf = url_title($site->namaweb,'dash','true').'-'.$kode_transaksi.'.xls';
		$mpdf->Output($nama_file_pdf,'I');
	}


}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */