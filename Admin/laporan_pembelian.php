<?php
include 'koneksi.php';
$semuadata=array();
$mulai= "-";
$selesai="-";
if(isset($_POST["lihat"])){
    $mulai = $_POST["mulai"];
    $selesai = $_POST["selesai"];
    $sql=mysqli_query($conn,"SELECT * FROM pembelian LEFT JOIN user2 ON pembelian.id_user=user2.id_user 
    WHERE tanggal_pembelian BETWEEN '$mulai' AND '$selesai'");
    while($data = mysqli_fetch_assoc($sql))
    {
        $semuadata[]=$data;
    }
}


?>


<!doctype html>
<html lang="en">
<title>Laporan</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <h2>Laporan Pembelian dari <?php echo $mulai?> Hingga <?php echo $selesai ?> </h2>
    <hr>
    <form action="" method="post">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label >Tanggal Mulai</label>
                    <input type="date" class="form-control" name="mulai" value="<?php echo $mulai?>">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label >Tanggal Selesai</label>
                    <input type="date" class="form-control" name="selesai" value="<?php echo $selesai ?>">
                </div>
            </div>
            <div class="col-md-2">
                <label >&nbsp;</label><br>
                <button class="btn btn-success" name="lihat">Lihat</button>
            </div>
        </div>
    </form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pembeli</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $total=0; ?>
        <?php foreach ($semuadata as $key => $value ): ?>
        <?php $total+=$value['total_pembelian'];?>
        <tr>
            <td><?php echo $key+1;?></td>
            <td><?php echo $value["nama"];?></td>
            <td><?php echo date("d F Y",strtotime($value["tanggal_pembelian"]));?></td>
            <td>Rp. <?php echo number_format($value["total_pembelian"]);?></td>
            <td><?php echo $value["status_pembelian"];?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">TOTAL</th>
            <th>Rp. <?php echo number_format($total); ?> </th>
        </tr>
    </tfoot>
</table>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>