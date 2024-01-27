<?php 
 
include 'session.php';
include 'koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
  <title>Nota</title>
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
    <h1 class="text-center mt-3">NOTA PEMBELIAN</h1>

    <!-- nota -->
    <section class="nota">
        <div class="container">
            <?php $sql=mysqli_query($conn,"SELECT * FROM pembelian JOIN user2 ON pembelian.id_user=user2.id_user WHERE pembelian.id_pembelian='$_GET[id]'");?>
            <?php $data=mysqli_fetch_assoc($sql);?>
            <?php 
            $id_login= $_SESSION["id_user"];
            $id_beli = $data["id_user"];

            if($id_beli !== $id_login)
            {
              echo "<script>alert('Eror');</script>";
              echo "<script>location='riwayat.php';</script>";
              exit();
            }
            ?>
        <div class="row text-center mt-3 mb-3">
            <div class="col-md-10 text-start">
                <h3>Pembelian</h3>
                No.Pembelian : <strong> <?php echo $data['id_pembelian'];?></strong><br>
                <p>
                    Tanggal : <?php echo $data['tanggal_pembelian'];?> <br>
                    Total   : <?php echo number_format($data['total_pembelian']); ?>
                </p>
            </div>
            <div class="col-md-2 text-start">
                <h3>Pelanggan</h3>
                Nama : <strong><?php echo $data['nama'];?></strong><br>
                <p>
                No.Telp : <?php echo $data['No_telp']; ?> <br>
                Email :   <?php echo $data['email']; ?><br>
                Alamat : <?php echo $data['Alamat']; ?>
                </p>
            </div>
        </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor=1; ?>
                        <?php $sql=mysqli_query($conn,"SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk
                        WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
                        <?php while($data=mysqli_fetch_assoc($sql)) {?>
                        
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $data['nama_produk']; ?></td>
                            <td><?php echo number_format($data['harga_produk']); ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td><?php echo number_format($data['jumlah']*$data['harga_produk']); ?></td>
                            <td><?php echo number_format($data['total_harga']); ?></td>
                        </tr>
                        <?php $nomor++; ?>
                        <?php } ?>
                    </tbody>
                </table>
                <?php $sql=mysqli_query($conn,"SELECT * FROM pembelian JOIN user2 ON pembelian.id_user=user2.id_user WHERE pembelian.id_pembelian='$_GET[id]'");?>
            <?php $data=mysqli_fetch_assoc($sql);?>
            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                        <p>Silahkan membayar seharga Rp.  <?php echo number_format($data['total_pembelian']); ?> </p>
                        <p>Ke Rekening berikut <strong>1234567</strong></p>
                        <a href="pembayaran.php?id=<?php echo $data["id_pembelian"];?>" class="btn btn-success btn-md mb-3 mt-3" >Upload Bukti Bayar</a>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <!-- akhir nota -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>