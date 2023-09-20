<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login/index.php");
  exit;
}

if (isset($_SESSION['login'])) {
  $nama = $_SESSION['nama'];
  $id = $_SESSION['id'];
}

require "functions.php";
$conn = koneksi();

$kamar = mysqli_query($conn, "SELECT COUNT(no_kamar) AS kmr FROM kamar");
$kamar = mysqli_fetch_array($kamar);
$kamar = $kamar['kmr'];

$tamu = mysqli_query($conn, "SELECT COUNT(nik) AS tm FROM tamu");
$tamu = mysqli_fetch_array($tamu);
$tamu = $tamu['tm'];

$transaksi1 = mysqli_query($conn, "SELECT COUNT(id_transaksi) AS tr FROM transaksi WHERE status = 'Check In'");
$transaksi1 = mysqli_fetch_array($transaksi1);
$transaksi1 = $transaksi1['tr'];

$transaksi2 = mysqli_query($conn, "SELECT COUNT(id_transaksi) AS tr FROM transaksi");
$transaksi2 = mysqli_fetch_array($transaksi2);
$transaksi2 = $transaksi2['tr'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Hotel</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">
            Hai, <?= $nama; ?>
          </a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" href="logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar?')">
            Logout &nbsp;
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <i class="fas fa-hotel img-circle elevation-3 ml-3"></i>
        &nbsp;
        <span class="brand-text font-weight-bold">Hotel</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <div class="mt-3">
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview menu-open">
                <a href="index.php" class="nav-link active">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-header">DATA MASTER</li>
              <li class="nav-item">
                <a href="kamar/index.php" class="nav-link">
                  <i class="nav-icon fas fa-person-booth"></i>
                  <p>
                    Data Kamar
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tamu/index.php" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Tamu
                  </p>
                </a>
              </li>
              <li class="nav-header">DATA TRANSAKSI</li>
              <li class="nav-item">
                <a href="transaksi/index.php" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Data Transaksi
                  </p>
                </a>
              </li>
              <li class="nav-header">DATA ADMIN</li>
              <li class="nav-item">
                <a href="admin/index.php" class="nav-link">
                  <i class="nav-icon fas fa-user-shield"></i>
                  <p>
                    Administrator
                  </p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-person-booth"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Kamar</span>
                  <span class="info-box-number">
                    <?= $kamar; ?>
                    <small>ruang</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Tamu</span>
                  <span class="info-box-number">
                    <?= $tamu; ?>
                    <small>orang</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-bed"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Transaksi Aktif</span>
                  <span class="info-box-number">
                    <?= $transaksi1; ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Transaksi</span>
                  <span class="info-box-number">
                    <?= $transaksi2; ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-12">
              <!-- BAR CHART -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Grafik Transaksi Tahun 2020</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>

        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer text-sm text-center">
      <strong>Copyright &copy; 2022 Giri Sejati Nugraha</strong>
    </footer>

  </div>


  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="dist/js/demo.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- BAR CHART -->
  <script>
    $(function() {

      var areaChartData = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
            label: 'Standard',
            backgroundColor: '#00c0ef',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [
              <?php
              $q1 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Standard') AND checkin BETWEEN '2020-01-01' and '2020-01-31'");
              echo mysqli_num_rows($q1);
              ?>,
              <?php
              $q2 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Standard') AND checkin BETWEEN '2020-02-01' and '2020-02-29'");
              echo mysqli_num_rows($q2);
              ?>,
              <?php
              $q3 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Standard') AND checkin BETWEEN '2020-03-01' and '2020-03-31'");
              echo mysqli_num_rows($q3);
              ?>,
              <?php
              $q4 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Standard') AND checkin BETWEEN '2020-04-01' and '2020-04-31'");
              echo mysqli_num_rows($q4);
              ?>,
              <?php
              $q5 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Standard') AND checkin BETWEEN '2020-05-01' and '2020-05-31'");
              echo mysqli_num_rows($q5);
              ?>,
              <?php
              $q6 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Standard') AND checkin BETWEEN '2020-06-01' and '2020-06-31'");
              echo mysqli_num_rows($q6);
              ?>,
              <?php
              $q7 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Standard') AND checkin BETWEEN '2020-07-01' and '2020-07-31'");
              echo mysqli_num_rows($q7);
              ?>,
              <?php
              $q8 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Standard') AND checkin BETWEEN '2020-08-01' and '2020-08-31'");
              echo mysqli_num_rows($q8);
              ?>,
              <?php
              $q9 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Standard') AND checkin BETWEEN '2020-09-01' and '2020-09-31'");
              echo mysqli_num_rows($q9);
              ?>,
              <?php
              $q10 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Standard') AND checkin BETWEEN '2020-10-01' and '2020-10-31'");
              echo mysqli_num_rows($q10);
              ?>,
              <?php
              $q11 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Standard') AND checkin BETWEEN '2020-11-01' and '2020-11-31'");
              echo mysqli_num_rows($q11);
              ?>,
              <?php
              $q12 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Standard') AND checkin BETWEEN '2020-12-01' and '2020-12-31'");
              echo mysqli_num_rows($q12);
              ?>
            ]
          },
          {
            label: 'Superior',
            backgroundColor: '#3c8dbc',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              <?php
              $q1 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Superior') AND checkin BETWEEN '2020-01-01' and '2020-01-31'");
              echo mysqli_num_rows($q1);
              ?>,
              <?php
              $q2 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Superior') AND checkin BETWEEN '2020-02-01' and '2020-02-29'");
              echo mysqli_num_rows($q2);
              ?>,
              <?php
              $q3 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Superior') AND checkin BETWEEN '2020-03-01' and '2020-03-31'");
              echo mysqli_num_rows($q3);
              ?>,
              <?php
              $q4 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Superior') AND checkin BETWEEN '2020-04-01' and '2020-04-31'");
              echo mysqli_num_rows($q4);
              ?>,
              <?php
              $q5 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Superior') AND checkin BETWEEN '2020-05-01' and '2020-05-31'");
              echo mysqli_num_rows($q5);
              ?>,
              <?php
              $q6 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Superior') AND checkin BETWEEN '2020-06-01' and '2020-06-31'");
              echo mysqli_num_rows($q6);
              ?>,
              <?php
              $q7 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Superior') AND checkin BETWEEN '2020-07-01' and '2020-07-31'");
              echo mysqli_num_rows($q7);
              ?>,
              <?php
              $q8 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Superior') AND checkin BETWEEN '2020-08-01' and '2020-08-31'");
              echo mysqli_num_rows($q8);
              ?>,
              <?php
              $q9 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Superior') AND checkin BETWEEN '2020-09-01' and '2020-09-31'");
              echo mysqli_num_rows($q9);
              ?>,
              <?php
              $q10 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Superior') AND checkin BETWEEN '2020-10-01' and '2020-10-31'");
              echo mysqli_num_rows($q10);
              ?>,
              <?php
              $q11 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Superior') AND checkin BETWEEN '2020-11-01' and '2020-11-31'");
              echo mysqli_num_rows($q11);
              ?>,
              <?php
              $q12 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Superior') AND checkin BETWEEN '2020-12-01' and '2020-12-31'");
              echo mysqli_num_rows($q12);
              ?>
            ]
          },
          {
            label: 'Deluxe',
            backgroundColor: '#d2d6de',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              <?php
              $q1 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Deluxe') AND checkin BETWEEN '2020-01-01' and '2020-01-31'");
              echo mysqli_num_rows($q1);
              ?>,
              <?php
              $q2 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Deluxe') AND checkin BETWEEN '2020-02-01' and '2020-02-29'");
              echo mysqli_num_rows($q2);
              ?>,
              <?php
              $q3 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Deluxe') AND checkin BETWEEN '2020-03-01' and '2020-03-31'");
              echo mysqli_num_rows($q3);
              ?>,
              <?php
              $q4 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Deluxe') AND checkin BETWEEN '2020-04-01' and '2020-04-31'");
              echo mysqli_num_rows($q4);
              ?>,
              <?php
              $q5 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Deluxe') AND checkin BETWEEN '2020-05-01' and '2020-05-31'");
              echo mysqli_num_rows($q5);
              ?>,
              <?php
              $q6 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Deluxe') AND checkin BETWEEN '2020-06-01' and '2020-06-31'");
              echo mysqli_num_rows($q6);
              ?>,
              <?php
              $q7 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Deluxe') AND checkin BETWEEN '2020-07-01' and '2020-07-31'");
              echo mysqli_num_rows($q7);
              ?>,
              <?php
              $q8 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Deluxe') AND checkin BETWEEN '2020-08-01' and '2020-08-31'");
              echo mysqli_num_rows($q8);
              ?>,
              <?php
              $q9 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Deluxe') AND checkin BETWEEN '2020-09-01' and '2020-09-31'");
              echo mysqli_num_rows($q9);
              ?>,
              <?php
              $q10 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Deluxe') AND checkin BETWEEN '2020-10-01' and '2020-10-31'");
              echo mysqli_num_rows($q10);
              ?>,
              <?php
              $q11 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Deluxe') AND checkin BETWEEN '2020-11-01' and '2020-11-31'");
              echo mysqli_num_rows($q11);
              ?>,
              <?php
              $q12 = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE no_kamar IN (select no_kamar from kamar where tipe='Deluxe') AND checkin BETWEEN '2020-12-01' and '2020-12-31'");
              echo mysqli_num_rows($q12);
              ?>
            ]
          },
        ]
      }

      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = jQuery.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp0
      barChartData.datasets[1] = temp1

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }

      var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })
    });
  </script>

</body>

</html>