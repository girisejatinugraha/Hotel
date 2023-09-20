<?php
require "functions.php";

$nik = $_GET['nik'];

if (hapus($nik) > 0) {
?>
  <script>
    alert("Data Berhasil Dihapus");
    document.location = "index.php";
  </script>
<?php
} else {
?>
  <script>
    alert("Data Gagal Dihapus");
    history.back(self);
  </script>
<?php
}
?>