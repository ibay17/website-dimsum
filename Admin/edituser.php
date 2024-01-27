<h2>Tabel Ubah Produk</h2>

<?php
include "koneksi.php";

$user = mysqli_query($conn, " SELECT * FROM user2 INNER JOIN role on user2.roleId=role.id WHERE user2.id_user = '" . $_GET['id'] . "'");
$u = mysqli_fetch_object($user);

$sql = mysqli_query($conn, "SELECT * FROM user2 WHERE id_user='$_GET[id]'");
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
            <label> Nama </label>
            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'];?>">
        </div>
        <div class="form-group">
            <label> Email </label>
            <input type="text" class="form-control" name="email"value="<?php echo $data['email'];?>">
        </div>
        <div class="form-group">
            <label> Nomor Telepon </label>
            <input type="text" class="form-control" name="no_telp" value="<?php echo $data['No_telp'];?>">
        </div>
        <div class="form-group">
            <label></label>
                <select name="role" class="form-control">
                    <option value="<?php echo $u->roleId ?>"><?php echo $u->roleName ?></option>
                    
                    <?php
                        $role = mysqli_query($conn, "SELECT * FROM role");
                        while ($r = mysqli_fetch_array($role)) {
                    ?>
                    <option value="<?php echo $r['id'] ?>"><?php echo $r['roleName'] ?></option>
                    <?php } ?>
                </select>
        </div>
        <button class="btn btn-primary " name="edit">Edit</button>
    </form>
<?php
if(isset($_POST['edit'])){
    $role = $_POST["role"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $no_telp = $_POST["no_telp"];
    
    mysqli_query($conn,"UPDATE user2 
    SET nama='$nama',email='$email',No_telp='$no_telp',roleId='$role' WHERE id_user='$_GET[id]'");

    echo "<script>alert('Produk Berhasil Diubah')</script>";
    echo "<script>location='index.php?halaman=user';</script>";

    }

?>