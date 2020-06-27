<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->database();
	// }

	// LISTING ALL USER

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail pelanggan
	public function detail($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();

	}



		// Login pelanggan
	public function login($email_pelanggan,$password)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array(		'email_pelanggan'	=>$email_pelanggan,
			'password'		=> SHA1($password)
		));
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();

	}	

	// SUdah Login pelanggan
	public function sudah_login($email_pelanggan,$nama_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array(		'email_pelanggan'	=>$email_pelanggan,
			'nama_pelanggan'		=> $nama_pelanggan
		));
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();

	}	
	
	//TAMBAH
	public function tambah($data)
	{
		$this->db->insert('pelanggan',$data);
	}

	public function tambah_ktp($data)
	{
		$this->db->insert('gambar',$data);
	}

	public function insert($user){
		$this->db->insert('pelanggan', $user);
		return $this->db->insert_id(); 
	}


	public function listing_kotkab()
	{
		$this->db->select('*');
		$this->db->from('kotkab');
		$query = $this->db->get();
		return $query->result();
	}

	// public function listing_kecamatan($id)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('kecamatan');
	// 	$this->db->where('id_kotkab', $id);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }



	function get_kota(){
		$hasil=$this->db->query("SELECT * FROM kota");
		return $hasil; 
	}

	function get_kecamatan($id){
		$hasil = $this->db->query("SELECT * FROM kecamatan WHERE kecamatan_kota_id='$id'");
		return $hasil->result();
	}

    // function listing_kecamatan($id){
    //     $data=$this->db->query("SELECT * FROM kecamatan WHERE id_kotkab='$id'");
    //     return $data->result();
    // }

	function get_desa($id){
		$data=$this->db->query("SELECT * FROM desa WHERE id_kecamatan='$id'");
		return $data->result();
	}



	//Edit


	public function edit($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('pelanggan',$data);
	}


	//Delete

	public function delete($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->delete('pelanggan',$data);
	}

} 

/* End of file Pelanggan_model.php */ 
/* Location: ./application/models/Pelanggan_model.php */