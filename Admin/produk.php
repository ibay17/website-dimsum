<!doctype html>
<html lang="en">
<title>Produk</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <h2>TABEL PRODUK</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Id Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php $sql=mysqli_query($conn,"SELECT * FROM produk");?>
            <?php while($data=mysqli_fetch_assoc($sql)) {?>
            
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $data['nama_produk']; ?></td>
                <td><?php echo $data['id_produk']; ?></td>
                <td><?php echo $data['kategori']; ?></td>
                <td><?php echo $data['harga_produk']; ?></td>
                <td><img src="../foto/<?php echo $data['foto_produk'];?>" alt="" width="80"></td>
                <td><?php echo $data['stok'];?></td>
                <td>
                    <a href="index.php?halaman=hapusproduk&id=<?php echo $data['id_produk'];?>" class="btn btn-danger">hapus</a>
                    <a href="index.php?halaman=ubahproduk&id=<?php echo $data['id_produk'];?>" class="btn btn-primary">ubah</a>
                </td>
            </tr>
            <?php $nomor++; ?>
            <?php } ?>
        </tbody>
    </table> 
    <a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>