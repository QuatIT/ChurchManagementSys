<?php
error_reporting(0);
include 'layout/head.php';
$Vh1pehjiprlg = $_GET['member_id'];
$Vdzrsljk3hff = select("SELECT * FROM membership_tb WHERE member_id='$Vh1pehjiprlg'");
foreach ($Vdzrsljk3hff as $Vlgt1exzgkgo) {
    $V1uiwycumgex = $Vlgt1exzgkgo['phone_number'];
}
if (isset($_POST['btnSms'])) {
    function sendsms($Vlh3fw0zjotq, $V3pwggxqp42l, $V1uiwycumgex) {
        $Vhtpvtpute22 = 'richardkanfrah';
        $Vqtxeg4vd5bq = 'godwin1.';
        @$V3pwggxqp42l = $_POST['subject'];
        @$Vlh3fw0zjotq = $_POST['body'];
        $Vb0doqlh1u0q = $V3pwggxqp42l . PHP_EOL . $Vlh3fw0zjotq;
        $Vyhyjfmfty1a = "Rohi Church";
        $Vtqp0c2egda1 = "http://isms.wigalsolutions.com/ismsweb/sendmsg/";
        $Vzy0tlgcc3ao = "username=" . $Vhtpvtpute22 . "&password=" . $Vqtxeg4vd5bq . "&from=" . $Vyhyjfmfty1a . "&to=" . $V1uiwycumgex . "&message=" . $Vb0doqlh1u0q;
        $Vaj0nr2jrc5o = curl_init();
        curl_setopt($Vaj0nr2jrc5o, CURLOPT_URL, $Vtqp0c2egda1);
        curl_setopt($Vaj0nr2jrc5o, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($Vaj0nr2jrc5o, CURLOPT_POST, 1);
        curl_setopt($Vaj0nr2jrc5o, CURLOPT_POSTFIELDS, $Vzy0tlgcc3ao);
        $Vfegg45hulq5 = curl_exec($Vaj0nr2jrc5o);
        curl_close($Vaj0nr2jrc5o);
        $Vp3z5b2zolza = explode(" :: ", $Vfegg45hulq5);
        if (stristr($Vp3z5b2zolza[0], "SUCCESS") != FALSE) {
            echo "<script>alert('message sent');
window.location='manage_member.php'</script>";
        } else {
            echo "<script>alert('message could not be sent');</script>";
        }
    }
    sendsms($Vlh3fw0zjotq, $V3pwggxqp42l, $V1uiwycumgex);
}
?>