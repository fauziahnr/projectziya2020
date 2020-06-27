
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?> </title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<!-- <a href="<?php echo base_url() ?>"><b><?php echo $title ?></b></a> -->
			<a href="<?php echo base_url() ?>">Reset Password</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body" style="background-color: #F3F3F3">
			<div class="login-body">
				<!-- <div class="login-title" style="text-align: center;">Forgot your password ?</div> -->
				<form action="<?php echo base_url('signin/changePassword'); ?>" method="post" class="form-horizontal">

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
							<button type="submit" class="btn btn-info btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Ubah Password</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.login-box -->

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
