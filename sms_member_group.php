<?php
include 'layout/head.php';



// $subject = $_POST['subject'];
// $bdy = $_POST['bdy'];
//   $to =  $row['phone_number'];

// if(empty($subject)){
//   echo "<script>alert('Fill Blank Spaces');
//   documnent.location.href('sms_member_detail.php')</script>";
// }
// if(empty($bdy)){
//   echo "<script>alert('Fill Blank Spaces');
//   documnent.location.href('sms_member_detail.php')</script>";
// }



@$member_id = $_GET['member_id'];

$mem_group= select("SELECT * FROM membership_tb WHERE member_id = '$member_id' ");
foreach($mem_group as $mem_groups){}


  if(isset($_POST['btnSms'])){


      $subject = $_POST['subject'];
      $bdy = $_POST['bdy'];
        $to =  $mem_groups['phone_number'];

              sendsms($bdy,$subject,$to);

  }

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">

            <h3>SEND MEMBER SMS</h3>

  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active show" data-toggle="tab" href="#home">Personal Information</a>
  </li>
</ul>

<div id="myTabContent" class="tab-content">
    <form action="" method="post">
  <div class="tab-pane fade active show" id="home">
      <div class="container-fluid">
        <div class="row" style="padding-top:1%;">

   <div class="col-md-4" style="z-index:1">
        First Name <input type="text" name="firstname" value="<?php echo $mem_groups['first_name']; ?>" class="form-control" readonly>
      </div>
   <div class="col-md-4" style="z-index:1">
        Other Name <input type="text" name="othername" value="<?php echo $mem_groups['other_name']; ?>" class="form-control" readonly>
      </div>
   <div class="col-md-4" style="z-index:1">
        Last Name <input type="text" name="lastname" value="<?php echo $mem_groups['last_name']; ?>" class="form-control" readonly>
      </div></div>
      <br><br>
      <div class="container" style='text-align:center'; >
      <input type="text" name="subject" id="subject" size="50" required><br><br>
<p><textarea cols="90" rows="6" name="bdy" id="bdy" required >


</textarea></p>


<br>

   <!--<div class="col-md-4 move"   >-->
    <input type="submit" class="btn btn-primary" name="btn_Sms"   value="SEND SMS">
      </div>


  </div>

            </form>
</div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<script>
function validator(){
  if(document.getElementById('subject').value ==""){
 alert("Empty Messages Not Allowed");
window.location.href('sms_member_group.php');

if(document.getElementById('bdy').value==""){
  alert("Empty Messages Not Allowed");
window.location.href('sms_member_group.php');

}


  }
}

</script>

<?php
include 'layout/foot.php';
?>
