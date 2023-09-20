<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: ../index.php");
}

require "../functions.php";

// Ketika tombol masuk ditekan
if (isset($_POST['masuk'])) {
  $login = masuk($_POST);
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hotel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page bg-info">
  <div class="login-box">
    <div class="login-logo">
      <i class="fas fa-hotel img-circle elevation-3"></i>
      &nbsp;
      <span class="brand-text font-weight-bold">Hotel</span>
    </div>
    <!-- /.login-logo -->
    <div class="card" style="border-radius: 10px;">
      <div class="card-body login-card-body" style="border-radius: 10px; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);">
        <?php if (isset($login['error'])) : ?>
          <p style="font-weight: bolder; color:red; text-align:center;"><?= $login['pesan']; ?></p>
        <?php endif; ?>
        <p class="login-box-msg text-bold">Silakan Masuk<?php if (isset($login['error'])) : ?> Kembali<?php endif; ?></p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" autofocus autocomplete="off" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4 m-auto">
              <button type="submit" name="masuk" class="btn btn-primary btn-block">Masuk</button>
            </div>
            
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
 

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>

</body>

</html>