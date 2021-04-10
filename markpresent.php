<?php
include 'assets/core/connection.php';
$mid = $_GET['mid'];
$grp_id = $_GET['gid'];
$page = $_GET['page'];

$attendance= select("SELECT * FROM membership_tb WHERE member_id='$mid' ");
foreach($attendance as $attendances){
       $img     = $attendances['member_image'];
       $mem_id   = $attendances['member_id'];
       $gp_name  = $attendances['group_name'];
       $fll_name = $attendances['full_name'];
       $gender   = $attendances['gender'];
       $p_num    = $attendances['phone_number'];
}

if(!empty($grp_id)){
    $gp_name = $grp_id;
}

//$minn = select("SELECT * FROM ministry_tb WHERE group_id='$gp_name' ");
$minn = select("CALL stproc_Ministry_Group_Select('$gp_name',1) ");
    foreach($minn as $minnrow){
        @$minnamee = $minnrow['group_name'];
    }

  if(!empty($minnamee)){

    $flag1 =1;

    $m_attendance = insert("INSERT INTO mem_attendance(member_id,ministry_id,ministry_name,full_name,gender,phone,status,date_reg,flag1) VALUES('".$attendances['member_id']."','$gp_name','".@$minnamee."','".$fll_name."','".$gender."','".$p_num."','present',CURDATE(),'$flag1');)");

    if($m_attendance){
        $s = "presentsuccess";
        if(!empty($page)){
            echo "<script>window.location.href='{$page}?pra=$s'</script>"; 
        }else{
            echo "<script>window.location.href='attendance?pra=$s'</script>"; 
        }
       
    }else{
        $s = "presentfailed";
        if(!empty($page)){
            echo "<script>window.location.href='{$page}?pra=$s'</script>";  
        }else{
            echo "<script>window.location.href='attendance?pra=$s'</script>";  
        }
        
    }

  }else{
    $s = "presentfailed";
    echo "<script>window.location.href='attendance?pra=$s'</script>";  
  }


?>