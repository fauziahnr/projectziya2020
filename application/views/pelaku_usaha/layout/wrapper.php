<?php 
// PROTEKSI HALAMAN ADMIN DENGAN FUNGSI CEK LOGIN YANG ADA DI Simple_login
$this->simple_pelapak->cek_login();
//gabungkan semua bagian layout menjadi satu
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');


