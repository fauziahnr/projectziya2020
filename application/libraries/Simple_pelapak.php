<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelapak
{
	var $CI = NULL;

	public function __construct()
	{
        $this->CI =& get_instance();
        // Load data model user
        $this->CI->load->model('pelapak_model');
	}

	// fungsi login
	public function login($email_pelapak,$password)
	{
		$check = $this->CI->pelapak_model->login($email_pelapak,$password);
		// Jika ada data user, maka create session login
		if($check) {
			if ($check->is_active == 1) {
				$id_pelapak		= $check->id_pelapak;
				$nama_pelapak		= $check->nama_pelapak;
				// create session
				$this->CI->session->set_userdata('id_pelapak',$id_pelapak);
				$this->CI->session->set_userdata('nama_pelapak',$nama_pelapak);
				$this->CI->session->set_userdata('email_pelapak',$email_pelapak);
				// Redirect ke halaman admin yang diproteksi
				redirect(base_url('pelaku_usaha/dasbor'),'refresh');
			}else{
				redirect(base_url('signin'),'refresh');
			}
		}else{
			// Kalau tidak ada (username password salah, maka suruh login lagi
			$this->CI->session->set_flashdata('warning', 'Email atau password salah');
			redirect(base_url('signin'),'refresh');
		}

	}


	// fungsi login
	public function forgotPassword()
	{
		$check = $this->CI->pelapak_model->forgotPassword($email_pelapak);
		// Jika ada data user, maka create session login
		if($check) {
			if ($check->is_active == 1) {
				$id_pelapak		= $check->id_pelapak;
				$nama_pelapak		= $check->nama_pelapak;
				// create session
				$this->CI->session->set_userdata('id_pelapak',$id_pelapak);
				$this->CI->session->set_userdata('nama_pelapak',$nama_pelapak);
				$this->CI->session->set_userdata('email_pelapak',$email_pelapak);
				// Redirect ke halaman admin yang diproteksi
				redirect(base_url('signin/forgotPassword'),'refresh');
			}else {


			$this->CI->session->set_flashdata('warning', 'Email belum diregistrasi!');
				redirect(base_url('signin/forgotPassword'),'refresh');
			}
		}else{
			// Kalau tidak ada (username password salah, maka suruh login lagi
			$this->CI->session->set_flashdata('warning', 'Email tidak terdaftar atau aktifasi!');
			redirect(base_url('signin/forgotPassword'),'refresh');
		}

	}
	// Fungsi cek login
	public function cek_login()
	{
		// MEmeriksa apakah session sudah ada atau belum, jika belum alihkan ke halaman login
		if($this->CI->session->userdata('email_pelapak') == "") {
			$this->CI->session->set_flashdata('warning', 'Anda belum login');
			redirect(base_url('signin'),'refresh');
		}

	}

	// Fungsi logout
	public function logout()
	{
		// Membuang semus session yang telah diset saat login
		$this->CI->session->unset_userdata('id_pelapak');
		$this->CI->session->unset_userdata('nama_pelapak');
		$this->CI->session->unset_userdata('email_pelapak');
		// Setelah session dibuang, maka redirect ke login
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect(base_url('signin'),'refresh');

	}	
}

/* End of file Simple_pelapak.php */
/* Location: ./application/libraries/Simple_pelapak.php */
