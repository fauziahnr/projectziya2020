<head>
<!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/login_adm/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/login_adm/lib/fontawesome/v5.7.2/css/all.css"> 

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/login_adm/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/login_adm/css/components.css"> 
</head>

<!-- Gabung -->
<section class="section">
	<div class="container mt-5">
		<!-- Gabung item -->
		<div class="row">
			<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
				<div class="card card-primary">	
					<!-- <h1><?php echo $title ?></h1> -->
					<div class="card-header"><h1>Login Pelaku Usaha</h1></div>
						<div class="card-body">
				
							<?php if($this->session->flashdata('sukses'))
							{
								echo '<div class="alert alert-warning">';
								echo $this->session->flashdata('sukses');
								echo '</div>';
								
							} ?>

							<?php if($this->session->flashdata('info')) { ?>
								<div class="alert alert-info">  
									<a class="close" data-dismiss="alert">x</a>  
									<strong>Info! </strong> <?php echo $this->session->flashdata('info'); ?>  
								</div>
							<?php } ?>

							<p class="alert alert-light">Belum memiliki akun? Silahkan <a href="<?php echo base_url('daftar') ?>" class="btn btn-outline-primary"> Registrasi di sini</a></p>

							<div class="col-md-12">

								<?php 
								// error jk belum diisi
								echo validation_errors('<div class="alert alert-warning">','</div>');

								// notifikasi error login username dan password salah
								if ($this->session->flashdata('warning')) {
									echo '<div class="alert alert-danger">';
									echo $this->session->flashdata('warning');
									echo "</div>";

								}

								// notifikasi sukses logout
								if ($this->session->flashdata('sukses')) {
									echo '<div class="alert alert-success">';
									echo $this->session->flashdata('sukes');
									echo "</div>";

								}

								if ($this->session->flashdata('message')) {
									echo '<div class="alert alert-success">';
									echo $this->session->flashdata('message');
									echo "</div>";

								}

								// Form
								echo form_open(base_url('signin'), 'class="leave-comment"'); ?>

								<div class="form-group col-6">
									<label for="email_pelapak">Email</label>
									<input type="email" name="email_pelapak" class="form-control" placeholder="Email" value="<?php echo set_value('email_pelapak') ?>" >
								</div>
									
								<div class="form-group col-6">
									<label for="password">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" >
								</div>
									
								<tr>
									<td></td>
									<td>
										<button class="btn btn-success btn-lg" type="submit">
											<i class="fas fa-arrow-right"></i> Login
										</button>
										<button class="btn btn-default btn-lg" type="reset">
											<i class="fa fa-times"></i> Reset
										</button>
										
									</td>
								</tr>
								<br><br>
								<a href="<?php echo base_url('signin/forgotPassword') ?>" type="button" class="btn btn-primary btn-block">Lupa Password?</a>
								<?php echo form_close(); ?>
					
							</div>

						</div>
				</div>
			</div>
		</div>
	</div>
		<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
			<div class="flex-w flex-m w-full-sm">
				
			</div>

			<div class="size10 trans-0-4 m-t-10 m-b-10">
				<!-- Button -->
				
			</div>
		</div>
</section>
<!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/login_adm/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url() ?>assets/login_adm/js/scripts.js"></script>
  <script src="<?php echo base_url() ?>assets/login_adm/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url() ?>assets/login_adm/js/page/auth-register.js"></script>

