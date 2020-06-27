<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelapak_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// LISTING ALL USER

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pelapak');
		$this->db->order_by('id_pelapak', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	
	// public function editpelapak($id_pelapak)
	// {
	// 	$this->db->where('id_pelapak', $data['id_pelapak']);
	// 	$this->db->set('is_active', 1);
	// 	$this->db->update('pelapak',$data);		

	// }


	// LISTING ALL transaksi berdasarkan header
	public function kode_konfirmasi($id_pelapak)
	{
		$this->db->select('konfirmasi_pelapak.*, produk.nama_produk, produk.kode_produk');
		$this->db->from('transaksi');
		$this->db->where('kode_transaksi', $kode_transaksi);
		// Join dngan produk
		$this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
		// End join
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	// Detail pelapak
	public function detail($id_pelapak)
	{
		$this->db->select('*');
		$this->db->from('pelapak');
		$this->db->where('id_pelapak', $id_pelapak);
		$this->db->order_by('id_pelapak', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	// Detail header_transaksi
	public function id_pelapak($id_pelapak)
	{
		$this->db->select('header_konfirmasi_pelapak.*,
			pelapak.nama_pelapak,
			rekening.nama_bank AS bank,
			rekening.nomer_rekening,
			rekening.nama_pemilik');
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


		// Login pelapak
	public function login($email_pelapak,$password)
	{
		$this->db->select('*');
		$this->db->from('pelapak');
		$this->db->where(array(		'email_pelapak'	=>$email_pelapak,
									'password'		=> SHA1($password)
						));
		$this->db->order_by('id_pelapak', 'desc');
		$query = $this->db->get();
		return $query->row();

	}	

	public function forgotPassword($email_pelapak)
	{
		$this->db->select('*');
		$this->db->from('pelapak');
		$this->db->where(array(		'email_pelapak'	=>$email_pelapak
						));
		$this->db->order_by('id_pelapak', 'desc');
		$query = $this->db->get();
		return $query->row();

	}	

	// SUdah Login pelapak
	public function sudah_login($email_pelapak,$nama_pelapak)
	{
		$this->db->select('*');
		$this->db->from('pelapak');
		$this->db->where(array(		'email_pelapak'	=>$email_pelapak,
									'nama_pelapak'		=> $nama_pelapak
						));
		$this->db->order_by('id_pelapak', 'desc');
		$query = $this->db->get();
		return $query->row();

	}	
	
	//TAMBAH
	public function tambah($data)
	{
		$this->db->insert('pelapak',$data);

	}

	//Edit


	public function edit($data)
	{
		$this->db->where('id_pelapak', $data['id_pelapak']);
		$this->db->update('pelapak',$data);
	} 


	public function editpassword($data)
	{
		$this->db->where('email_pelapak', $data['email_pelapak']);
		$this->db->update('pelapak',$data);
	}





	//Delete

	public function delete($data)
	{
		$this->db->where('id_pelapak', $data['id_pelapak']);
		$this->db->delete('pelapak',$data);
	}



	public function upload_foto_bukti($table_name, $data, $id)
	{
		$this->db->where('id_pelapak', $id);
		$uploadfoto = $this->db->update($table_name, $data);
		return $uploadfoto;
	}

	public function upload_foto_profil($table_name, $data, $id)
	{
		$this->db->where('id_pelapak', $id);
		$uploadfoto = $this->db->update($table_name, $data);
		return $uploadfoto;
	}
} 

/* End of file Pelapak_model.php */ 
/* Location: ./application/models/Pelapak_model.php */