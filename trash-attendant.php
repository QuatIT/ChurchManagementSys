<?php
    include 'assets/core/connection.php';
    $attendId = $_GET['atid'];
    $V4cunalr1qlh = delete("DELETE FROM attendance_tb WHERE id='$attendId' ");
    if ($V4cunalr1qlh) {
        $a = "trashsuccess";
        echo "<script>window.location.href='headcount?ta=$a';</script>";
    }else{
        $a = "trasherror";
        echo "<script>window.location.href='headcount?ta=$a';</script>";
    }
?>