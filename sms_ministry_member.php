<?php
//error_reporting(0);
include 'layout/head.php';
include 'assets/core/sms_api.php';

$_GET['member_id'];
$name = select("SELECT * FROM membership_tb WHERE member_id='".$_GET['member_id']."'");
foreach($name as $names){}


 // $edition= select("SELECT * FROM ministry_tb WHERE group_id = '$group_id'");
 //   foreach($edition as $editions){}

  if(isset($_POST['Sms_Min'])){

      $subject = $_POST['subject'];
     $bdy = $_POST['bdy'];
$mem_sql = select("SELECT * FROM membership_tb WHERE member_id='".$_GET['member_id']."' ");
foreach($mem_sql as $mtel){
$tel= $mtel['phone_number'];


             sendsms($bdy,$subject,$tel);
}

  }

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px; margin-top:15px; margin-bottom:0px; border:2px solid #760373; height:auto; padding:30px; background-color:#fff;">

            <h3>SEND MINISTRY MEMBER SMS</h3><hr>

            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#home">Member Information</a>
              </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <form action="" method="post">
                    <div class="tab-pane fade active show" id="home">
                        <div class="row">

                        <div class="col-md-6 form-group">
                            <label>Member ID</label>
                            <input type="text" name="ministry_id" value="<?php echo $_GET['member_id']; ?>" class="form-control" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Member Name</label>
                            <input type="text" name="ministry_name" value="<?php echo $names['full_name']; ?>" class="form-control" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Message</label>
                            <textarea class="form-control" rows="4" name="bdy" id="bdy" required></textarea>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6 form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="Sms_Min"  value="SEND SMS">
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        <div class="col-md-4"></div>
    </div>
</div>

<!--<script>
function validator(){
  if(document.getElementById('subject').value ==""){
 alert("Empty Messages Not Allowed");
window.location.href('sms_ministry.php');

if(document.getElementById('bdy').value==""){
  alert("Empty Messages Not Allowed");
window.location.href('sms_ministry.php');

}


  }
}

</script>-->

<?php
include 'layout/foot.php';
?>
