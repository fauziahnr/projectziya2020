<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');

	}

	//halaman utama website-homepage
	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$kategori = $this->konfigurasi_model->nav_produk();
		$produk = $this->produk_model->home();
		$data = array(	'title'	=> $site->namaweb.' | '.$site->tagline,
			'keywords' => $site->keywords,
			'deskripsi'	=> $site->deskripsi,
			'site'	=> $site,
			'kategori'	=> $kategori,
			'produk'	=> $produk,
			'isi'	=> 'home/list');
		$this->load->view('layout/wrapper', $data, FALSE);

		
	}

	public function search(){
		$keyword = $this->input->post('keyword');
		$data['products']=$this->produk_model->get_product_keyword($keyword);
		$this->load->view('layout/wrapper',$data);
	}

	public function fetch()
	{
		echo $this->produk_model->rating_produk();
	}

	public function insert()
	{
		if($this->input->post('produk_id'))
		{
			$data = array(
				'produk_id'  => $this->input->post('produk_id'),
				'rating'   => $this->input->post('index')
			);
			$this->produk_model->insert_rating($data);
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */