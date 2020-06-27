<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// LISTING ALL USER

	public function listing()
	{
		$this->db->select('header_transaksi.*,
			pelanggan.nama_pelanggan,SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		// Join
		$this->db->join('produk', 'produk.id_produk = header_transaksi.id_produk', 'left');
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		// End join
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_id($id_pelapak)
	{
		$this->db->select('header_transaksi.*,
			pelanggan.nama_pelanggan,SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		$this->db->where('produk.id_pelapak', $id_pelapak);
		// Join
		$this->db->join('produk', 'produk.id_produk = header_transaksi.id_produk', 'left');
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		// End join
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all header_transaksi dari pelanggan
	public function pelanggan($id_pelanggan)
	{
		$this->db->select('header_transaksi.*,SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		$this->db->where('header_transaksi.id_pelanggan', $id_pelanggan);
		// Join
		$this->db->join('produk', 'produk.id_produk = header_transaksi.id_produk', 'left');
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		// End join
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	

	// Detail header_transaksi
	public function kode_transaksi($kode_transaksi)
	{

		$this->db->select('header_transaksi.*,
			pelanggan.nama_pelanggan,
			rekening.nama_bank AS bank,
			rekening.nomer_rekening,
			rekening.nama_pemilik,
			SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		// Join
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		$this->db->join('rekening', 'rekening.id_pelapak = header_transaksi.id_pelapak', 'left');
		$this->db->join('produk', 'produk.id_produk = header_transaksi.id_produk', 'left');
		// End join
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->where('transaksi.kode_transaksi', $kode_transaksi);
		// $this->db->where('rekening.id_pelapak','header_transaksi.id_pelapak' );
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();

	}


	// Detail header_transaksi
	public function detail($id_header_transaksi)
	{
		$this->db->select('*');
		$this->db->from('header_transaksi');
		$this->db->where('id_header_transaksi', $id_header_transaksi);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();

	}



	//TAMBAH
	public function tambah($data)
	{
		$this->db->insert('header_transaksi',$data);

	}

	//Edit


	public function edit($data)
	{
		$this->db->where('id_header_transaksi', $data['id_header_transaksi']);
		$this->db->update('header_transaksi',$data);
	}


	//Delete

	public function delete($data)
	{
		$this->db->where('id_header_transaksi', $data['id_header_transaksi']);
		$this->db->delete('header_transaksi',$data);
	}


	public function pelapakatas()
	{
		$this->db->select('header_transaksi.*,
			pelanggan.nama_pelanggan,SUM(transaksi.jumlah) AS total_item');
		$this->db->select('COUNT(header_transaksi.id_pelapak) AS pelapakteratas');
		$this->db->from('header_transaksi');
		$this->db->join('produk', 'produk.id_produk = header_transaksi.id_produk', 'left');
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		$this->db->group_by('header_transaksi.id_pelapak');
		$this->db->order_by('COUNT(header_transaksi.id_pelapak)', 'desc');
		$query = $this->db->get();
		return $query->result();
		//SELECT *,COUNT(id_pelapak) FROM `header_transaksi` GROUP BY id_pelapak ORDER BY COUNT(id_pelapak) DESC;
	}

	public function pelangganatas()
	{
		$this->db->select('header_transaksi.*,
			pelanggan.nama_pelanggan,SUM(transaksi.jumlah) AS total_item');
		$this->db->select('COUNT(header_transaksi.id_pelanggan) AS pelangganteratas');
		$this->db->from('header_transaksi');

		$this->db->join('produk', 'produk.id_produk = header_transaksi.id_produk', 'left');
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		$this->db->group_by('header_transaksi.id_pelanggan');
		$this->db->order_by('COUNT(header_transaksi.id_pelanggan)', 'desc');
		$query = $this->db->get();
		return $query->result();
		//SELECT *,COUNT(id_pelapak) FROM `header_transaksi` GROUP BY id_pelapak ORDER BY COUNT(id_pelapak) DESC;
	}

} 

/* End of file Header_transaksi_model.php */ 
/* Location: ./application/models/Header_transaksi_model.php */