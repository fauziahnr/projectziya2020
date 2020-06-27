<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Fitur Admin</li>

        <!-- MENU DASHBOARD -->
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard text-aqua"></i> <span>DASHBOARD</span></a></li>

         <!-- MENU PROFIL -->
            <li><a href="<?php echo base_url('admin/profil') ?>"><i class="fa fa-home"></i> Profil Akun</a></li>
        

        <!-- MENU TRANSAKSI -->
        <li><a href="<?php echo base_url('admin/transaksi') ?>"><i class="fa fa-handshake-o"></i> <span>DATA GABUNG</span></a></li>

         <!-- MENU PRODUK -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>PRODUK</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/produk') ?>"><i class="fa fa-table"></i> Data Produk</a></li>
            <li><a href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags"></i> Kategori Produk</a></li>
          </ul>
        </li>

         <!-- MENU REKENING -->
        <!-- <li><a href="<?php echo base_url('admin/user/pelapak') ?>"><i class="fa fa-dollar text-aqua"></i> <span>DATA SEWA LAPAK</span></a></li> -->

        <!-- MENU USER -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>PENGGUNA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo base_url('admin/user/pelanggan') ?>"><i class="fa fa-female"></i> Data Female Preneur</a></li>
             <li><a href="<?php echo base_url('admin/user/pelapak') ?>"><i class="fa fa-users"></i> Data Pelaku Usaha</a></li>
          </ul>
        </li>

        
        <!-- MENU KONFIGURASI -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>SETTING WEB</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/konfigurasi') ?>"><i class="fa fa-home"></i> Konfigurasi Umum</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/logo') ?>"><i class="fa fa-image"></i> Konfigurasi Logo</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/icon') ?>"><i class="fa fa-home"></i> Konfigurasi Icon</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">