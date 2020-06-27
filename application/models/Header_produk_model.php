<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_produk_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// LISTING ALL USER

	public function listing($id_pelapak)
	{
		$this->db->select('produk.*, pelapak.nama_pelapak, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		$this->db->where('produk.id_pelapak', $id_pelapak);
		// JOIN
		$this->db->join('pelapak', 'pelapak.id_pelapak = produk.id_pelapak', 'left');

		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOINs
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all pelapak dari pelanggan
	// public function pelapak($id_pelapak)
	// {
	// 	$this->db->select('produk.*, pelapak.nama_pelapak, kategori.nama_kategori, kategori.slug_kategori,
	// 		COUNT(gambar.id_gambar) AS total_gambar');
	// 	$this->db->from('produk');
	// 	$this->db->where('produk.id_pelapak', $id_pelapak);
	// 	// Join
	// 	$this->db->join('pelapak', 'pelapak.id_pelapak = produk.id_pelapak', 'left');
	// 	$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
	// 	$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
	// 	// End join
	// 	$this->db->where('produk.status_produk', 'Publish');
	// 	$this->db->group_by('produk.id_pelapak');
	// 	$this->db->order_by('id_pelapak', 'desc');
	// 	//$this->db->order_by('id_produk', 'desc');
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }


	public function home()
	{
		$this->db->select('produk.*, pelapak.nama_pelapak, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		// JOIN
		$this->db->join('pelapak', 'pelapak.id_pelapak = produk.id_pelapak', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}

	// Read produk
	public function read($slug_produk)
	{
		$this->db->select('produk.*, pelapak.nama_pelapak, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		// JOIN
		$this->db->join('pelapak', 'pelapak.id_pelapak = produk.id_pelapak', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.slug_produk', $slug_produk);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Produk
	public function produk($limit,$start,$id_pelapak)
	{
		$this->db->select('produk.*, pelapak.nama_pelapak, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		// JOIN
		$this->db->join('pelapak', 'pelapak.id_pelapak = produk.id_pelapak', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOIN

		$this->db->where('produk.id_pelapak',$id_pelapak);
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// TOTAL PRODUK
	public function total_produk()
	{
		$this->db->select('COUNT(*)  AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$query = $this->db->get();
		return $query->row();

	}


	// Kategori Produk
	public function kategori($id_kategori,$limit,$start)
	{
		$this->db->select('produk.*, pelapak.nama_pelapak, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		// JOIN
		$this->db->join('pelapak', 'pelapak.id_pelapak = produk.id_pelapak', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.id_kategori', $id_kategori);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// TOTAL Kategori PRODUK
	public function total_kategori($id_kategori)
	{
		$this->db->select('COUNT(*)  AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();

	}



	// Detail produk
	public function detail($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	// LISTING KATEGORI
	public function listing_kategori()
	{
		$this->db->select('produk.*, pelapak.nama_pelapak, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		// JOIN
		$this->db->join('pelapak', 'pelapak.id_pelapak = produk.id_pelapak', 'left');

		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');

		// END JOIN
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}




	// Detail gambar produk
	public function detail_gambar($id_gambar)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_gambar', $id_gambar);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	// Gambar
	public function gambar($id_produk)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->result();
	}



	//TAMBAH
	public function tambah($data)
	{
		$this->db->insert('produk',$data);
	}

	//TAMBAH GAMBAR
	public function tambah_gambar($data)
	{
		$this->db->insert('gambar',$data);
	}


	//Edit

	public function edit($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk',$data);
	}


	//Delete

	public function delete($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk',$data);
	}

	//Delete

	public function delete_gambar($data)
	{
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar',$data);
	}

	public function produkAtas($id_pelapak)
	{
		$this->db->select('produk.*, pelapak.nama_pelapak, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		$this->db->where('produk.id_pelapak', $id_pelapak);
		// JOIN
		$this->db->join('pelapak', 'pelapak.id_pelapak = produk.id_pelapak', 'left');

		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOINs
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('stok', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function produkBawah($id_pelapak)
	{
		$this->db->select('produk.*, pelapak.nama_pelapak, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		$this->db->where('produk.id_pelapak', $id_pelapak);
		// JOIN
		$this->db->join('pelapak', 'pelapak.id_pelapak = produk.id_pelapak', 'left');

		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOINs
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('stok', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

} 

/* End of file Header_produk_model.php */ 
/* Location: ./application/models/Header_header_produk_model.php */