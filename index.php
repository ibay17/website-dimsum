<?php 
 
 include 'session.php';
 include 'koneksi.php';
 if(empty($_SESSION['keranjang']) OR !isset ($_SESSION['keranjang']))
 {
     echo "<script>alert('Keranjang Kosong Silahkan Berbelanja')</script>";
     echo "<script>location='menu.php';</script>";
 }


?>
<!doctype html>
<html lang="en">
<title>Pembayaran</title>
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="index.css" />
   
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
    <section class="tabel">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 mt-3">
          <form action="" method="post">
            <div class="form-group ms-3 input-group-lg mb-3 form-control">
              <p class="fw-bold mt-3">Nama  : <span><input type="text" class="fw-bold ms-3" readonly value="<?php echo $_SESSION['nama']; ?>"></span></p>                
              <p class="fw-bold mt-3">No.Telp : <span><input type="text" class="fw-bold ms-1 " readonly value="<?php echo $_SESSION["No_telp"]; ?>"></span></p>
              <p class="fw-bold mt-3">Alamat : <span><input type="text" class="fw-bold ms-2 " readonly value="<?php echo $_SESSION["Alamat"]; ?>"></span></p>               
            </div>
        </div>
      </div>
        <hr>
          <table class="table table-bordered table-danger border-dark fw-bold" >
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Pesanan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
              <tbody class="text-center">
                  <?php $nomor=1; ?>
                  <?php $pajak = 0.1; ?>
                  <?php $ongkir = 9000; ?>
                  <?php $totalbelanja=0; ?>
                  <?php $totalhargabelanja=0; ?>
                  <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah):?>
                  <?php $sql=mysqli_query($conn,"SELECT * FROM produk WHERE id_produk='$id_produk'");
                  $data=mysqli_fetch_assoc($sql);
                  $totalharga=$data['harga_produk'] * $jumlah;
                  ?>
                  
                  <tr>
                      <td><?php echo $nomor; ?></td>
                      <td><?php echo $data['nama_produk'];?></td>
                      <td><?php echo number_format($data['harga_produk']);?></td>
                      <td><?php echo number_format($jumlah); ?></td>
                      <td><?php echo number_format($totalharga); ?></td>
                  </tr>
                  <?php $nomor++;?>
                  <?php $totalbelanja+=$totalharga  ; ?>
                  <?php $totalpajak = $totalbelanja * $pajak; ?>
                  <?php $totalhargabelanja = $totalbelanja + $totalpajak + $ongkir; ?>
                  <?php endforeach?>
              </tbody>
                <tfoot class="table table-bordered table-danger border-dark">
                    <tr>
                      <th colspan="4">Total Belanja</th>
                      <th class="text-center">Rp. <?php echo number_format($totalbelanja); ?> </th>
                    </tr>
                    <tr>
                      <th colspan="4">Pajak</th>
                      <th class="text-center">Rp. <?php echo number_format($totalpajak); ?> </th>
                    </tr>
                    <tr>
                      <th colspan="4">Ongkos Kirim</th>
                      <th class="text-center">Rp. <?php echo number_format($ongkir); ?> </th>
                    </tr>
                    <tr>
                      <th colspan="4">Total Harga</th>
                      <th class="text-center">Rp. <?php echo number_format($totalhargabelanja); ?> </th>
                    </tr>
                  </tfoot>

          </table>
          
              <div class="form-group">
                  <label> Deskripsi </label>
                  <textarea name="deskripsi" class="form-control"></textarea>
              </div>
        <button class="btn btn-danger btn-lg mb-3 mt-3" name="beli" >Checkout</button>
        
        </form>
        <?php
        if(isset($_POST['beli']))
        {
          // menginput data pembelian
          $deskripsi = $_POST["deskripsi"];
          $id_user = $_SESSION["id_user"];
          $tgl_beli = date("Y-m-d");
          mysqli_query($conn,"INSERT INTO pembelian (id_pembelian,id_user,tanggal_pembelian,deskripsi_pembelian,
           total_pembelian) VALUES('','$id_user','$tgl_beli','$deskripsi','$totalhargabelanja')");
          
          $id_beli_baru = mysqli_insert_id($conn);
          foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
          {
            mysqli_query($conn,"INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah,deskripsi_pembelian,total_harga) 
            VALUES ('$id_beli_baru','$id_produk','$jumlah','$deskripsi','$totalhargabelanja')");
          }
          // update stok
          $sql=mysqli_query($conn,"UPDATE produk SET stok=stok-$jumlah WHERE id_produk='$id_produk'");
          
          // mengosongkan keranjang
          unset($_SESSION["keranjang"]);

          echo "<script>alert('pembelian sukses');</script>";
          echo "<script>location='nota.php?id=$id_beli_baru';</script>";

        }
        ?>
    </div>
</section>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>