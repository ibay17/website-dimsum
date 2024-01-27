<?php
include 'koneksi.php';
session_start();

if(empty($_SESSION['keranjang']) OR !isset ($_SESSION['keranjang']))
{
    echo "<script>alert('Keranjang Kosong Silahkan Berbelanja')</script>";
    echo "<script>location='menu.php';</script>";
}
?>

<!doctype html>
<html lang="en">
<title>Keranjang</title>
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="keranjang.css" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

<!-- Tabel Beli -->

<section class="tabel">
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <hr>
        <table class="table table-bordered table-danger " >
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Pesanan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $nomor=1; ?>
                <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah):?>
                <?php $sql=mysqli_query($conn,"SELECT * FROM produk WHERE id_produk='$id_produk'");
                 $data=mysqli_fetch_assoc($sql);
                 $totalharga=$data['harga_produk'] * $jumlah;
                 ?>
                 
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['nama_produk'];?></td>
                    <td><?php echo number_format($data['harga_produk']);?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td><?php echo number_format($totalharga); ?></td>
                    <td>
                        <a href="hapuskeranjang.php?id=<?php echo $id_produk?>" class="
                        btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php $nomor++;?>
                <?php endforeach?>
            </tbody>
            
        </table>
        <a href="index.php"class="btn btn-primary">Checkout</a>
        <a href="menu.php"class="btn btn-secondary">Lanjutkan Belanja</a>
    </div>

</section>
<!-- Akhir Tabel Beli -->

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>