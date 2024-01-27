<?php
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
<title>Detail</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <h2>HALAMAN DETAIL</h2>
    <?php $sql=mysqli_query($conn,"SELECT * FROM pembelian JOIN user2 ON pembelian.id_user=user2.id_user WHERE pembelian.id_pembelian='$_GET[id]'");?>
    <?php $data=mysqli_fetch_assoc($sql);?>

    <strong>
    <p>
        
    </p>
    <p>
        
    </p>
    <div class="row">
        <div class="col-md-9 text-start">
            <h3>Pembelian</h3>
            <p>
                Tanggal : <?php echo $data['tanggal_pembelian']; ?> <br>
                Total :   Rp. <?php echo number_format($data['total_pembelian']); ?><br>
                Status : <?php echo $data["status_pembelian"];?>
            </p>
        </div>
        <div class="col-md-3 text-start mb-3">
            <h3>Pelanggan</h3>
            <p> Nama : <?php echo $data['nama'];?><br>
                No.Telp : <?php echo $data['No_telp']; ?> <br>
                Email :   <?php echo $data['email']; ?>
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
                <th>Deskripsi</th>
                <th>Total Harga</th>
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
                <td>Rp. <?php echo number_format($data['harga_produk']); ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td><?php echo $data['deskripsi_pembelian']; ?></td>
                <td>Rp. <?php echo number_format($data['jumlah']*$data['harga_produk']); ?></td>
            </tr>
            <?php $nomor++; ?>
            <?php } ?>
        </tbody>
    </table> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>