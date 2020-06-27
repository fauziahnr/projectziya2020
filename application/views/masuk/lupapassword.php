<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/login_adm/img/logo-icon.png">
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url() ?>assets/login_adm/img/favicon.png">
	<!-- <title><?php echo $title ?> </title> -->
	<title>Lupa Password</title>
	
	!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/login_adm/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/login_adm/lib/fontawesome/v5.7.2/css/all.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/login_adm/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/login_adm/css/components.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

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
					<div class="card-header"><a href="<?php echo base_url() ?>"><b><?php echo $title ?></b></a></div>

						<?php
							if($this->session->flashdata('message')) {
								echo $this->session->flashdata('message');
							}
						?>

						<div class="card-body">
							<!-- <div class="login-title" style="text-align: center;">Forgot your password ?</div> -->
							<form action="<?php echo base_url('masuk/forgotPassword') ?>" method="post" class="form-horizontal">
								<div class="form-group">
									<div class="col-md-12">
										<input type="text" class="form-control" name="email_pelanggan" style="background-color: #fff" placeholder="Enter Email Address..." value="">            </div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<button type="submit" class="btn btn-success btn-block"><i class="fas fa-arrow-right"></i> Reset Password</button> 
										</div>
									</div>
									<div class="form-group">
										<div  style="text-align:center;">
											<a href="<?php echo base_url('masuk'); ?>" title="Back to Login"> Kembali ke Login</a>
										</div>
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
