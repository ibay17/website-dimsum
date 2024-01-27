<?php
include 'koneksi.php';
$id_beli=$_GET['id'];

$sql = mysqli_query($conn,"SELECT * FROM pembayaran WHERE id_pembelian ='$id_beli'");
$data = mysqli_fetch_assoc($sql);
    
?>

<!doctype html>
<html lang="en">
<title>Pembayaran</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <h2>Data Pembayaran</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-3">
                <table class="table table-bordered border-dark fw-bold">
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $data["nama"];?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?php echo $data["bank"];?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?php echo number_format($data["jumlah"]);?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo $data["tanggal"];?></td>
                    </tr>
                    
                </table>
            </div>
            <div class="col-md-6">
                <img src="../bukti_bayar/<?php echo $data["bukti"];?>" alt="" class="img-responsive mt-3" width="800" >
            </div>
            <form action=""method="post">
            <div class="form-group">
                <label>No. Pengiriman</label>
                <input type="text" class="form-control" name="nokirim">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="">Pilih Status</option>
                    <option value="Lunas">Lunas</option>
                    <option value="Barang Dikirim">Barang Dikirim</option>
                    <option value="Batal">Batal</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
            <button class="btn btn-success btn-md" name="Proses">Proses</button>
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['Proses']))
    {
        $nokirim=$_POST["nokirim"];
        $status = $_POST["status"];

        mysqli_query($conn,"UPDATE pembelian SET no_pengiriman='$nokirim', status_pembelian='$status' 
        WHERE id_pembelian='$id_beli'");

        echo "<script>alert('Data Berhasil Di Update');</script>";
        echo "<script>location='index.php?halaman=pembelian';</script>";
    }
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>