<?php
include 'koneksi.php';
    

$sql = mysqli_query($conn,"SELECT * FROM pesan");
?>
<!doctype html>
<html lang="en">
<title>Pesan</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
  <body>
    <h1>Pesan Pelanggan</h1>
    <table class="table table-bordered">
        <thead class="text-center fw-bold">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php while($data=mysqli_fetch_assoc($sql)) {?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $data['perihal']; ?></td>
                <td>
                    <a href="index.php?halaman=pesan&id=<?php echo $data['id_pesan'];?>" class="btn btn-success">Lihat</a>
                </td>
            </tr>
            <?php $nomor++; ?>
            <?php } ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>