<?php
// ------------------------------KONEKSI-----------------------------------------
function koneksi()
{
  return mysqli_connect("localhost", "root", "", "giri hotel");
}

// ------------------------------LOGIN-----------------------------------------
function masuk($data)
{
  $conn = koneksi();
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  $admin = mysqli_query($conn, "SELECT * FROM admin");
  $rows = mysqli_num_rows($admin);
  $row = mysqli_fetch_array($admin);

  if ($rows > 0) {
    if ($username == $row['username'] && $password == $row['password']) {

      // Set Session
      $_SESSION['login'] = true;
      $_SESSION['nama'] = $row['nama'];
      $_SESSION['id'] = $row['id'];

      echo "<script>
              alert('Selamat Datang, " . $row['nama'] . "!');
              document.location = '../index.php';
            </script>";
    } else {
      return [
        'error' => true,
        'pesan' => 'Username atau Password Salah!'
      ];
    }
  }
}
