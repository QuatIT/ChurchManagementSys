<?php
    include 'assets/core/connection.php';
    $Vccbrpgb40cu = decode5t($_GET['vid']);
    $V4cunalr1qlh = update("UPDATE inventory SET status='Flagged' WHERE id='$Vccbrpgb40cu' ");
    if ($V4cunalr1qlh) {
        $a = "flagsuccess";
        echo "<script>window.location.href='manage-inventory?fa=$a&vid=$Vccbrpgb40cu'</script>";
    }else{
        $a = "flagerror";
        echo "<script>window.location.href='manage-member?fa=$a&vid=$Vccbrpgb40cu'</script>";
    }
?>