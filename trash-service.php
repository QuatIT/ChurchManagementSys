<?php
    include 'assets/core/connection.php';
    $attendId = $_GET['id'];
    $V4cunalr1qlh = delete("DELETE FROM service_tb WHERE id='$attendId' ");
    if ($V4cunalr1qlh) {
        $a = "trashsuccess";
        echo "<script>window.location.href='services?ta=$a';</script>";
    }else{
        $a = "trasherror";
        echo "<script>window.location.href='services?ta=$a';</script>";
    }
?>