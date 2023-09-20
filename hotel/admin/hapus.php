<?php
require "functions.php";

$id = $_GET['id'];

if (hapus($id) > 0) {
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