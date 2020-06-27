<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_konfirmasi_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// LISTING ALL USER

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('header_konfirmasi_pelapak');
		$this->db->order_by('id_pelapak', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail pelapak
	public function detail($id_pelapak)
	{
		$this->db->select('*');
		$this->db->from('header_konfirmasi_pelapak');
		$this->db->where('id_pelapak', $id_pelapak);
		$this->db->order_by('id_pelapak', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail header_transaksi
	public function id_pelapak($id_pelapak)
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
		$this->db->join('rekening', 'rekening.id_rekening = header_transaksi.id_rekening', 'left');
		// End join
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->where('transaksi.kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();

	}



	// Listing all header_konfirmasi dari pelapak
	public function konfirmasi_pelapak()
	{
		$this->db->select('header_konfirmasi_pelapak.*');
		$this->db->from('header_konfirmasi');
		$this->db->where('header_konfirmasi.id_pelapak', $id_pelapak);
		// Join
		$this->db->join('konfirmasi', 'konfirmasi.kode_konfirmasi = header_konfirmasi.kode_konfirmasi', 'left');
		// End join
		$this->db->group_by('header_konfirmasi.id_header_konfirmasi');
		$this->db->order_by('id_header_konfirmasi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	// Detail header_konfirmasi
	// public function kode_konfirmasi($kode_konfirmasi)
	// {
	// 	$this->db->select('header_konfirmasi.*,
	// 		pelapak.nama_pelapak,
	// 		rekening.nama_bank AS bank,
	// 		rekening.nomer_rekening,
	// 		rekening.nama_pemilik,
	// 		SUM(konfirmasi.jumlah) AS total_item');
	// 	$this->db->from('header_konfirmasi');
	// 	// Join
	// 	$this->db->join('konfirmasi', 'konfirmasi.kode_konfirmasi = header_konfirmasi.kode_konfirmasi', 'left');
	// 	$this->db->join('pelapak', 'pelapak.id_pelapak = header_konfirmasi.id_pelapak', 'left');
	// 	$this->db->join('rekening', 'rekening.id_rekening = header_konfirmasi.id_rekening', 'left');
	// 	// End join
	// 	$this->db->group_by('header_konfirmasi.id_header_konfirmasi');
	// 	$this->db->where('konfirmasi.kode_konfirmasi', $kode_konfirmasi);
	// 	$this->db->order_by('id_header_konfirmasi', 'desc');
	// 	$query = $this->db->get();
	// 	return $query->row();

	// }


	// Detail header_konfirmasi
	public function detail()
	{
		$this->db->select('*');
		$this->db->from('header_konfirmasi');
		$this->db->where('id_header_konfirmasi', $id_header_konfirmasi);
		$this->db->order_by('id_header_konfirmasi', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	


	//TAMBAH
	public function tambah($data)
	{
		$this->db->insert('header_konfirmasi',$data);

	}

	//Edit


	public function edit($data)
	{
		$this-> db->where('id_header_konfirmasi', $data['id_header_konfirmasi']);
		$this->db->update('header_konfirmasi',$data);
	}


	//Delete

	public function delete($data)
	{
		$this->db->where('id_header_konfirmasi', $data['id_header_konfirmasi']);
		$this->db->delete('header_konfirmasi',$data);
	}

} 

/* End of file Header_konfirmasi_model.php */ 
/* Location: ./application/models/Header_konfirmasi_model.php */