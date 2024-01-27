<?php
include 'koneksi.php';

session_start();
if (isset($_SESSION['nama'])) {
 header("Location: index.php");
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "SELECT * FROM user2 WHERE email='$email'");
    $result = mysqli_num_rows($sql);
    if ($result > 0) {
        $data = mysqli_fetch_array($sql);
        if (password_verify($password, $data['password'])) {
            $_SESSION['masuk'] = true;
            $_SESSION["nama"] = $data["nama"];
            $_SESSION["id_user"] = $data["id_user"];
            $_SESSION["No_telp"] = $data["No_telp"];
            $_SESSION["Alamat"] = $data["Alamat"];
            $_SESSION["roleId"] = $data["roleId"];

            if ($data["roleId"] == 1) {
                echo '<script>window.location="../moodimsum/admin/index.php"</script>';
            } else {
                echo '<script>window.location="../moodimsum/menu.php"</script>';
            }
        } else {
            echo "<script>alert('Password Anda salah. Silahkan coba lagi!')</script>";
        }
    } else {
        echo "<script>alert('Email Anda salah. Silahkan coba lagi!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="login.css" />

    <title>Login</title>
  </head>
  <body>
 
  <div class="container">
      <div class="card login-form">
        <div class="card-body">
          <h2 class="card-title text-center">Login Moo Dimsum</h2>
          <h6 class="card-subtitle text-muted mb-5 fw-bold text-center mt-3">Login untuk melakukan order</h6>
          <form action="" method="post">
            <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label">Email*</label>
              <input type="email" class="form-control" placeholder="Masukkan Email" name="email" id="email" aria-describedby="emailHelp" />
              <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password*</label>
              <input type="password" class="form-control" placeholder="Masukkan Password" name="password" id="password" />
            </div>
            <div class="d-grid mt-5">
              <button type="submit" name="login" class="btn btn-success btn-login">Login</button>
            </div>
            <!-- registrasi -->
            <div class="mt-4">
              <span>Belum punya akun? <a href="register.php" class="Link">daftar</a></span>
            </div>
            <!-- akhir registrasi -->
            
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
