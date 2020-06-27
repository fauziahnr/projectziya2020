<?php 
// Loading konfigurasi website
$site   = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<!-- Title -->
    <title>FemalePreneur | Saatnya perempuan bisa</title>
	<!-- <title><?php echo $title ?></title>-->
	<meta charset="UTF-8"> 
    <meta name="author" content="FauziahNR">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	
	<!-- Icon ini diambil dari fitur konfigurasi website pd Admin female preneur-->
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/'.$site->icon) ?>"/>
	<!-- keyword -->
	<meta name="keywords" content="<?php echo $site->keywords ?>">
	<meta name="description" content="<?php echo $title ?>, <?php echo $site->deskripsi ?>">
	
	<!--TAMBAHAN-->
	<!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets_all/images/logo-icon.png">
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url() ?>assets_all/images/favicon.png">
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_all/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_all/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_all/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_all/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_all/css/animate.css">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_all/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_all/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_all/css/responsive.css">
    <script src="<?php echo base_url() ?>assets_all/js/vendor/modernizr-2.8.3.min.js"></script>

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fonts/themify/themify-icons.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/fonts/elegant-font/html-css/style.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/vendor/lightbox2/css/lightbox.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/main.css">
	<!--===============================================================================================-->
	<style type="text/css" media="screen">
		ul.pagination {
			padding: 0 10px;
			background-color: grey;
			border-radius: 10px;
			text-align: center !important;
		}
		.pagination a, .pagination b {
			padding: 10px 20px;
			text-decoration: none;
			float: left;
		}
		.pagination a {
			background-color: grey;
			color: white;

		}
		.pagination b {
			background-color: black;
			color: white;

		}
		.pagination a:hover {
			background-color: black;
		}

	</style>
</head>
<body class="animsition">
