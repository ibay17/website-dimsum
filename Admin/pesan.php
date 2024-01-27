<?php
include 'koneksi.php';

$sql = mysqli_query($conn,"SELECT * FROM pesan WHERE id_pesan='$_GET[id]'");
$data = mysqli_fetch_assoc($sql);
    
?>
<!doctype html>
<html lang="en">
<title>Pesan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <h2>Pesan</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-3">
                <table class="table table-bordered border-dark fw-bold">
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $data["nama"];?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $data["email"];?></td>
                        
                    </tr>
                    <tr>
                    <th>Judul</th>
                        <td><?php echo $data["judul"];?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo $data["tanggal"];?></td>
                    </tr>
                    <tr>
                        <th>Perihal</th>
                        <td><?php echo $data["perihal"];?></td>
                    </tr>
                    <tr>
                        <th>Pesan</th>
                        <td><?php echo $data["pesan"];?></td>
                    </tr>
                    
                </table>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    

</html>