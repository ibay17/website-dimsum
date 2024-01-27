<?php
$host="localhost";
$user="root";
$password="";
$db="db_webp";
$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
