
<?php
$host="localhost";
$user="root";
$password="";
$db="db_webp";
$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}




// function register($data){
    // global $conn;

    // $nama  = ($_POST["nama"]);
    // $email    =($_POST["email"]);
    // $password =($_POST["password"]); 
    // $password2 =($_POST["password2"]);
    // $nomor = ($_POST["no_telp"]);
    // $alamat  =($_POST["alamat"]);


    // $result = mysqli_query($conn,"SELECT Email FROM user2 WHERE Email = '$email'");
    // if( mysqli_fetch_assoc($result)){
        // echo "<script>
                // alert('Email sudah terdaftar')
                // </script>";
    // }

    // if(  $password !== $password2 ){
        // echo "<script>
                // alert('password anda tidak sesuai')
                // <?script>";
        // return false;
    // }
    // $password = password_hash($password,PASSWORD_DEFAULT);
//
//   mysqli_query($conn,"INSERT INTO user2 VALUES ('','$nama','$email','$password','$nomor','$alamat')");

    // return mysqli_affected_rows($conn);
// }


?>




