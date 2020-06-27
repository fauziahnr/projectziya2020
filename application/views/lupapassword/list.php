<!DOCTYPE html>
<html lang="en">
<head>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/login_adm/img/logo-icon.png">
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url() ?>assets/login_adm/img/favicon.png">
    <title>Admin | Female Preneur</title>

  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/iCheck/square/blue.css">

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
              <div class="card-header"><h4>Lupa Password</h4></div>

              <?php
                //Notifikasi error
                      echo validation_errors('<div class="alert alert-success">','</div>');

                // Notifikasi gagal login
                      if($this->session->flashdata('warning')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('warning');
                        echo  '</div>';
                      }
                // Notifikasi logout

                      if($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('sukses');
                        echo  '</div>';
                      }
              ?>
      <!-- <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">


          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <button type="button" class="btn btn-default btn-block btn-sm">Lupa Password?</button>

        <br>
        <div class="row">
          <div class="col-xs-8">

            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>

          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>

        </div>
      </form> -->

          <div class="login-body">
            <!-- <div class="login-title" style="text-align: center;">Forgot your password ?</div> -->
            <form action="" method="post" class="form-horizontal">
                <div class="form-group">
                  <div class="col-md-12">
                    <input type="text" class="form-control" name="email" style="background-color: #f0f0f0" placeholder="Enter Email Address..." value="">            </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Reset Password</button> 
                    </div>
                  </div>
                  <div class="form-group">
                    <div  style="text-align:center;">
                      <a href="<?php echo base_url('signin'); ?>" title="Back to Login"> Back to Login</a>
                    </div>
                  </div>
            </form>
              </div>
          </div>

      </div>
        <div class="simple-footer">
        Copyright &copy; Female Preneur 2020 💙 by Fauziyah NR
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
