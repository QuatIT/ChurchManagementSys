<?php
    include 'assets/core/connection.php';
    $Vccbrpgb40cu = $_GET['mid'];
    //$V4cunalr1qlh = delete("DELETE  FROM membership_tb WHERE member_id='$Vccbrpgb40cu' ");
    $V4cunalr1qlh = update("UPDATE membership_tb SET member_status='Yes' WHERE id='$Vccbrpgb40cu' ");
    if ($V4cunalr1qlh) {
        $a = "success";
        echo "<script>window.location.href='manage-non-members?am=$a&mid=$Vccbrpgb40cu'</script>";
    }else{
        $a = "error";
        echo "<script>window.location.href='manage-non-members?am=$a&mid=$Vccbrpgb40cu'</script>";
    }
?>