<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// LISTING ALL USER

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->order_by('id_rekening', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_id($id_pelapak)
	{
		$this->db->select('rekening.*');
		$this->db->from('rekening');
		$this->db->where('rekening.id_pelapak', $id_pelapak);
		// Join
		$this->db->join('pelapak', 'pelapak.id_pelapak = rekening.id_pelapak', 'left');
		// End join
		// $this->db->group_by('rekening.id_rekening');
		$this->db->order_by('id_rekening', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail rekening
	public function detail($id_rekening)
	{
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->where('id_rekening', $id_rekening);

		$this->db->join('pelapak', 'pelapak.id_pelapak = rekening.id_pelapak', 'left');
		$this->db->order_by('id_rekening', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	// Detail slug rekening
	public function read($slug_rekening)
	{
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->where('slug_rekening', $slug_rekening);
		$this->db->order_by('id_rekening', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	// Login rekening
	public function login($rekeningname,$password)
	{
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->where(array( 'rekeningname' => $rekeningname,
								'password' => SHA1($password)));
		$this->db->order_by('id_rekening', 'desc');
		$query = $this->db->get();
		return $query->row();

	}



	//TAMBAH
	public function tambah($data)
	{
		$this->db->insert('rekening',$data);
	}

	//Edit


	public function edit($data)
	{
		$this->db->where('id_rekening', $data['id_rekening']);
		$this->db->update('rekening',$data);
	}


	//Delete

	public function delete($data)
	{
		$this->db->where('id_rekening', $data['id_rekening']);
		$this->db->delete('rekening',$data);
	}

} 

/* End of file Rekening_model.php */ 
/* Location: ./application/models/Rekening_model.php */