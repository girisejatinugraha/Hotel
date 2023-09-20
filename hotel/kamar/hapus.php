<?php
require "functions.php";

$no_kamar = $_GET['no_kamar'];

if (hapus($no_kamar) > 0) {
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