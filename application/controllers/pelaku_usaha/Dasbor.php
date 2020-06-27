<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelapak_model');
		$this->load->model('rekening_model');

		// Halaman ini diproteksi dengan simple pelapak => Cek Login
		$this->simple_pelapak->cek_login();
	}

	// Halaman Utama dasbor pelaku usaha
	public function index()
	{

		$id_pelapak		= $this->session->userdata('id_pelapak');
		
		$pelapak 			= $this->pelapak_model->detail($id_pelapak);
		$data = array('title'	=> 'Halaman Dasbor Pelaku Usaha',
				'pelapak'	=> $pelapak,
				'isi'	=> 'pelaku_usaha/dasbor/list'
				);

		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);
		
	}

	public function profil()
	{
			// Ambil data login dari session
		$id_pelapak			= $this->session->userdata('id_pelapak');

		$pelapak			= $this->pelapak_model->detail($id_pelapak);

		//Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelapak','Nama Lengkap','required', array( 'required'	=> '%s harus diisi' ) );
		$valid->set_rules('telepon','Telepon','required|min_length[10]|max_length[13]', array( 'required'	=> '%s harus diisi', 'min_length' => '%s nomor telepon kurang dari 10', 'max_length' => '%s nomor telepon melebihi 13 karakter' ));
		// $valid->set_rules('password','Password','required', array( 'required'	=> '%s harus diisi' ));
		$valid->set_rules('alamat','Alamat','required', array( 'required'	=> '%s harus diisi' ) );


		if($valid->run()===FALSE) {
			//End Validasi

		$data = array( 	'title'				=> 'Data Akun Pelaku Usaha',
						'id_pelapak'		=> $id_pelapak,
						'pelapak'			=> $pelapak,
						'isi'				=> 'pelaku_usaha/dasbor/profil'
					);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
		$i = $this->input;
		// Jika password lebih dari 6 karakter, maka ganti password
		if(strlen($i->post('password')) >= 6) {

			$data = array( 	'id_pelapak'		=> $id_pelapak,
							'nama_pelapak'		=> $i->post('nama_pelapak'),
							// 'email_pelapak'		=> $i->post('email_pelapak'),
							// 'username'			=> $i->post('username'),
							'password'			=> SHA1($i->post('password')),
							'telepon'			=> $i->post('telepon')

						);
		}else{
			// Jika password kurang dari 6 maka tidak diganti
				$data = array('id_pelapak'			=> $id_pelapak,
							'nama_pelapak'			=> $i->post('nama_pelapak'),
							// 'email_pelapak'			=> $i->post('email_pelapak'),
							// 'username'			=> $i->post('username'),
							'telepon'			=> $i->post('telepon')
						);
			// End data Update

		}
		$this->pelapak_model->edit($data);
		// End create session

		$this->session->set_flashdata('sukses', 'Update profil berhasil');
		redirect(base_url('pelaku_usaha/dasbor/profil'),'refresh');
	}
	// End masuk database
	}

	public function konfirmasi()
	{	$id_pelapak			= $this->session->userdata('id_pelapak');

		$pelapak 			= $this->pelapak_model->detail($id_pelapak);
		
		$valid = $this->form_validation;
		

		if($valid->run()) {
			// Check jika foto_bukti diganti
			if(!empty($_FILES['foto_bukti']['name'])) {

			$config['upload_path'] 			= './assets/upload/image/';
			$config['allowed_types']	 	= 'gif|jpg|png|jpeg';
			$config['max_size']  			= '3000'; //dalam KB
 			$config['max_width']  			= '2024';
			$config['max_height']  			= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto_bukti')){
				
			//End Validasi
		$data = array ('title'	=>	'Konfirmasi Pembayaran Akun',
						'pelapak'	=> $pelapak,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> '      pelaku_usaha/dasbor/konfirmasi'
	);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);

		// Masuk Database
	}else{
		$upload_foto_bukti = array('upload_data' => $this->upload->data());
			
			// Create thumbnail foto_bukti
		$config['image_library'] = 'gd2';
		$config['source_image'] = './assets/upload/image/'.$upload_foto_bukti['upload_data']['file_name'];
		// Lokasi folder thumbnail
		$config['new_image']	= './assets/upload/image/thumbs/';
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 250;//pixel
		$config['height']       = 250;
		$config['thumb_marker'] = '';

$this->load->library('image_lib', $config);

$this->image_lib->resize();


			// End create thumbnail 
		
		$i = $this->input;

		$data = array( 	
						'id_pelapak'			=> $id_pelapak,
						'nama_pelapak'		=> $i->post('nama_pelapak'),
						// disimpan nama file foto_bukti
						'bukti_bayar'		=> 'Sudah',
						'foto_bukti'			=> $upload_foto_bukti['upload_data']['file_name']
						
					);
		$this->pelapak_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah edit');
		redirect(base_url('pelaku_usaha/dasbor/konfirmasi'),'refresh');
	}}else{
		// edit pelapak tanpa edit foto_bukti
		$i = $this->input;
		// SLUG PRODUK

		$data = array( 	
						'id_pelapak'			=> $id_pelapak,
						'nama_pelapak'		=> $i->post('nama_pelapak'),

						'bukti_bayar'		=> 'Sudah'
						// disimpan nama file foto_bukti tidak diganti
						
						// 'foto_bukti'			=> $upload_foto_bukti['upload_data']['file_name'],
						
					);
		$this->pelapak_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah edit');
		redirect(base_url('pelaku_usaha/dasbor/konfirmasi'),'refresh');
	

	}}
	// End masuk database
	$data = array (	'title'		=> 'Konfirmasi Pembayaran Akun',
					'pelapak'	=> $pelapak,
					'isi'		=> 'pelaku_usaha/dasbor/konfirmasi'
	);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);
	}


 public function uploadfotoBukti($id)
    {	
        $foto_bukti      = $_POST['foto_bukti'];
        if ($foto_bukti=''){}else{
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto_bukti')){
                echo "Upload gagal"; die();
            }else{
                $foto_bukti=$this->upload->data('file_name');
            }
        }
        
		$data = array('bukti_bayar' => 'Sudah', 'foto_bukti' => $foto_bukti);
		$uploadfoto = $this->pelapak_model->upload_foto_bukti('pelapak',$data, $id);
		if($uploadfoto > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('pelaku_usaha/dasbor/konfirmasi');
    }

public function foto_profil()
	{	$id_pelapak			= $this->session->userdata('id_pelapak');

		$pelapak 			= $this->pelapak_model->detail($id_pelapak);
		
		$valid = $this->form_validation;
		

		if($valid->run()) {
			// Check jika foto_profil diganti
			if(!empty($_FILES['foto_profil']['name'])) {

			$config['upload_path'] 			= './assets/upload/image/';
			$config['allowed_types']	 	= 'gif|jpg|png|jpeg';
			$config['max_size']  			= '3000'; //dalam KB
 			$config['max_width']  			= '2024';
			$config['max_height']  			= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto_profil')){
				
			//End Validasi
		$data = array ('title'	=>	'Edit Produk: ',
						'pelapak'	=> $pelapak,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> '      pelaku_usaha/dasbor/foto_profil'
	);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);

		// Masuk Database
	}else{
		$upload_foto_profil = array('upload_data' => $this->upload->data());
			
			// Create thumbnail foto_profil
		$config['image_library'] = 'gd2';
		$config['source_image'] = './assets/upload/image/'.$upload_foto_profil['upload_data']['file_name'];
		// Lokasi folder thumbnail
		$config['new_image']	= './assets/upload/image/thumbs/';
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 250;//pixel
		$config['height']       = 250;
		$config['thumb_marker'] = '';

$this->load->library('image_lib', $config);

$this->image_lib->resize();


			// End create thumbnail 
		
		$i = $this->input;

		$data = array( 	
						'id_pelapak'			=> $id_pelapak,
						'nama_pelapak'		=> $i->post('nama_pelapak'),
						// disimpan nama file foto_profil
						'foto_profil'			=> $upload_foto_profil['upload_data']['file_name']
						
					);
		$this->pelapak_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah edit');
		redirect(base_url('pelaku_usaha/dasbor/konfirmasi'),'refresh');
	}}else{
		// edit pelapak tanpa edit foto_profil
		$i = $this->input;
		// SLUG PRODUK

		$data = array( 	
						'id_pelapak'			=> $id_pelapak,
						'nama_pelapak'		=> $i->post('nama_pelapak'),
						// disimpan nama file foto_profil tidak diganti
						
						// 'foto_profil'			=> $upload_foto_profil['upload_data']['file_name'],
						
					);
		$this->pelapak_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah edit');
		redirect(base_url('pelaku_usaha/dasbor/foto_profil'),'refresh');


	}}
	// End masuk database
	$data = array (	'title'		=> 'Ubah Profil',
					'pelapak'	=> $pelapak,
					'isi'		=> 'pelaku_usaha/dasbor/foto_profil'
	);
		$this->load->view('pelaku_usaha/layout/wrapper', $data, FALSE);
	}

	public function change_foto($id){
		$foto_profil      = $_POST['foto_profil'];
        if ($foto_profil=''){}else{
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto_profil')){
                echo "Upload gagal"; die();
            }else{
                $foto_profil=$this->upload->data('file_name');
            }
        }
        
		$data = array( 'foto_profil' => $foto_profil);
		$uploadfoto = $this->pelapak_model->upload_foto_profil('pelapak',$data, $id);
		if($uploadfoto > 0)
		{
			echo 'Berhasil disimpan';
		}else{
			echo 'Gagal disimpan';
		}
			redirect('pelaku_usaha/dasbor/profil');
    }
	
	// public function change_password($id=null)	{
	// 	if($id==null){
	// 		$this->session->set_flashdata('info', 'Gagal Ubah Profile!');
	// 		redirect('superadmin/superadmin/profile', 'refresh');
	// 	} 
	// 	$data['users'] = $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();

	// 	$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required',['required'=>'Password tidak boleh kosong !']);
	// 	$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[8]|matches[new_password_confirm]',['required'=>'Password baru tidak boleh kosong !', 'min_length'=>'Password minimal harus 8 karakter !', 'matches'=>'Password konfirmasi tidak sama !']);
	// 	$this->form_validation->set_rules('new_password_confirm', 'Confirm New Password', 'trim|required|min_length[8]|matches[new_password]',['required'=>'Password tidak boleh kosong !', 'min_length'=>'Password minimal harus 8 karakter !', 'matches'=>'Password baru harus sama !']);

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->load->view('superadmin/profile',$data);
	// 	} else {
	// 		$old_password = $this->input->post('old_password');
	// 		$new_pass = $this->input->post('new_password');
	// 		if (!password_verify($old_password, $data['users']['password'])) {
	// 			$this->session->set_flashdata('info_pass', 'Wrong Old Password !');
	// 			redirect('superadmin/superadmin/profile');
	// 		}else{
	// 			if ($old_password == $new_pass) {
	// 				$this->session->set_flashdata('info_pass', 'New password cannot be the same as old password !');
	// 				redirect('superadmin/superadmin/profile'); 
	// 			}else{
	// 				//password bener
	// 				$password_hash = password_hash($new_pass, PASSWORD_DEFAULT);

	// 				$this->db->set('password', $password_hash);
	// 				$this->db->where('id', $id);
	// 				$this->db->update('users');

	// 				$this->session->set_flashdata('info_pass', 'Password Berhasil DiUbah!');
	// 				redirect('superadmin/superadmin/profile');
	// 			}
	// 		}
	// 	}
	// 	$this->load->view('superadmin/profile',$data);
	// }



}
/* End of file Dasbor.php */
/* Location: ./application/controllers/pelaku_usaha/Dasbor.php */