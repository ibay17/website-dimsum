<?php 
 
 include 'session.php';
 include 'koneksi.php';
 ?>
 <!doctype html>
<html lang="en">
<title>Riwayat</title>
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

<section>
    <div class="container">
        <h3 class="text-center mt-3">Riwayat Transaksi <?php echo $_SESSION["nama"];?></h3>
        <hr>
        <table class="table table-bordered table-danger border-dark fw-bold " >
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mendapat id user dari session -->
                <?php $nomor=1; ?>
                <?php 
                $id_user=$_SESSION["id_user"];
                $sql=mysqli_query($conn,"SELECT * FROM pembelian WHERE id_user='$id_user'");?>
                <?php while($data=mysqli_fetch_assoc($sql)) {?>
                <tr class="text-center">
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $data["tanggal_pembelian"];?></td>
                    <td><?php echo $data["status_pembelian"];?>
                        <br>
                        <?php if (!empty($data["no_pengiriman"])):?>
                        Resi : <?php echo $data["no_pengiriman"];?>
                        <?php endif ?>
                    </td>
                    <td><?php echo number_format($data["total_pembelian"]);?></td>
                    <td>
                        <a href="nota.php?id=<?php echo $data["id_pembelian"];?>" class="btn btn-success btn-sm">Lihat</a>

                        <?php if($data['status_pembelian']=="pending"):?>
                        <a href="pembayaran.php?id=<?php echo $data["id_pembelian"];?>" class="btn btn-info btn-sm text-light">pembayaran
                        </a>
                        <?php else: ?>
                            <a href="lihat_pembayaran.php?id=<?php echo $data["id_pembelian"];?>"class="btn btn-warning btn-sm text-light">Lihat Pembayaran</a>
                        <?php endif ?>
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
    </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>