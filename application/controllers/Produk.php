<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	// Load DATABASE
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');

	}

	// Listing data produk
	public function index()
	{
		$filter = $this->input->post('filter');
		if ($filter==1) {
			$site = $this->konfigurasi_model->listing();
			$listing_kategori = $this->produk_model->listing_kategori();
		// Ambil data total 
			$total	= $this->produk_model->total_produk();
		// Paginasi start
			$this->load->library('pagination');

			$config['base_url'] 		= base_url().'produk/index/';
			$config['total_rows'] 		= $total->total;
			$config['use_page_numbers']	= TRUE;
			$config['per_page'] 		= 6;
			$config['uri_segment'] 		= 3;
			$config['num_links']		= 5;
			$config['full_tag_open'] 	= '<ul class="pagination">';
			$config['full_tag_close'] 	= '</ul>';
			$config['first_link'] 		= 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li class="disabled"><li class="active"><a href="#">';
			$config['last_tag_close'] = '<span class="sr-only"></a></li></li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<div>';
			$config['next_tag_close'] = '</div>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<div>';
			$config['prev_tag_close'] = '</div>';
			$config['cur_tag_open'] = '<b>';
			$config['cur_tag_close'] = '</b>';
			$config['first_url']	= base_url().'/produk/';

			$this->pagination->initialize($config);

		// Ambil data produk pelaku usaha

			$page 	= ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
			$produk 	= $this->produk_model->produkAtas($config['per_page'],$page);

		// Paginasi end



			$data = array('title'	=> 'Produk Pelaku Usaha',
				'site'	=> 'Fe-Preneur',
				'listing_kategori' => $listing_kategori,
				'produk'	=> $produk,
				'pagin'	=> $this->pagination->create_links(),
				'isi'	=>	'produk/list'
			);
			$this->load->view('layout/wrapper', $data, FALSE);	
		}else if ($filter==2) {
			$site = $this->konfigurasi_model->listing();
			$listing_kategori = $this->produk_model->listing_kategori();
		// Ambil data total 
			$total	= $this->produk_model->total_produk();
		// Paginasi start
			$this->load->library('pagination');

			$config['base_url'] 		= base_url().'produk/index/';
			$config['total_rows'] 		= $total->total;
			$config['use_page_numbers']	= TRUE;
			$config['per_page'] 		= 6;
			$config['uri_segment'] 		= 3;
			$config['num_links']		= 5;
			$config['full_tag_open'] 	= '<ul class="pagination">';
			$config['full_tag_close'] 	= '</ul>';
			$config['first_link'] 		= 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li class="disabled"><li class="active"><a href="#">';
			$config['last_tag_close'] = '<span class="sr-only"></a></li></li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<div>';
			$config['next_tag_close'] = '</div>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<div>';
			$config['prev_tag_close'] = '</div>';
			$config['cur_tag_open'] = '<b>';
			$config['cur_tag_close'] = '</b>';
			$config['first_url']	= base_url().'/produk/';

			$this->pagination->initialize($config);

		// Ambil data produk

			$page 	= ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
			$produk 	= $this->produk_model->produkBawah($config['per_page'],$page);

		// Paginasi end



			$data = array('title'	=> 'Produk Pelaku Usaha',
				'site'	=> 'Fe-Preneur',
				'listing_kategori' => $listing_kategori,
				'produk'	=> $produk,
				'pagin'	=> $this->pagination->create_links(),
				'isi'	=>	'produk/list'
			);
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			$site = $this->konfigurasi_model->listing();
			$listing_kategori = $this->produk_model->listing_kategori();
		// Ambil data total 
			$total	= $this->produk_model->total_produk();
		// Paginasi start
			$this->load->library('pagination');
			
			$config['base_url'] 		= base_url().'produk/index/';
			$config['total_rows'] 		= $total->total;
			$config['use_page_numbers']	= TRUE;
			$config['per_page'] 		= 6;
			$config['uri_segment'] 		= 3;
			$config['num_links']		= 5;
			$config['full_tag_open'] 	= '<ul class="pagination">';
			$config['full_tag_close'] 	= '</ul>';
			$config['first_link'] 		= 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li class="disabled"><li class="active"><a href="#">';
			$config['last_tag_close'] = '<span class="sr-only"></a></li></li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<div>';
			$config['next_tag_close'] = '</div>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<div>';
			$config['prev_tag_close'] = '</div>';
			$config['cur_tag_open'] = '<b>';
			$config['cur_tag_close'] = '</b>';
			$config['first_url']	= base_url().'/produk/';
			
			$this->pagination->initialize($config);

		// Ambil data produk

			$page 	= ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
			$produk 	= $this->produk_model->produk($config['per_page'],$page);

		// Paginasi end



			$data = array('title'	=> 'Produk Pelaku Usaha',
				'site'	=> 'Fe-Preneur',
				'listing_kategori' => $listing_kategori,
				'produk'	=> $produk,
				'pagin'	=> $this->pagination->create_links(),
				'isi'	=>	'produk/list'
			);
			$this->load->view('layout/wrapper', $data, FALSE);
		}
	}

	// Listing data kategori produk
	public function kategori($slug_kategori)
	{
		
		$kategori = $this->kategori_model->read($slug_kategori);
		$id_kategori = $kategori->id_kategori;
		// Data global
		$site = $this->konfigurasi_model->listing();
		$listing_kategori = $this->produk_model->listing_kategori();
		// Ambil data total 
		$total	= $this->produk_model->total_produk($id_kategori);
		// Paginasi start
		$this->load->library('pagination');

		$config['base_url'] 		= base_url().'produk/kategori/'.$slug_kategori.'/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 6;
		$config['uri_segment'] 		= 5;
		$config['num_links']		= 5;
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] = '<li>'; 
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] = '<span class="sr-only"></a></li></li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div>';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div>';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';
		$config['first_url']	= base_url().'/produk/kategori/'.$slug_kategori;

		$this->pagination->initialize($config);

		// Ambil data produk Pelaku Usaha
		$page 	= ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
		$produk 	= $this->produk_model->kategori($id_kategori, $config['per_page'],$page);
			// Paginasi end
		$data = array('title'	=> $kategori->nama_kategori,
			'site'	=> 'Fe-Preneur',
			'listing_kategori' => $listing_kategori,
			'produk'	=> $produk,
			'pagin'	=> $this->pagination->create_links(),
			'isi'	=>	'produk/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);

	}



	// Detail produk
	public function detail($slug_produk)
	{
		$site = $this->konfigurasi_model->listing();
		$produk = $this->produk_model->read($slug_produk);
		$id_produk = $produk->id_produk;
		$gambar	= $this->produk_model->gambar($id_produk);
		$produk_related = $this->produk_model->home();

		$data = array('title'	=> $produk->nama_produk,
			'site'	=> 'Fe-Preneur',
			'produk'	=> $produk,
			'produk_related'	=> $produk_related,
			'gambar'	=> $gambar,
			'isi'	=>	'produk/detail'
		);
		$this->load->view('layout/wrapper', $data, FALSE);

	}

	// Tawarkan produk
	public function tawarkan($slug_produk)
	{
		$site = $this->konfigurasi_model->listing();
		$produk = $this->produk_model->read($slug_produk);
		$id_produk = $produk->id_produk;
		$gambar	= $this->produk_model->gambar($id_produk);
		$produk_related = $this->produk_model->home();

		$data = array('title'	=> $produk->nama_produk,
			'site'	=> 'Fe-Preneur',
			'produk'	=> $produk,
			'produk_related'	=> $produk_related,
			'gambar'	=> $gambar,
			'isi'	=>	'produk/tawarkan'
		);
		$this->load->view('layout/wrapper', $data, FALSE);

	}


	public function filterRating($slug_kategori){
		$fil = $this->input->post('filter');
		if($fil==1){
			// KAtegori detail
			$kategori = $this->kategori_model->read($slug_kategori);
			$id_kategori = $kategori->id_kategori;
		// Data global
			$site = $this->konfigurasi_model->listing();
			$listing_kategori = $this->produk_model->listing_kategori();
		// Ambil data total 
			$total	= $this->produk_model->total_produk($id_kategori);
		// Paginasi start
			$this->load->library('pagination');

			$config['base_url'] 		= base_url().'produk/kategori/'.$slug_kategori.'/index/';
			$config['total_rows'] 		= $total->total;
			$config['use_page_numbers']	= TRUE;
			$config['per_page'] 		= 6;
			$config['uri_segment'] 		= 5;
			$config['num_links']		= 5;
			$config['full_tag_open'] 	= '<ul class="pagination">';
			$config['full_tag_close'] 	= '</ul>';
			$config['first_link'] 		= 'First';
			$config['first_tag_open'] = '<li>'; 
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li class="disabled"><li class="active"><a href="#">';
			$config['last_tag_close'] = '<span class="sr-only"></a></li></li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<div>';
			$config['next_tag_close'] = '</div>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<div>';
			$config['prev_tag_close'] = '</div>';
			$config['cur_tag_open'] = '<b>';
			$config['cur_tag_close'] = '</b>';
			$config['first_url']	= base_url().'/produk/kategori/'.$slug_kategori;

			$this->pagination->initialize($config);

		// Ambil data produk
			$page 	= ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
			$produk 	= $this->produk_model->rating_teratas($id_kategori, $config['per_page'],$page);
			// Paginasi end
			$data = array('title'	=> $kategori->nama_kategori,
				'site'	=> 'Fe-Preneur',
				'listing_kategori' => $listing_kategori,
				'produk'	=> $produk,
				'pagin'	=> $this->pagination->create_links(),
				'isi'	=>	'produk/list'
			);
			$this->load->view('layout/wrapper', $data, FALSE);
		}else if ($fil==2) {
			// KAtegori detail
			$kategori = $this->kategori_model->read($slug_kategori);
			$id_kategori = $kategori->id_kategori;
		// Data global
			$site = $this->konfigurasi_model->listing();
			$listing_kategori = $this->produk_model->listing_kategori();
		// Ambil data total 
			$total	= $this->produk_model->total_produk($id_kategori);
		// Paginasi start
			$this->load->library('pagination');

			$config['base_url'] 		= base_url().'produk/kategori/'.$slug_kategori.'/index/';
			$config['total_rows'] 		= $total->total;
			$config['use_page_numbers']	= TRUE;
			$config['per_page'] 		= 6;
			$config['uri_segment'] 		= 5;
			$config['num_links']		= 5;
			$config['full_tag_open'] 	= '<ul class="pagination">';
			$config['full_tag_close'] 	= '</ul>';
			$config['first_link'] 		= 'First';
			$config['first_tag_open'] = '<li>'; 
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li class="disabled"><li class="active"><a href="#">';
			$config['last_tag_close'] = '<span class="sr-only"></a></li></li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<div>';
			$config['next_tag_close'] = '</div>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<div>';
			$config['prev_tag_close'] = '</div>';
			$config['cur_tag_open'] = '<b>';
			$config['cur_tag_close'] = '</b>';
			$config['first_url']	= base_url().'/produk/kategori/'.$slug_kategori;

			$this->pagination->initialize($config);

		// Ambil data produk
			$page 	= ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
			$produk 	= $this->produk_model->rating_terbawah($id_kategori, $config['per_page'],$page);
			// Paginasi end
			$data = array('title'	=> $kategori->nama_kategori,
				'site'	=> 'Fe-Preneur',
				'listing_kategori' => $listing_kategori,
				'produk'	=> $produk,
				'pagin'	=> $this->pagination->create_links(),
				'isi'	=>	'produk/list'
			);
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			// KAtegori detail
			$kategori = $this->kategori_model->read($slug_kategori);
			$id_kategori = $kategori->id_kategori;
		// Data global
			$site = $this->konfigurasi_model->listing();
			$listing_kategori = $this->produk_model->listing_kategori();
		// Ambil data total 
			$total	= $this->produk_model->total_produk($id_kategori);
		// Paginasi start
			$this->load->library('pagination');

			$config['base_url'] 		= base_url().'produk/kategori/'.$slug_kategori.'/index/';
			$config['total_rows'] 		= $total->total;
			$config['use_page_numbers']	= TRUE;
			$config['per_page'] 		= 6;
			$config['uri_segment'] 		= 5;
			$config['num_links']		= 5;
			$config['full_tag_open'] 	= '<ul class="pagination">';
			$config['full_tag_close'] 	= '</ul>';
			$config['first_link'] 		= 'First';
			$config['first_tag_open'] = '<li>'; 
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li class="disabled"><li class="active"><a href="#">';
			$config['last_tag_close'] = '<span class="sr-only"></a></li></li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<div>';
			$config['next_tag_close'] = '</div>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<div>';
			$config['prev_tag_close'] = '</div>';
			$config['cur_tag_open'] = '<b>';
			$config['cur_tag_close'] = '</b>';
			$config['first_url']	= base_url().'/produk/kategori/'.$slug_kategori;

			$this->pagination->initialize($config);

		// Ambil data produk
			$page 	= ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
			$produk 	= $this->produk_model->kategori($id_kategori, $config['per_page'],$page);
		// Paginasi end
			$data = array('title'	=> $kategori->nama_kategori,
				'site'	=> 'Fe-Preneur',
				'listing_kategori' => $listing_kategori,
				'produk'	=> $produk,
				'pagin'	=> $this->pagination->create_links(),
				'isi'	=>	'produk/list'
			);
			$this->load->view('layout/wrapper', $data, FALSE);

		}
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
				'isi'			=> 'pelapak/produk/list'
			);
			$this->load->view('pelapak/layout/wrapper', $data, FALSE);

		}elseif ($filters == 2) {
			$id_pelapak = $this->session->userdata('id_pelapak');
			$pelapak 			= $this->pelapak_model->detail($id_pelapak);
			$produk = $this->header_produk_model->produkBawah($id_pelapak);

			$data = array('title' => 'Data Produk Pelaku Usaha',
				'produk' 		=> $produk,
				'id_pelapak'	=> $id_pelapak,
				'pelapak'		=> $pelapak,
				'isi'			=> 'pelapak/produk/list'
			);
			$this->load->view('pelapak/layout/wrapper', $data, FALSE);
		}else{
			$id_pelapak = $this->session->userdata('id_pelapak');
			$pelapak 			= $this->pelapak_model->detail($id_pelapak);
			$produk = $this->header_produk_model->listing($id_pelapak);

			$data = array('title' => 'Data Produk Pelaku Usaha',
				'produk' 		=> $produk,
				'id_pelapak'	=> $id_pelapak,
				'pelapak'		=> $pelapak,
				'isi'			=> 'pelapak/produk/list'
			);
			$this->load->view('pelapak/layout/wrapper', $data, FALSE);
		}
	}


}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */