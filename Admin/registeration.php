<?php
require 'koneksi.php';

if( isset($_POST["Daftar"])){
    $nama  = ($_POST["nama"]);
    $username  = ($_POST["username"]);
    $password =($_POST["password"]); 
    $password2 =($_POST["password2"]);
    
    


  if ($password == $password2) {
        $sql = "SELECT * FROM admin WHERE username='$username'";
        $hasil  = mysqli_query($conn, $sql);
        $password = password_hash($password,PASSWORD_DEFAULT);
        if (!$hasil ->num_rows > 0) {
            $sql = "INSERT INTO admin (id_admin,nama,password,username)VALUES ('','$nama','$password','$username')";
            $hasil  = mysqli_query($conn, $sql);
            if ($hasil ) {
                echo "<script>alert('Selamat, akun berhasil dibuat!')</script>";
                echo "<script>location='login.php';</script>";
                $nama = "";
                $username = "";
                $_POST['password'] = "";
                $_POST['password2'] = "";
              } else {
                echo "<script>alert('Maaf Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Maaf Username Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<title>Register</title>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="register.css" />
    <title>Register Admin</title>
  </head>
  <body>
    <div class="container">
      <form class="form-container" action="" method="post">
        <h3 class="judul">Register</h3>
        <div class="row mt-4">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputEmail1" name="password"  placeholder="Masukkan password" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Username</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="username" placeholder="Masukkan username" />
            </div>
          </div>
        <div class="col-md-5">
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password2" placeholder="Masukkan password" />
          </div>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" />
          <label class="form-check-label" for="exampleCheck1">Saya Setuju dengan syarat dan ketentuan yang berlaku*</label>
        </div>
        <div class="row mt-4">
          <div class="col-md-4 d-grid">
            <button type="submit" name="Daftar" class="btn btn-outline-success">Daftar</button>
          </div>
        </div>
        <div class="mt-3">
          <label class="punya-akun">Sudah Punya Akun? <a href="login.php" class="link">Login disini</a></label>
        </div>
      </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
