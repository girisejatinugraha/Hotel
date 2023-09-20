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

  $nama = htmlspecialchars($data['nama']);
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  $query = "INSERT INTO admin VALUES (null, '$nama', '$username', '$password')";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

// ============================EDIT============================================
function edit($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  $query = "UPDATE admin SET nama='$nama', username='$username', password='$password' WHERE id='$id'";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}


// ============================HAPUS============================================
function hapus($data)
{
  $conn = koneksi();
  $query = "DELETE FROM admin WHERE id='$data'";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
