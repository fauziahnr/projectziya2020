<?php 
// Ambil data pilihan menu dari konfigurasi
$nav_produk 	= $this->konfigurasi_model->nav_produk();
$nav_produk_mobile = $this->konfigurasi_model->nav_produk();
?>

<div class="preloader">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
</div>

    

<div class="wrap_header">
	<!-- Logo -->
	<a href="<?php echo base_url() ?>" class="logo">
		<p>
			<br>
			<br>
			<img src="<?php echo base_url('assets/upload/image/logo.png') ?>" style="height: 75px;  width=auto;" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>">
		</p>
	</a>

	<!-- Menu -->
	<div class="wrap_menu">
		<nav class="menu">
			<ul class="main_menu">
				<!-- HOME -->
				<li>
					<a href="<?php echo base_url() ?>">Beranda</a>
				</li>
				<!-- Menu Female Preneur -->

				<li>
					<a href="<?php echo base_url('produk') ?>">Pelaku Usaha</a>
					<!-- <ul class="sub_menu">
						<?php foreach ($nav_produk as $nav_produk) { ?>
							<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk->slug_kategori) ?>">
								<?php echo $nav_produk->nama_kategori ?> </a></li>
							<?php } ?>
							
						</ul> -->
					</li>

					
					<li>
						<a href="#">Registrasi</a>
						<ul class="sub_menu">
							<li><a href="<?php echo base_url('registrasi') ?>">Female Preneur</a></li>
							<li><a href="<?php echo base_url('daftar') ?>">Pelaku Usaha</a></li>
						</ul>
					</li>

					<li>
						<a href="#">Login</a>
						<ul class="sub_menu">
							<li><a href="<?php echo base_url('masuk') ?>">Female Preneur</a></li>
							<li><a href="<?php echo base_url('signin') ?>">Pelaku Usaha</a></li>
						</ul>
					</li>

				</ul>
			</nav>
		</div>
		<form action="<?php echo base_url('produk') ?>" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="search" class="form-control" placeholder="Mau gabung apa hari ini ?" style="background-color: #F1EFEF">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-default" style="background-color: #F1EFEF"><i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>

		<!-- Header Icon -->
		<div class="header-icons">
			<?php if($this->session->userdata('email_pelanggan')) { ?>
				<a href="<?php echo base_url('dasbor/profil') ?>" class="header-wrapicon1 dis-block">
					<img src="<?php echo base_url() ?>assets/template/images/icons/user1-fp.png" class="header-icon1" alt="ICON"><?php echo $this->session->userdata('nama_pelanggan'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</a>

				<a href="<?php echo base_url('masuk/logout') ?>" class="header-wrapicon1 dis-block">
					<img src="<?php echo base_url() ?>assets/template/images/icons/logout.png" class="header-icon1" alt="ICON">Logout
				</a>

			<?php }else{ ?>
				<a href="<?php echo base_url('registrasi') ?>" class="header-wrapicon1 dis-block">
					<img src="<?php echo base_url() ?>assets/template/images/icons/user1-fp.png" class="header-icon1" alt="ICON">
				</a>
			<?php } ?>

			<span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<?php 
				// Check data gabung dg PU ada atau tidak
				$keranjang	= $this->cart->contents();
				?>
				<img src="<?php echo base_url() ?>assets/template/images/gabung.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti"><?php echo count($keranjang) ?></span>

				<!-- Headergabung notifikasi -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
						<?php  
						// jika tdk ada data gabung
						if(empty($keranjang)) {
							?>
							<li class="header-cart-item">
								<p class="alert alert-success">Gabung Pelaku Usaha Kosong</p>
							</li>

							<?php 
					// jika ada

						}else{
						// Total blnj dg gabung pu
							$total_belanja = 'Rp.'.number_format($this->cart->total(),'0',',','.');
					// Tampilkan data gabung pu
							foreach ($keranjang as $keranjang) {
								$id_produk = $keranjang['id'];
							// Ambil data produk
								$produknya = $this->produk_model->detail($id_produk);

								?>

								<div class="header-cart-item-img">
									<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produknya->gambar) ?>" alt="<?php echo $keranjang['name']  ?>">
								</div>

								<div class="header-cart-item-txt">
									<a href="<?php echo base_url('produk/detail/'.$produknya->slug_produk) ?>" class="header-cart-item-name">
										<p class="text-primary"><?php echo $keranjang['name'] ?></p>
									</a>

									<span class="header-cart-item-info">
										<!-- <?php echo $keranjang['stok'] ?> x <?php echo $keranjang['qty'] ?> x Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?>: <?php 
										$subtotal = $keranjang['price'] * $keranjang['stok'];
										echo number_format($subtotal,'0',',','.'); ?> -->

										<?php echo $keranjang['stok'] ?> x Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?>: <?php 
										$subtotal = $keranjang['price'] * $keranjang['stok'];
										echo number_format($subtotal,'0',',','.'); ?>
										<!-- Rp. <?php //echo number_format($keranjang['subtotal'],'0',',','.') ?> -->
									</span>
								</div>
							</li>
							<?php 
					} //Penutup foreach keranjang
					} //Penutup if
					?>

				</ul>

				<div class="header-cart-total">
					<div class="alert alert-info" role="alert">
					<strong>Total: <?php if(!empty($keranjang)) { echo $total_belanja; } ?></strong> 
					</div>
				</div>

				<div class="header-cart-buttons">
					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							Detail PU
						</a>
					</div>

					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja/checkout') ?>"class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							Gabung Mitra
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Header Mobile -->
<div class="wrap_header_mobile">
	<!-- Logo moblie -->
	<a href="index.html" class="logo-mobile">
		<img src="<?php echo base_url() ?>assets/template/images/icons/logo-female.png" alt="IMG-LOGO">
	</a>

	<!-- Button show menu -->
	<div class="btn-show-menu">
		<!-- Header Icon mobile -->
		<div class="header-icons-mobile">
			<a href="<?php echo base_url('dasbor/profil') ?>" class="header-wrapicon1 dis-block">
				<img src="<?php echo base_url() ?>assets/template/images/icons/user1-fp.png" class="header-icon1" alt="ICON">
			</a>

			<a href="<?php echo base_url('masuk/logout') ?>" class="header-wrapicon1 dis-block">
				<img src="<?php echo base_url() ?>assets/template/images/icons/logout.png" class="header-icon1" alt="ICON">Logout
			</a>

			<span class="linedivide2"></span>

			<div class="header-wrapicon2">
				<?php 
				// Check data gabung pu ada atau tidak
				$keranjang_mobile	= $this->cart->contents();



				?>
				<img src="<?php echo base_url() ?>assets/template/images/gabung.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti"><?php echo count($keranjang_mobile) ?></span>

				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
						
						<?php  
						// jika tdk ada data gabung
						if(empty($keranjang_mobile)) {
							?>
							<li class="header-cart-item">
								<p class="alert alert-success">Gabung Pelaku Usaha Kosong</p>
							</li>

							<?php 
					// jika ada

						}else{
						// Total Belanjaan dg gabung pu
							$total_belanja = 'Rp.'.number_format($this->cart->total(),'0',',','.');
					// Tampilkan data gabung
							foreach ($keranjang_mobile as $keranjang_mobile) {
								$id_produk_mobile	=	$keranjang_mobile['id'];
								$produk_mobile 		= $this->produk_model->detail($id_produk_mobile); 

								?>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk_mobile->gambar) ?>" alt="<?php echo $keranjang_mobile['name'] ?>">

									</div>

									<div class="header-cart-item-txt">
										<a href="<?php echo base_url('produk/detail/'.$produknya->slug_produk) ?>" class="header-cart-item-name">
											<p class="text-primary"><?php echo $keranjang_mobile['name'] ?></p>

										</a>

										<span class="header-cart-item-info">
											<?php echo $keranjang_mobile['stok'] ?> x Rp. <?php echo number_format($keranjang_mobile['price'],'0',',','.') ?> : <strong>Rp. <?php echo number_format($keranjang_mobile['subtotal'],'0',',','.') ?></strong> 
										</span>
									</div>
								</li>

								<?php 
				} //Penutup foreach
					} // Penutup if
					?>

				</ul>

				<div class="header-cart-total">
					<div class="alert alert-info" role="alert">
						<strong>Total: <?php if(!empty($keranjang)) { echo $total_belanja; } ?></strong> 
					</div>
				</div>

				<div class="header-cart-buttons">
					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							Detail PU
						</a>
					</div>

					<div class="header-cart-wrapbtn">
						<!-- Button -->
						<a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
							Gabung Mitra
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
		<span class="hamburger-box">
			<span class="hamburger-inner"></span>
		</span>
	</div>
</div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu" >
	<nav class="side-menu">
		<ul class="main-menu">
			<li class="item-topbar-mobile p-l-10">
				<div class="topbar-social-mobile">
					<a href="<?php echo $site->facebook ?>" class="topbar-social-item">
						<img src="<?php echo base_url() ?>assets/template/images/icons/fb.png">
					</a>
					<a href="<?php echo $site->instagram ?>" class="topbar-social-item">
						<img src="<?php echo base_url() ?>assets/template/images/icons/ig.png">
					</a>
				</div>
			</li>

			<!-- Menu mobile homepage -->


			<li class="item-menu-mobile">
				<a href="<?php echo base_url() ?>">Beranda</a>
			</li>

			<!-- Menu mobile female  -->

			<li class="item-menu-mobile">
				<a href="<?php echo base_url('produk') ?>">Pelaku Usaha</a>
				<!-- <ul class="sub-menu">
					<?php foreach ($nav_produk_mobile as $nav_produk_mobile) { ?>
						<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk_mobile->slug_kategori) ?>">
							<?php echo $nav_produk_mobile->nama_kategori ?> </a></li>
						<?php } ?>

					</ul>
					<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i> -->
			</li>

				<!-- Menu Contact Mobile -->



			<li class="item-menu-mobile">
				<a href="<?php echo base_url('registrasi') ?>">Registrasi Female Preneur</a>
			</li>
		</ul>
	</nav>
</div>
</header>
