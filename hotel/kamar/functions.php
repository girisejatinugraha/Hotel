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
  $tipe = htmlspecialchars($data['tipe']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $harga = htmlspecialchars($data['harga']);

  $query = "INSERT INTO kamar VALUES ('$no_kamar', '$tipe', '$deskripsi', '$harga', 'Unbooked')";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

// ============================EDIT============================================
function edit($data)
{
  $conn = koneksi();

  $no_kamar = $data['no_kamar'];
  $tipe = htmlspecialchars($data['tipe']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $harga = htmlspecialchars($data['harga']);

  $query = "UPDATE kamar SET tipe='$tipe', deskripsi='$deskripsi', harga='$harga' WHERE no_kamar='$no_kamar'";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}


// ============================HAPUS============================================
function hapus($data)
{
  $conn = koneksi();
  $query = "DELETE FROM kamar WHERE no_kamar='$data'";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
