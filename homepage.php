<?php
include 'koneksi.php';
include 'session.php';
?>

<!doctype html>
<html lang="en">
<title>homepage</title>
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="homepage2.css" />
    <script src="https://kit.fontawesome.com/758a60f571.js" crossorigin="anonymous"></script>
</head>
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
              <a class="nav-link" aria-current="page" href="index.php">Checkout</a>
            </li>
          </ul>
        </div>
      </div>
</nav>
<!-- Akhir Navbar -->
<!-- Awal Carousel -->
<div class="container-fluid py-5">
  <div class="container">
  <div id="carouselExampleIndicators" class="carousel slide col-md-8 offset-lg-2 " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/dimsum.png" class="d-block w-100" alt="..." width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="img/dimsum.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/dimsum.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  </div>
</div>
<!-- Akhir Carousel -->

<!-- Awal Menu -->
    <!--<div class="container container-fluid py-5">
      <h1 class="text-center mb-5 mt-3 awal-card fst-italic">Best Seller Dari Pizza HUT</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-2 "></div>
                <div class="col-md-8 col-lg-12 card-style">
                    <img src="img/menu/1.png" alt="" class="img-fluid mb-3">
                    <a href="menu.php" class="pencet"><span>Pizza Pepperoni</span></a>
                </div>
                <div class="col-md-8 col-lg-12 card-style2 mt-3">
                    <img src="img/menu/7.png" alt="" class="img-fluid mb-2">
                    <a href="menu.php" class="pencet"><span>Pepperoni Cheese Pizza</span></a>
                </div>
                <div class="col-md-8 col-lg-12 card-style3 mt-3">
                    <img src="img/menu/11.png" alt="" class="img-fluid mb-2">
                    <a href="menu.php" class="pencet"><span>Melt Cheese Pizza</span></a>
                </div>
                <div class="col-md-8 col-lg-12 card-style mt-3">
                    <img src="img/menu/12.png" alt="" class="img-fluid mb-2">
                    <a href="menu.php" class="pencet"><span>Mac And Cheese</span></a>
                </div>
                <div class="col-md-8 col-lg-12 card-style mt-3">
                    <img src="img/menu/13.png" alt="" class="img-fluid mb-2">
                    <a href="menu.php" class="pencet"><span>Chicken Wings</span></a>
                </div>
                <div class="col-md-2 "></div>
            </div>
        </div>
    </div> -->
<!-- Akhir Menu -->

    <!-- Awal footer -->
    <?php
    include 'footer.php';
    ?>
    <!-- Akhir footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>