<?php
include 'layout/head.php';

if(isset($_POST['present'])){
$meme_id = trim(htmlspecialchars($_POST['meme_id']));
            $mini_name = $_POST['mini_name'];
            $f_name = trim(htmlspecialchars($_POST['f_name']));
            $g_end = trim(htmlspecialchars($_POST['g_end']));
            $p_num = trim(htmlspecialchars($_POST['p_num']));
            $sel_grp = trim(htmlspecialchars($_POST['sel_grp']));
            // $mark = $_POST['mark'];
            $flag = 1;
 $mrk_attendance = insert("INSERT INTO min_grp_attend(member_id,group_id,group_name,full_name,gender,status,date_reg,flag1,phone) VALUES('$meme_id','".$sel_grp."','$mini_name','$f_name','$g_end','present',CURDATE(),'$flag','$p_num')");

}


if(isset($_POST['absent'])){
$meme_id = trim(htmlspecialchars($_POST['meme_id']));
            $mini_name = $_POST['mini_name'];
            $f_name = trim(htmlspecialchars($_POST['f_name']));
            $g_end = trim(htmlspecialchars($_POST['g_end']));
            $p_num = trim(htmlspecialchars($_POST['p_num']));
            $sel_grp = trim(htmlspecialchars($_POST['sel_grp']));
            // $mark = $_POST['mark'];
            $flag = 1;
 $mrk_attendance = insert("INSERT INTO min_grp_attend(member_id,group_id,group_name,full_name,gender,status,date_reg,flag1,phone) VALUES('$meme_id','".$sel_grp."','$mini_name','$f_name','$g_end','absent',CURDATE(),'$flag','$p_num')");
}

?>
