<?php
include 'koneksi.php';
include 'session.php';
// mendapatkan id url
$id_produk = $_GET["id"];

// mengambil data
$sql=mysqli_query($conn,"SELECT * FROM produk WHERE id_produk = '$id_produk'");
$data = mysqli_fetch_assoc($sql);
?>
<!doctype html>
<html lang="en">
<title>Detail</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
              <a class="nav-link active" aria-current="page" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="keranjang.php">Keranjang</a>
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
              <a class="nav-link active" aria-current="page" href="index.php">Checkout</a>
            </li>
          </ul>
        </div>
      </div>
</nav>
<!-- akhir navbar -->

<!-- awal detail -->
<section class="menu menu-style">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="img/<?php echo $data['foto_produk'];?>"  alt="" width="350" class="img-responsive">
      </div>
      <div class="col-md-6 mt-4">
        <h2><?php echo $data['nama_produk'];?></h2>
        <h4>Rp. <?php echo number_format($data['harga_produk']);?></h4>

        <h5>Stok: <?php echo $data["stok"];?></h5>

        <form action="" method="post">
          <div class="form-group">
            <div class="input-group">
              <input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $data["stok"];?>">
              <div class="input-group-btn">
                <button class="btn btn-primary ms-1" name="beli">Beli</button>
              </div>
            </div>
          </div>
        </form>

        <?php
        // jika menekan tombol beli
        if(isset($_POST['beli']))
        {
          $Jumlah = $_POST["jumlah"];
          // masuk keranjang belanja
          $_SESSION['keranjang'][$id_produk]=$Jumlah;
          echo "<script>alert('Berhasil menambah produk ke keranjang');</script>";
          echo "<script>location='keranjang.php';</script>";
        }
        ?>
        <p class="mt-3"><?php echo $data['deskripsi'];?></p>
      </div>
    </div>
  </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>