<?php
include 'layout/head.php';



$member_id = $_GET['member_id'];

$edit_member= select("SELECT * FROM membership_tb WHERE member_id = '$member_id' ");
foreach($edit_member as $row){


// $welf = filter_input(INPUT_POST,'welf',FILTER_SANITIZE_STRING);


$groupName=select("SELECT * FROM ministry_tb WHERE group_id='".$row['group_name']."'");
foreach($groupName as $groupNames){}

  // PLEDGE
     $pledge_call = select("SELECT * FROM pledge_tb WHERE member_name = '".$row['full_name']."' ");
}
   //FETCH SUM OF WELFARE

  // $fet_welf = select("SELECT sum(welfare_amount) as wel_fare FROM welfare_tb WHERE member_id='".$_GET['member_id']."' ");


//tithe table
   $t_info = select("SELECT * FROM tithe WHERE member_id = '$member_id'");
//mem_attendance table
   $att_info = select("SELECT * FROM mem_attendance WHERE member_id='$member_id'");

   //group/ministry attendance table
   $gm_info = select("SELECT * FROM min_grp_attend WHERE member_id ='$member_id'");

$percentile=100;
//Progress Report
   if(isset($_POST['mark_at'])){
   // $weeks=52;
    $percentile=100;
    $start = filter_input(INPUT_POST,'start',FILTER_SANITIZE_STRING);
    $to = filter_input(INPUT_POST,'to',FILTER_SANITIZE_STRING);

//     $start = strtotime($_POST['start']);
// $to = strtotime($_POST['to']);
$s = strtotime($start);
$end = strtotime($to);

$start_date = date('m',$s);
$to_date = date('m',$end);

$get_count = select("SELECT COUNT(member_id) as tit_count FROM tithe  WHERE member_id='".$_GET['member_id']."' && tithe_date BETWEEN '$start_date' AND '$to_date'");
foreach($get_count as $get_counts){$get_counts['tit_count'];}


// $diff = ($to_date - $start_date );
// echo $diff."--".$get_counts['tit_count'];

// $diff_point = ($get_counts['tit_count']/$diff) ;
// $diff_score = $diff_point * 100;



// $diff_score = $diff * 0.4;

// echo $diff_point;
   //tithe progress report
   $cal_tithe = select("SELECT COUNT(*) as tit FROM tithe WHERE member_id = '$member_id' && tithe_date BETWEEN '".$start."' AND '".$to."'");

    foreach($cal_tithe as $cal_tithes){$paid_tithe= $cal_tithes['tit'];}


$diff = ($to_date - $start_date );
// echo $diff."--".$cal_tithes['tit'];

$diff_point = ($cal_tithes['tit']/$diff) * (0.4);
$diff_score = $diff_point * 100;
// echo $diff_point;
  // $paid_tithe;
  // $score_tithe = ($percentile/$paid_tithe)/4;

// echo "<script>alert('$diff_score')</script>";
     // echo "<script>alert( {$cal_tithes['tit']})</script>";

//group attendance progress report
  $cal_group = select("SELECT COUNT(*) as grp_stat FROM min_grp_attend WHERE status='present' && member_id = '$member_id' && date_reg BETWEEN '".$start."' AND '".$to."'");
  if(is_array($cal_group)){
    foreach($cal_group as $cal_groups){$group_attend= $cal_groups['grp_stat'];}}
// $score_group = ($percentile/4)*$group_attend;
// $group_attend;

//servive attendance progress report
$cal_attend = select("SELECT COUNT(*) as att FROM mem_attendance  WHERE status = 'present' && member_id='$member_id'  && date_reg BETWEEN '".$start."' AND '".$to."'");
if(is_array($cal_attend)){
  foreach($cal_attend as $cal_attends){$m_attend= $cal_attends['att'];}
}
// $m_attend;
// $score_attendance = ($percentile/4)*$m_attend;

}
// echo "<script>alert('{$member_id}')</script>";


?>

<div class="container-fluid">
<div class="row">

<div class="col-md-3">
   <table class="table table-borderless">
            <thead class="thead-dark">
  <tr>
    <th>TITHE DATE</th>
    <th>AMOUNT</th>
    </tr>
  </thead>

  <tbody>
  <?php foreach($t_info as $t_infox){ ?>
  <tr>
       <td><?php echo $t_infox['tithe_date']; ?></td>


  <td><?php echo $t_infox['tithe_amount']; ?></td>
  </tr>
</tbody>
<?php } ?>
</table>
</div>

<div class="col-md-2">
  <table class="table table-borderless">
            <thead class="thead-dark">
  <tr>
    <th>SERVICE DATE</th>
    <th>ATTENDANCE</th>
  </tr>
  <?php foreach($att_info as $att_infox){?>
  <tr>
       <td><?php echo $att_infox['date_reg']; ?></td>

  <td><?php echo $att_infox['status']; ?></td>
  </tr>
      <?php } ?>
</table>
</div>

<div class="col-md-3">
  <table class="table table-borderless">
            <thead class="thead-dark">
  <tr>
    <th>GROUP/MINISTRY</th>
    <th>DATE</th>
    <th>ATTENDANCE</th>
  </tr>
  <tr>

   <?php  foreach($gm_info as $gm_infox){?> ?>
<tr>
  <td><?php echo $gm_infox['group_name'];?></td>

        <td><?php echo $gm_infox['date_reg'];?></td>

        <td><?php echo $gm_infox['status'];?></td>
  </tr>
 <?php } ?>
</table>
</div>

<div class="col-md-4">
  <form action="" method="post" enctype="multipart/form-data">
  <div class="col-md-12" ><br>
   <label style="font-weight:bolder;">Start</label><input type="date" name="start" value="<?php echo @$_POST['start']; ?>" style="background-color:#f1f1f1;margin-bottom:10px;">&nbsp;&nbsp;<label style="font-weight:bolder;">To</label><input type="date" name="to"  value="<?php echo @$_POST['to']; ?>" style="background-color:#f1f1f1;" ><br><br><input type="submit" name="mark_at" class="btn btn-primary btn-block" value="CLICK TO SEARCH" style="margin-top:-8px;"><br>

<table class="table table-borderless">
            <thead class="thead-dark">
  <tr>
    <th>PROGRESS REPORT</th>
    <th>SCORE</th>
    <th>SCORE %</th>
  </tr>
</thead>

  <tr>
       <td>TITHE</td><td><?php  echo @$paid_tithe; ?></td><td><?php echo @$diff_score.'%'; ?></td>
     </tr>
     <tr>
       <td>SERVICE ATTENDANCE</td><td><?php echo @$cal_attends['att'];?></td><td><?php echo (@$m_attend/4)*$percentile.'%';?></td>
     </tr>
     <tr>
       <td>GROUP ATTENDANCE</td><td><?php echo @$group_attend;?></td><td><?php echo (@$group_attend/4)*$percentile.'%';?></td>
     </tr>
</table>

</div>

</div>
</div>


<!-- </div>


  </div>
      -->

 <div class="container" style="margin-right:80px;margin-top:-500px;">


</div>
</div>
</div>


            </form>
</div>

        <!-- </div> -->

        <div class="col-md-4"></div>

    </div>

</div>
<br><br>
<!-- <div class="col-md-8">
  <form action="" method="POST">
<button type="submit" name="" class="btn btn-primary" style="margin-left:420px;width:200px;" onclick="window.print()"><i class="fa fa-print">&nbsp; PRINT</i></button>
</form>
</div> -->
<?php

include 'layout/foot.php';
?>
