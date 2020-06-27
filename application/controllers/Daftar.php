<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelapak_model');
    }

    // Halaman Registrasi
    public function index()
    {
        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules('nama_pelapak','Nama Lengkap','required', array( 'required'   => '%s harus diisi' ));
        
        $valid->set_rules('email_pelapak','Email','required|valid_email|is_unique[pelapak.email_pelapak]',  
                    array(  'required'      => '%s harus diisi',
                            'valid_email'   => '%s tidak valid',
                            'is_unique'     => '%s sudah terdaftar'));

        $valid->set_rules('password','Password','required', array( 'required'   => '%s harus diisi' ));


        if($valid->run()===FALSE) {
            //End Validasi
        $data = array( 'title'  => 'Registrasi Pelaku Usaha',
                        'isi'   => 'daftar/list'
                    );
        $this->load->view('layout/wrapper', $data, FALSE);

        // Masuk database
        }else{
        $i = $this->input;
        $email_pelapak = $this->input->post('email_pelapak', true);
        $data = array(  'nama_pelapak'  => $i->post('nama_pelapak'),
                        'email_pelapak' => $i->post('email_pelapak'),
                        'password'          => SHA1($i->post('password')),
                        //'telepon'         => $i->post('telepon'),
                        'is_active'         => 1,
                        'alamat'            => $i->post('alamat'),
                        'bukti_bayar'       =>'Belum',
                        'tanggal_daftar'    => date('Y-m-d H:i:s')
                    );

        //siapkan token
        $token= base64_encode(random_bytes(32));
        $pelapak_token = [
            'email_pelapak' => $email_pelapak,
            'token' => $token,
            'tanggal_daftar' => time()
        ];

        $this->db->insert('pelapak', $data);
        $this->db->insert('pelapak_token', $pelapak_token);

        //kirim email
        $this->_sendEmail($token, 'verify');
        // Create Session login pelaku usaha
        $this->session->set_userdata('email_pelapak',$i->post('email_pelapak'));
        $this->session->set_userdata('nama_pelapak',$i->post('nama_pelapak'));
        // End create session 
        $this->session->set_flashdata('sukses', 'Registrasi berhasil');
        redirect(base_url('daftar/sukses'),'refresh');
    }
    // End masuk database
  
    }

    public function sukses()
    {
        $data = array( 'title' => ' Registrasi Berhasil!',
                        'isi'   => 'daftar/sukses');
        $this->load->view('layout/wrapper', $data, FALSE);
    }


    public function _sendEmail($token, $test)
    {
        //untuk mengirim email melalui google
        //465 adalah port google
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'femalepreneur@gmail.com',
            'smtp_pass' => 'alvim12345',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        //$config masuk kedalam parameter library
        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('femalepreneur@gmail.com', 'FePreneur');
        $this->email->to($this->input->post('email_pelapak'));

        if ($test == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a href="'. base_url() . 'Daftar/verify?email_pelapak=' . $this->input->post('email_pelapak') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($test == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="'. base_url() . 'Signin/resetPassword?email_pelapak=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }
        
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }

    }

    public function verify()
    {
        $email_pelapak = $this->input->get('email_pelapak');
        $token = $this->input->get('token');
        {

        $pelapak = $this->db->get_where('pelapak', ['email_pelapak' => $email_pelapak])->row_array(); //satu baris saja

        if($pelapak) {
            $pelapak_token = $this->db->get_where('pelapak_token', ['token' => $token])->row_array();
            if ($pelapak_token) {
                if (time() - $pelapak_token['tanggal_daftar'] < (60 * 60 * 1)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email_pelapak', $email_pelapak);
                    $this->db->update('pelapak');

                    $this->db->delete('pelapak_token', ['email_pelapak' => $email_pelapak]);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">' . $email_pelapak . ' has been activated! Please login.</div>');
                    redirect('Signin');
                }
            } else {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account verification failed! Invalid token.</div>');
                redirect('Daftar');
            }
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account verification failed! Invalid email.</div>');
            redirect('Daftar');
            }
        }
    }
}

/* End of file Daftar.php */
/* Location: ./application/controllers/Daftar.php */