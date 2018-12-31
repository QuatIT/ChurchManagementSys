<?php
include 'layout/head.php';



$member_id = $_GET['member_id'];

$edit_member= select("SELECT * FROM membership_tb WHERE member_id = '$member_id' ");
foreach($edit_member as $row){}

$welf = filter_input(INPUT_POST,'welf',FILTER_SANITIZE_STRING);
  // if(isset($_POST['btnSubmit'])){


//     $last_name= trim(htmlspecialchars($_POST['lastname']));
//     $first_name= trim(htmlspecialchars($_POST['firstname']));
//     $other_name= trim(htmlspecialchars($_POST['othername']));
//     $dob= trim(htmlspecialchars($_POST['dob']));
//     $gender= trim(htmlspecialchars($_POST['gender']));
//     $residential_address= trim(htmlspecialchars($_POST['residential_address']));
//     $postal_address= trim(htmlspecialchars($_POST['postal_address']));
//     $home_town= trim(htmlspecialchars($_POST['home_town']));
//     $phone_number = trim(htmlspecialchars($_POST['phone_number']));

//     $nationality= trim(htmlspecialchars($_POST['nationality']));
//     $place_of_birth= trim(htmlspecialchars($_POST['place_of_birth']));
//     $occupation= trim(htmlspecialchars($_POST['occupation']));
//     $marital_status= trim(htmlspecialchars($_POST['marital_status']));
//     $email = trim(htmlspecialchars($_POST['email']));
//     $mem_id = trim(htmlspecialchars($_POST['membe_id']));




//     $group_name = trim(htmlspecialchars($_POST['group_name']));
//     $baptism_status = trim(htmlspecialchars($_POST['baptism_status']));
//     $confirmation_status = trim(htmlspecialchars($_POST['confirmation_status']));
//     $membership_type= trim(htmlspecialchars($_POST['membership_type']));
//     $parent_Name= trim(htmlspecialchars($_POST['parent_name']));
//     $parent_status= trim(htmlspecialchars($_POST['parental_status']));
//     $position = trim(htmlspecialchars($_POST['position']));
// //    $member_image = trim(htmlspecialchars($_POST['image']));



     //image upload
        // $fileName =trim($_FILES['image']['tmp_name']);
        // $image = explode(".",trim($_FILES['image']['name']));
        // $member_image = round(microtime(true)) . '.' . end($image);
        // //$new_image = $_POST['con_name'] . '.' . end($image);
        // move_uploaded_file($fileName, "upload/image/{$member_image}");

$groupName=select("SELECT * FROM ministry_tb WHERE group_id='".$row['group_name']."'");
foreach($groupName as $groupNames){}

  // PLEDGE
     $pledge_call = select("SELECT * FROM pledge_tb WHERE member_name = '".$row['full_name']."' ");

   //FETCH SUM OF WELFARE

  // $fet_welf = select("SELECT sum(welfare_amount) as wel_fare FROM welfare_tb WHERE member_id='".$_GET['member_id']."' ");





    //  if(isset($_POST['member_report'])){
    //   echo "<script>window.location.href('member_report.php)</script>";
    // }

    //  if(isset($_POST['member_attendance'])){
    //   echo "<script>window.location.assign('member_attendance.php?member_id=".$_GET['member_id']."'')</script>";
    // }

   if(isset($_POST['f_details'])){
    echo "<script>window.location.assign('m_further_detail?member_id=$member_id')</script>";
   }

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">

            <h3>CHURCH MEMBER DETAIL</h3>

  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active show" data-toggle="tab" href="#home">Member Information </a>
<div>
  <form action="" method="POST">
    <input type="submit" name="f_details" id="f_details" class="btn btn-primary" style="margin-left:850px;" value="MEMBER DETAILS">
  </form>
</div>
  </li>

</ul>

<div id="myTabContent" class="tab-content" style="overflow:auto;height:370px;">
    <form action="" method="post" enctype="multipart/form-data">
  <div class="tab-pane fade active show" id="home">
      <div class="container-fluid">
        <div class="col-md-12 form-group" style="padding-top:1%;">
          <table class="table table-bordered">
  <tr>
       <td style="width:240px;"><label style="font-weight:bolder;">Name:</label>&nbsp;<?php echo $row['full_name']; ?></td>
       <td style="width:240px;font-size:14px;"><label style="font-weight:bolder;">Date of Birth:</label>&nbsp;<?php echo $row['dob']; ?></td>
       <td style="width:240px;font-size:14px;"><label style="font-weight:bolder;">Place of Birth:</label>&nbsp;<?php echo $row['place_of_birth']; ?></td>
       <td style="width:240px;font-size:14px;"><label style="font-weight:bolder;">Gender</label>&nbsp;<?php echo $row['gender']; ?></td>
       <td style="width:240px;font-size:14px;"><label style="font-weight:bolder;">Nationality</label>&nbsp;<?php echo $row['nationality']; ?></td>
     </tr>

<tr>
  </td>
     <td><label style="font-weight:bolder;">Address: </label>&nbsp;<?php echo $row['residential_address']; ?></td>

    <td><label style="font-weight:bolder;">Post Box:</label>&nbsp;<?php echo $row['postal_address']; ?></td>
    <td><label style="font-weight:bolder;">Occupation:</label>&nbsp;<?php echo $row['occupation']; ?></td>
     <td><label style="font-weight:bolder;"> Marital Status:</label>&nbsp;<?php echo $row['marital_status']; ?></td>
     <td><label style="font-weight:bolder;">Email:</label>&nbsp; <?php echo $row['email']; ?></td>
  </tr>
      <tr>
        <td><label style="font-weight:bolder;">Phone Number:</label>&nbsp; <?php echo $row['phone_number']; ?></td>

<td><label style="font-weight:bolder;"> Position:</label>&nbsp; <?php echo $row['position']; ?></td>
<td><label style="font-weight:bolder;">Baptism Status:</label>&nbsp; <?php echo $row['baptism_status']; ?></td>
<td><label style="font-weight:bolder;">Confirmation:</label>&nbsp; <?php echo $row['confirmation_status'];?></td>
<td><label style="font-weight:bolder;">Parent:</label>&nbsp; <?php echo $row['parental_name'];?></td>
  </tr>
  <tr>
    <td><label style="font-weight:bolder;">Membership:</label>&nbsp;<?php echo $row['membership_type']; ?></td>
    <td><label style="font-weight:bolder;">Ministry:</label>&nbsp; <?php echo $groupNames['group_name']; ?></td>
    <td><label style="font-weight:bolder;">Member ID:</label>&nbsp; <?php echo $row['member_id'];?></td>
   <td><label style="font-weight:bolder;">Parent:</label>&nbsp;<?php echo $row['parental_name'];?></td>
   <td><label style="font-weight:bolder;">Marital:</label>&nbsp;<?php echo $row['marital_status'];?></td>
  </tr>
</table>
</div>
</div>

<table class="table table-borderless">
  <div class="col-md-12"  style="margin-bottom:-35px;">
<tr>
    <td><!-- <label style="margin-top:3px; font-weight:bolder; font-size:20px; margin-left:20px;">WELFARE TOTAL AS AT <?php $as_at = date("m/d/Y"); echo $as_at; ?></label> --></td>
    <td><!-- <input type="number" name="welf" class="form-control" value="<?php foreach($fet_welf as $fet_welfs){ echo ($fet_welfs['wel_fare']);}?>"readonly>  -->
 </tr>
</table>

</div>
<div class="container">
<table class="table table-borderless" style="margin-top:-25px;" >
  <thead class="thead-dark">
    <tr><br>
    <th>NAME</th>
    <th>EVENT</th>
    <th>AMOUNT</th>
    <th>STATUS</th>
    <th>PLEDGE DATE</th>
    <th>PAID DATE</th>
  </tr>
  </thead>
  <tbody>
    <?php  if(is_array($pledge_call)){
     foreach($pledge_call as $pledge_calls){?>
    <tr>
      <td><?php echo $pledge_calls['member_name']; ?></td>
      <td><?php echo $pledge_calls['event_name']; ?></td>
      <td><?php echo $pledge_calls['amount']; ?></td>
      <td><?php echo $pledge_calls['pledge_status']; ?></td>
      <td><?php echo $pledge_calls['doe']; ?></td>
      <td><?php echo $pledge_calls['payment_date']; ?></td>
    </tr>
  <?php }}?>
  </tbody>




  </table>

  </div>




            </form>
</div>

        </div>

        <div class="col-md-4"></div>

    </div>

</div>
<br><br>
<div class="col-md-8">
  <form action="" method="POST">
<button type="submit" name="" class="btn btn-primary" style="margin-left:420px;width:200px;" onclick="window.print()"><i class="fa fa-print">&nbsp; PRINT</i></button>
</form>
</div>
<?php

include 'layout/foot.php';
?>
