<?php
include "koneksi.php";

$sql=mysqli_query($conn,"SELECT * FROM user2 WHERE id_user='$_GET[id]'");
$data = mysqli_fetch_assoc($sql);
mysqli_query($conn,"DELETE FROM user2 WHERE id_user='$_GET[id]'");

echo "<script>alert('Produk Berhasil Dihapus')</script>";
echo "<script>location='index.php?halaman=user';</script>";


?>