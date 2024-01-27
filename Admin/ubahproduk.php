<h2>Tabel Ubah Produk</h2>
<?php
include "koneksi.php";

$sql=mysqli_query($conn,"SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$data = mysqli_fetch_assoc($sql);



?>
<!doctype html>
<html lang="en">
<title>Edit</title>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Kategori</label>
            <select name="kategori" class="form-control">
                <option value="">Pilih Kategori</option>
                <option value="Dimsum">Dimsum</option>
            </select>
    </div>
    <div class="form-group">
        <label> Nama </label>
        <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_produk'];?>">
    </div>
    <div class="form-group">
        <label> Stok</label>
        <input type="text" class="form-control" name="stok">
    </div>
    <div class="form-group">
        <label> Harga </label>
        <input type="text" class="form-control" name="harga" value="<?php echo $data['harga_produk'];?>">
    </div>
    <div class="form-group">
        <img src="../foto/<?php echo $data['foto_produk'];?>" alt="" width="200">
    </div>
    <div class="form-group">
        <label >Ganti Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
        <label> Deskripsi </label>
        <textarea class="form-control" name="deskripsi"  rows="10" ><?php echo $data['deskripsi'];?></textarea>
    </div>
    <button class="btn btn-primary " name="edit">Edit</button>
</form>
<?php
if(isset($_POST['edit'])){
    $namafoto=$_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    $kategori = $_POST["kategori"];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];
    $stok = $_POST["stok"];
    //jika foto diubah
    if(!empty($lokasifoto)){
        move_uploaded_file($lokasifoto,"../foto/$namafoto");
        mysqli_query($conn,"UPDATE produk SET 
        nama_produk='$nama',kategori='$kategori',harga_produk='$harga',stok='$stok',foto_produk='$namafoto',deskripsi='$deskripsi' WHERE id_produk='$_GET[id]'");
    }
    else{
        mysqli_query($conn,"UPDATE produk SET 
        nama_produk='$nama',kategori='$kategori',harga_produk='$harga',stok='$stok',deskripsi='$deskripsi' WHERE id_produk='$_GET[id]'");
    }
    echo "<script>alert('Produk Berhasil Diubah')</script>";
    echo "<script>location='index.php?halaman=produk';</script>";

    }

?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>
