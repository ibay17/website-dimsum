<!doctype html>
<html lang="en">
<title>Pembelian</title>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <h2>TABEL PEMBELIAN</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php $sql=mysqli_query($conn,"SELECT * FROM pembelian JOIN user2 ON pembelian.id_user=user2.id_user");?>
            <?php while($data=mysqli_fetch_assoc($sql)) {?>
            
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['tanggal_pembelian']; ?></td>
                <td><?php echo $data['status_pembelian']; ?></td>
                <td>Rp. <?php echo number_format($data['total_pembelian']); ?></td>
                <td>
                    <a href="index.php?halaman=detail&id=<?php echo $data['id_pembelian']; ?>" class="btn btn-info">detail</a>
                    <?php if ($data["status_pembelian"]!=="pending"):?>
                    <a href="index.php?halaman=pembayaran&id=<?php echo $data['id_pembelian']; ?>" class="btn btn-success">Pembayaran</a>
                    <?php endif ?>
                </td>
            </tr>
            <?php $nomor++; ?>
            <?php } ?>
        </tbody>
    </table> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>