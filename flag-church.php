<?php
    include 'assets/core/connection.php';
    $Vccbrpgb40cu = decode5t($_GET['uid']);
    $V4cunalr1qlh = update("UPDATE church_login SET flag='1' WHERE id='$Vccbrpgb40cu' ");
    if ($V4cunalr1qlh) {
        $a = "flagsuccess";
        echo "<script>window.location.href='users?fa=$a';</script>";
    }else{
        $a = "flagerror";
        echo "<script>window.location.href='users?fa=$a';</script>";
    }
?>