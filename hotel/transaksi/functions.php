<?php

// ============================KONEKSI============================================
function koneksi()
{
  return mysqli_connect("localhost", "root", "", "hotel giri");
}

// ============================SIMPAN============================================
function simpan($data)
{
  $conn = koneksi();

  $no_kamar = htmlspecialchars($data['no_kamar']);
  $nik = htmlspecialchars($data['nik']);
  $checkin = $data['checkin'];
  $checkout = $data['checkout'];
  $total = $data['total'];

  $query1 = "INSERT INTO transaksi (id_transaksi, no_kamar, nik, checkin, checkout, total_harga, status) VALUES ('', '$no_kamar', '$nik', '$checkin', '$checkout', '$total', 'Check In')";
  $query_run = mysqli_query($conn, $query1);

  $query2 = "UPDATE kamar SET status = 'Booked' WHERE no_kamar = '$no_kamar'";
  $query_run = mysqli_query($conn, $query2);

  if ($query_run) {
?>
    <script language="javascript">
      alert("Booking Kamar Berhasil");
      document.location = 'index.php';
    </script>

  <?php
  } else {
  ?>
    <script language="javascript">
      alert("Booking Kamar Gagal");
      document.location = 'tambah.php';
    </script>
  <?php
  }
}

// ============================SIMPAN TAMU============================================
function simpan_tamu($data)
{
  $conn = koneksi();

  $no_kamar = htmlspecialchars($data['no_kamar']);
  $nik = htmlspecialchars($data['nik']);
  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $telepon = htmlspecialchars($data['telepon']);
  $checkin = $data['checkin'];
  $checkout = $data['checkout'];
  $total = $data['total'];

  $query3 = "INSERT INTO tamu VALUES ('$nik', '$nama', '$alamat', '$telepon')";
  $query_run = mysqli_query($conn, $query3);

  $query2 = "UPDATE kamar SET status = 'Booked' WHERE no_kamar = '$no_kamar'";
  $query_run = mysqli_query($conn, $query2);

  $query1 = "INSERT INTO transaksi (id_transaksi, no_kamar, nik, checkin, checkout, total_harga, status) VALUES ('', '$no_kamar', '$nik', '$checkin', '$checkout', '$total', 'Check In')";
  $query_run = mysqli_query($conn, $query1);

  if ($query_run) {
  ?>
    <script language="javascript">
      alert("Booking Kamar Berhasil");
      document.location = 'index.php';
    </script>

  <?php
  } else {
  ?>
    <script language="javascript">
      alert("Booking Kamar Gagal");
      document.location = 'tambah.php';
    </script>
  <?php
  }
}

// ============================EDIT============================================
function edit($id_transaksi, $no_kamar)
{
  $conn = koneksi();

  $query2 = "UPDATE transaksi SET status='Check Out' WHERE id_transaksi='$id_transaksi'";
  $query_run = mysqli_query($conn, $query2);

  $query1 = "UPDATE kamar SET status='Unbooked' WHERE no_kamar='$no_kamar'";
  $query_run = mysqli_query($conn, $query1);

  if ($query_run) {
  ?>
    <script language="javascript">
      alert("Check Out Berhasil");
      document.location = 'index.php';
    </script>

  <?php
  } else {
  ?>
    <script language="javascript">
      alert("Check Out Gagal");
      document.location = 'index.php';
    </script>
  <?php
  }
}

// ============================HAPUS============================================
function hapus($id_transaksi, $no_kamar)
{
  $conn = koneksi();

  $query2 = "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'";
  $query_run = mysqli_query($conn, $query2);

  $query1 = "UPDATE kamar SET status='Unbooked' WHERE no_kamar='$no_kamar'";
  $query_run = mysqli_query($conn, $query1);

  if ($query_run) {
  ?>
    <script language="javascript">
      alert("Data Berhasil Dihapus");
      document.location = 'index.php';
    </script>

  <?php
  } else {
  ?>
    <script language="javascript">
      alert("Data Gagal Dihapus");
      document.location = 'index.php';
    </script>
<?php
  }
}
