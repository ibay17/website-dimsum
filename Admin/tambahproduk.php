<?php
include "koneksi.php";

?>

<!doctype html>
<html lang="en">
<title>Tambah Produk</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<H2>Halaman Tambah Produk</H2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Kategori</label>
            <select name="kategori" class="form-control">
                <option value="">Pilih Kategori</option>
                <option value="Pizza">Dimsum</option>
            </select>
    </div>
    <div class="form-group">
        <label> Nama </label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label> Harga </label>
        <input type="text" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <label> Stok</label>
        <input type="text" class="form-control" name="stok">
    </div>
    <div class="form-group">
        <label> Foto </label>
        <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
        <label> Deskripsi </label>
        <textarea class="form-control" name="deskripsi"  rows="10"></textarea>
    </div>
    <button class="btn btn-primary " name="save">Simpan</button>
</form>
    
<?php
if(isset($_POST['save'])){
    $namafoto=$_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi,"../foto/".$namafoto);  

    $kategori = $_POST["kategori"];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];
    $stok = $_POST["stok"];

    mysqli_query($conn,"INSERT INTO produk (kategori,nama_produk,harga_produk,foto_produk,deskripsi,stok) 
    VALUES('$kategori','$nama','$harga','$namafoto','$deskripsi','$stok')");  
    echo "<script>alert('Produk Berhasil Ditambahkan')</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
    }
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>