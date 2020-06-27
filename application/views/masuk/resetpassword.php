<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/login_adm/img/logo-icon.png">
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url() ?>assets/login_adm/img/favicon.png">
	<title><?php echo $title ?> </title>
	<!-- Bootstrap 3.3.7 --> 
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/iCheck/square/blue.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body>
<div id="app">
    <section class="section">
      	<div class="container mt-5">
        	<div class="row">
          		<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
					<div class="login-brand">
						<img src="<?php echo base_url() ?>assets/login_adm/img/stisla-fill.png" alt="logo" width="100" class="">
					</div>

					<div class="card card-primary">
					<div class="card-header"><h4>Reset Password</h4></div>
					<!-- <a href="<?php echo base_url() ?>"><b><?php echo $title ?></b></a> -->

						<div class="card-body">
							<!-- <div class="login-title" style="text-align: center;">Forgot your password ?</div> -->
							<form action="<?php echo base_url('masuk/changePassword'); ?>" method="post" class="form-horizontal">

								<?php if($this->session->flashdata('info')) { ?>
									<div class="alert alert-info">  
										<a class="close" data-dismiss="alert">x</a>  
										<strong>Info! </strong> <?php echo $this->session->flashdata('info'); ?>  
									</div>
								<?php } ?>

								<div class="form-group">
									<div class="col-md-12">
										<input type="password" class="form-control" id="password1" name="password1" style="background-color: #fff" placeholder="Enter New Password..."><?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<input type="password" class="form-control" id="password2" name="password2" style="background-color: #fff" placeholder="Enter New Confirm Password..."><?php echo form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<button type="submit" class="btn btn-info btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Change Password</button>
									</div>
								</div>
							</form>
						</div>          
					</div>
				</div>
			</div>
		</div>			
	</section>
</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?php echo base_url() ?>assets/login_adm/js/stisla.js"></script>

	<!-- JS Libraies -->

	<!-- Template JS File -->
	<script src="<?php echo base_url() ?>assets/login_adm/js/scripts.js"></script>
	<script src="<?php echo base_url() ?>assets/login_adm/js/custom.js"></script>

	<!-- jQuery 3 -->
	<script src="<?php echo base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="<?php echo base_url() ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
		<script>
			$(function () {
				$('input').iCheck({
					checkboxClass: 'icheckbox_square-blue',
					radioClass: 'iradio_square-blue',
					increaseArea: '20%' /* optional */
				});
			});
		</script>
</body>
</html>
