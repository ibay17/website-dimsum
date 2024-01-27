<?php
include "koneksi.php";

$sql=mysqli_query($conn,"SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$data = mysqli_fetch_assoc($sql);
$fotoproduk=$data['foto_produk'];
if(file_exists("../foto/$fotoproduk")){
    unlink("../foto/$fotoproduk");
}
mysqli_query($conn,"DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script>alert('Produk Berhasil Dihapus')</script>";
echo "<script>location='index.php?halaman=produk';</script>";


?>