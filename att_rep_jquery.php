<?php
include 'layout/head.php';

if(isset($_POST['done'])){

$mem = filter_input(INPUT_POST,'mem',FILTER_SANITIZE_STRING);
$gp = filter_input(INPUT_POST,'gp',FILTER_SANITIZE_STRING);
$fn = filter_input(INPUT_POST,'fn',FILTER_SANITIZE_STRING);
$gen = filter_input(INPUT_POST,'gen',FILTER_SANITIZE_STRING);
$po = filter_input(INPUT_POST,'po',FILTER_SANITIZE_STRING);
$pres = filter_input(INPUT_POST,'pres',FILTER_SANITIZE_STRING);


  $present=insert("INSERT INTO mem_attendance(member_id,ministry_id,ministry_name,full_name,gender,phone,status)VALUES('{$mem}','{$gp}','{$gp}','{$fn}','{$gen}','{$po}','{$pres}')");


}

?>
