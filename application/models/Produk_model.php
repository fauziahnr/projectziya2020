<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// LISTING ALL USER

	public function listing()
	{
		$this->db->select('produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');

		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// END JOIN
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_product_keyword($keyword){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->like('nama_produk',$keyword);
		$this->db->or_like('harga',$keyword);
		return $this->db->get()->result();
	}
	


	public function home()
	{
		$this->db->select('produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar, AVG(rating.rating) as rating');
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		$this->db->join('rating', 'produk.id_produk = rating.produk_id', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}

	// public function ratingProduk(){
	// 	$this->db->select('produk.*');
	// 	$this->db->select('AVG(rating.rating) as rating');
	// 	$this->db->from('produk');
	// 	$this->db->join('prod', 'table.column = table.column', 'left');
	// }

	// Read produk
	public function read($slug_produk)
	{
		$this->db->select('produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar, AVG(rating.rating) as rating');
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		$this->db->join('rating', 'produk.id_produk = rating.produk_id', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.slug_produk', $slug_produk);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// Produk
	public function produk($limit,$start)
	{
		$this->db->select('produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar, AVG(rating.rating) as rating');
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		$this->db->join('rating', 'produk.id_produk = rating.produk_id', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	public function produkAtas($limit,$start)
	{
		$this->db->select('produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar, AVG(rating.rating) as rating');
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		$this->db->join('rating', 'produk.id_produk = rating.produk_id', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('rating', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	public function produkBawah($limit,$start)
	{
		$this->db->select('produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar, AVG(rating.rating) as rating');
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		$this->db->join('rating', 'produk.id_produk = rating.produk_id', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('rating', 'desc');
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
		$this->db->select('produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar, AVG(rating.rating) as rating');
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		$this->db->join('rating', 'produk.id_produk = rating.produk_id', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.id_kategori', $id_kategori);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}


	//=====================================================
	public function rating_teratas($id_kategori,$limit,$start)
	{
		$this->db->select('produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar, AVG(rating.rating) as rating');
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		$this->db->join('rating', 'produk.id_produk = rating.produk_id', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.id_kategori', $id_kategori);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('rating', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	public function rating_terbawah($id_kategori,$limit,$start)
	{
		$this->db->select('produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar, AVG(rating.rating) as rating');
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		$this->db->join('rating', 'produk.id_produk = rating.produk_id', 'left');
		// END JOIN
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.id_kategori', $id_kategori);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('rating', 'ASC');
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
		$this->db->select('produk.*, users.nama, kategori.nama_kategori, kategori.slug_kategori,
			COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		// JOIN
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');

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

	public function konfirmProduk($table_name,$id_produk)
	{
		$this->db->where('id_produk',$id_produk);
		$this->db->set('stok', 'stok - 1', FALSE);
		$konfirm = $this->db->update($table_name);
		return $konfirm;
	}

	//----------------------------------------------------------
	function get_produk_data()
	{
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get('produk');
	}

	function get_produk_rating($produk_id)
	{
		$this->db->select('AVG(rating) as rating');
		$this->db->from('rating');
		$this->db->where('produk_id', $produk_id);
		$data = $this->db->get();
		foreach($data->result_array() as $row)
		{
			return $row["rating"];
		}
	}

	function rating_produk()
	{
		$data = $this->get_produk_data();
		$output = '';
		foreach($data->result_array() as $row)
		{
			$color = '';
			$rating = $this->get_produk_rating($row["id_produk"]);
			$output .= '
			<h3 class="text-primary">'.$row["nama_produk"].'</h3>
			<ul class="list-inline" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">
			';
			for($count = 1; $count <= 5; $count++)
			{
				if($count <= $rating)
				{
					$color = 'color:#ffcc00;';
				}
				else
				{
					$color = 'color:#ccc;';
				}

				$output .= '<li title="'.$count.'" id_produk="'.$row['id_produk'].'-'.$count.'" data-index="'.$count.'" data-produk_id="'.$row["id_produk"].'" data-rating="'.$rating.'" class="rating" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
			}
			$output .= '</ul>
			<p>'.$row["keterangan"].'</p>
			<label style="text-danger">'.$row["slug_produk"].'</label>
			<hr />
			';
		}
		echo $output;
	}

	function insert_rating($data)
	{
		$this->db->insert('rating', $data);
	}
} 

/* End of file Produk_model.php */ 
/* Location: ./application/models/Produk_model.php */