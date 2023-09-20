<?php
require "functions.php";

$conn = koneksi();
$id_transaksi = $_GET['id_transaksi'];

$query = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
$trans = mysqli_fetch_array($query);

$id_transaksi = $trans['id_transaksi'];
$no_kamar = $trans['no_kamar'];

hapus($id_transaksi, $no_kamar);
