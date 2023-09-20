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

  $nik = htmlspecialchars($data['nik']);
  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $telepon = htmlspecialchars($data['telepon']);

  $query = "INSERT INTO tamu VALUES ('$nik', '$nama', '$alamat', '$telepon')";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

// ============================EDIT============================================
function edit($data)
{
  $conn = koneksi();

  $nik = htmlspecialchars($data['nik']);
  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $telepon = htmlspecialchars($data['telepon']);

  $query = "UPDATE tamu SET nama='$nama', alamat='$alamat', telepon='$telepon' WHERE nik='$nik'";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}


// ============================HAPUS============================================
function hapus($data)
{
  $conn = koneksi();
  $query = "DELETE FROM tamu WHERE nik='$data'";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
