<?php
    include 'assets/core/connection.php';
    $Vccbrpgb40cu = decode5t($_GET['vid']);
    $V4cunalr1qlh = update("UPDATE inventory SET status='Active' WHERE id='$Vccbrpgb40cu' ");
    if ($V4cunalr1qlh) {
        $a = "unflagsuccess";
        echo "<script>window.location.href='manage-inventory?ufa=$a&vid=$Vccbrpgb40cu'</script>";
    }else{
        $a = "unflagerror";
        echo "<script>window.location.href='manage-member?ufa=$a&vid=$Vccbrpgb40cu'</script>";
    }
?>