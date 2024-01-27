<?php
include 'koneksi.php';
include 'session.php';

// Mendapatkan id_pembelian dari url

$idbayar=$_GET["id"];
$sql=mysqli_query($conn,"SELECT * FROM pembelian WHERE id_pembelian='$idbayar'");
$data=mysqli_fetch_assoc($sql);

// mendapatkan id user yang beli
$id_login= $_SESSION["id_user"];
$id_beli = $data["id_user"];

if($id_beli !== $id_login)
{
    echo "<script>alert('Eror');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}
?>
<!doctype html>
<html lang="en">
<title>Pembayaran</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Awal Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-style">
    <div class="container-fluid">
      <a class="navbar-brand" href="homepage.php">
      <img src="img/dimsumlogo.png" alt="" width="200">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto fs-4 me-4">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="keranjang.php">Keranjang</a>
            </li>
            <div class="dropdown mt-1">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
              </svg>
            </button>
                <ul class="dropdown-menu " aria-labelledby="dropdownMenu2">
                  <?php if(isset($_SESSION['masuk'])): ?>
                    <li class="nav-item">
                      <a class="nav-link " href="riwayat.php">Riwayat Transaksi</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="auth/logout.php">Logout</a>
                    </li>
                  <?php else: ?>
                    <li class="nav-item">
                      <a class="nav-link" href="login.php">Login</a>
                    </li>
                  <?php endif ?>
                </ul>
            </div>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Checkout</a>
            </li>
          </ul>
        </div>
      </div>
</nav>
<!-- Akhir Navbar -->

<div class="container">
    <h2>Konfirmasi Pembayaran</h2>
    <p>Kirim Bukti Pembayaran Anda Disini</p>
    <div class="alert alert-info">Total Tagihan Anda <strong>Rp. <?php echo number_format($data["total_pembelian"]);?></strong></div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
            <label>Bank</label>
            <input type="text" class="form-control" name="bank">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="text" class="form-control" name="jumlah" min="1">
        </div>
        <div class="form-group">
            <label>Foto Bukti</label>
            <input type="file" class="form-control" name="bukti">
            <p class="text-danger">Foto bukti maksimal 2MB</p>
        </div>
        <button class="btn btn-primary" name="kirim">Kirim</button>
    </form>
</div>
    <?php
    if(isset($_POST["kirim"])){
        // Upload foto bukti
        $namabukti = $_FILES["bukti"]["nama"];
        $lokasifoto = $_FILES["bukti"]["tmp_name"];
        $namafoto = date("YmdHis").$namabukti;
        move_uploaded_file($lokasifoto,"bukti_bayar/$namafoto");

        $nama = $_POST["nama"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"];
        $tanggal = date("Y-m-d");
        
        $sql = mysqli_query($conn,"INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti) 
        VALUES ('$idbayar','$nama','$bank','$jumlah','$tanggal','$namafoto')");

        // Mengubah status dari pending menjadi lunas jika sudah bayar
        $sql = mysqli_query($conn,"UPDATE pembelian SET status_pembelian='Lunas' 
        WHERE id_pembelian='$idbayar'");
        echo "<script>alert('Terimakasih Sudah Membayar pesananmu akan sampai dalam waktu 30 menit');</script>";
        echo "<script>location='riwayat.php';</script>";
        
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>