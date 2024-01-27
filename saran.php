<?php
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
<title>Saran</title>
  
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="saran.css" />
     <!-- Awal Navbar -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="homepage2.php">
        <img src="img/dimsumlogo.png" alt="" width="200">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto fs-4 me-4">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="keranjang.php">keranjang</a>
            </li>
              <?php if(isset($_SESSION['masuk'])): ?>
            <li class="nav-item">
            <a class="nav-link" href="auth/logout.php">Logout</a>
            </li>
              <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <?php endif ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Checkout</a>
            </li>
          </ul>
        </div>
      </div>
</nav>
<!-- Akhir Navbar -->
  
<!-- Awal menulis kolom saran -->
<div class="container">
    <div class="row">            
        <div class="col-md-12">
            <h2 class="text-center mt-3 span">Hubungi Kami</h2>
        </div>
    </div>
</div>
<div class="container">
    <form action="" method="post">
        <div class="row">
                <div class="col-md-4 mt-3">
                    <img src="img/dimsumlogo.png" class="img-fluid" alt="" width="200">
                </div>
                    
                <div class="col-md-4 mt-3 ">
                        <div class="form-group mt-3">
                            <label> Nama</label>
                            <input type="text" class="form-control saran-style" name="nama">
                        </div>
                        <div class="form-group mt-3">
                            <label>Judul</label>
                            <input type="text" class="form-control saran-style" name="judul">
                        </div>
                    
                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group mt-3">
                        <label>Alamat Email</label>
                        <input type="text" class="form-control saran-style" name="email">
                    </div>
                    <div class="form-group mt-3">
                        <label>Perihal</label>
                        <input type="text" class="form-control saran-style" name="perihal">
                    </div>
                </div>
                <div class="col-md-8 offset-md-4 mt-3">
                <div class="form-group mt-3">
                        <label>Pesan</label>
                        <textarea class="form-control saran2-style" name="pesan"  rows="10"></textarea>
                    </div>
                </div>
        </div>
        <div class="col-md-8 offset-md-6 mt-3 mb-4"> 
        <button class="btn btn-danger btn-lg" name="kirim">Submit</button>
        </div>
    </form>  
</div>
<!-- Akhir menulis kolom saran -->

<!-- jika menekan tombol submit -->
<?php
if(isset($_POST['kirim'])){
    $nama=$_POST["nama"];
    $email=$_POST["email"];
    $judul=$_POST["judul"];
    $perihal=$_POST["perihal"];
    $pesan=$_POST["pesan"];
    $tgl_pesan = date("Y-m-d");

    mysqli_query($conn,"INSERT INTO pesan(nama,email,judul,perihal,tanggal,pesan)
    VALUES('$nama','$email','$judul','$perihal','$tgl_pesan','$pesan')");
    echo "<script>alert('Pesanmu berhasil terkirim,terimakasih atas masukannya')</script>";
    echo "<script>location='homepage2.php';</script>";
}
?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  <!-- Footer -->
<footer class="bg-danger mt-5 footer-style">
  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">

      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
</footer>
<!-- Akhir Footer -->
</html>