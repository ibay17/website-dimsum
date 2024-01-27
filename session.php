<?php
    session_start();
    
    if($_SESSION['masuk'] == false){
        header('Location: login.php');
    }
?>