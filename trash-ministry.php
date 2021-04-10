<?php
    include 'assets/core/connection.php';
    $attendId = $_GET['mid'];
    // $V4cunalr1qlh = delete("DELETE FROM ministry_tb WHERE id='$attendId' ");
    $V4cunalr1qlh = update("UPDATE ministry_tb SET isActive = 0 WHERE id='$attendId' ");
    if ($V4cunalr1qlh) {
        $a = "trashsuccess";
        echo "<script>window.location.href='manage-ministry?ta=$a';</script>";
    }else{
        $a = "trasherror";
        echo "<script>window.location.href='manage-ministry?ta=$a';</script>";
    }
?>