<?php
session_start();
require 'assets/core/connection.php';
require 'assets/core/mail/phpmailer/class.phpmailer.php';
//error_reporting(0);


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AlphaSIGMA | Sign In</title>
    <link rel="icon" type="image/png" sizes="32x32" href="dist/img/icon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
</head>
<body class="hold-transition login-page">
    
    
<?php

if(isset($_POST['signin'])){

    $inputName = trim(htmlspecialchars($_POST['inputName']));
    $inputPassword = trim(htmlspecialchars($_POST['inputPassword']));
    $decision = select("SELECT * FROM church_login WHERE user='".$inputName."' && pass='".$inputPassword."'");

    if($decision){
     if(count($decision) > 0){
         foreach($decision as $decisions){
                $inputName1= $decisions['user'];
                $inputPassword1= $decisions['pass'];
                $a_level1= $decisions['a_level'];
                $f_name= $decisions['fullname'];
                $branch= $decisions['branch'];

                $_SESSION['user'] = $inputName1;
                $_SESSION['pass'] = $inputPassword1;
                $_SESSION['a_level'] = $a_level1;
                $_SESSION['branch'] = $branch;
                $_SESSION['fullname'] = $decisions['fullname']; 
                $s = "success";
                echo "<script>window.location.href='dashboard?m=$s'</script>";
         }
     }else{
            echo "<script type='text/javascript'>toastr.error('USERNAME OR PASSWORD ERROR','FAILED',{timeOut: 8000})</script>";
         }
      }else{
            echo "<script type='text/javascript'>toastr.error('INVALID USERNAME & PASSWORD','FAILED',{timeOut: 8000})</script>";
         }

      @$login_audit = insert("INSERT INTO login_audit(fullname,username,level,status,dateInsert)VALUES('". $_SESSION['fullname']."','". $_SESSION['user']."','". $_SESSION['a_level']."','logged In',CURDATE())");
    }

?>
    
    
<div class="login-box">
  <div class="login-logo">
    <a href="index"><b>Alpha</b>SIGMA</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="inputName" placeholder="UserName" required >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="inputPassword" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="signin" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary disabled">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger disabled">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password">I forgot my password</a>
      </p>
<!--
      <p class="mb-0">
        <a href="register" class="text-center">Register a new membership</a>
      </p>
-->
    </div>
  </div>

</div>
</body>
</html>