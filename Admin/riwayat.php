<?php
session_start();
include 'koneksi.php';
$id_user=$_GET["id"];

?>
<!doctype html>
<html lang="en">
<title>Riwayat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <section>
    <div class="container">
    <?php if (isset($_SESSION["nama"])) { ?>
        <h3 class="text-center mt-3">Riwayat Transaksi <?php echo $_SESSION["nama"];?></h3>
    <?php } else { ?>
        <h3 class="text-center mt-3">Riwayat Transaksi</h3>
    <?php } ?>
        <hr>
        <table class="table table-bordered  border-dark fw-bold " >
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mendapat id user dari session -->
                <?php $nomor=1; ?>
                <?php 
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
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
    </div>
</section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
</html>