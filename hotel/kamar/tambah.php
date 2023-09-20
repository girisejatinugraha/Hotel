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

if (isset($_POST['simpan'])) {
  if (simpan($_POST) > 0) {
?>
    <script>
      alert("Data Berhasil Disimpan");
      document.location = "index.php";
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("Data Gagal Disimpan");
      document.location = "tambah.php";
    </script>
<?php
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Hotel</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
          <a class="nav-link" href="../logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar?')">
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
              <li class="nav-item">
                <a href="../index.php" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-header">DATA MASTER</li>
              <li class="nav-item">
                <a href="../kamar/index.php" class="nav-link active">
                  <i class="nav-icon fas fa-person-booth"></i>
                  <p>
                    Data Kamar
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tamu/index.php" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Tamu
                  </p>
                </a>
              </li>
              <li class="nav-header">DATA TRANSAKSI</li>
              <li class="nav-item">
                <a href="../transaksi/index.php" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Data Transaksi
                  </p>
                </a>
              </li>
              <li class="nav-header">DATA ADMIN</li>
              <li class="nav-item">
                <a href="../admin/index.php" class="nav-link">
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

      <!-- Main content -->

      <section class="content">
        <div class="container-fluid">

          <div class="row justify-content-center pt-2">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="card card-info">
                <div class="card-header">
                  <h5 class="text-center m-0">Masukkan Data Kamar</h5>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="no_kamar">No Kamar</label>
                      <input type="text" name="no_kamar" class="form-control" id="no_kamar" placeholder="Masukkan No Kamar" required>
                    </div>
                    <div class="form-group">
                      <label>Tipe Kamar</label>
                      <select required class="form-control select2" name="tipe" style="width: 100%;">
                        <option value="">-- Pilih Tipe --</option>
                        <option value="Standard">Standard</option>
                        <option value="Superior">Superior</option>
                        <option value="Deluxe">Deluxe</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                      <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga Kamar</label>
                      <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan Harga Kamar" required>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-center">
                      <a href="index.php" name="batal" class="btn btn-danger">Batal</a>
                      &nbsp;
                      <button type="reset" name="reset" class="btn btn-warning">Bersihkan</button>
                      &nbsp;
                      <button type="submit" name="simpan" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin Ingin Menyimpan Data?')">Simpan</button>
                    </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
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
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- DataTables -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="../dist/js/demo.js"></script>
  <!-- Select2 -->
  <script src="../plugins/select2/js/select2.full.min.js"></script>
  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="../plugins/raphael/raphael.min.js"></script>
  <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>

  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>

  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      });
    });
  </script>

</body>

</html>