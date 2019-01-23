<?php
error_reporting(0);
include 'layout/head.php';
//include 'assets/core/sms_api.php';

$member_id = $_GET['member_id'];
$sql=select("SELECT * FROM membership_tb WHERE member_id='$member_id'");
foreach($sql as $row){
  $tel = $row['phone_number'];
}

if(isset($_POST['btnSms'])){


//SMS to members
function sendsms($body,$subject,$tel){
$username = 'richardkanfrah';
$password = 'godwin1.';
// $subject = 'The Church Rohi';
@$subject = $_POST['subject'];
@$body = $_POST['body'];
$message= $subject.PHP_EOL.$body;

$from = "Rohi Church";//your senderid example "kwamena"max is 11 chars;
$baseurl = "http://isms.wigalsolutions.com/ismsweb/sendmsg/";

//All numbers must have a country code. delimit them with comma(,)

$params = "username=".$username."&password=".$password."&from=".$from."&to=".$tel."&message=".$message ;

//send the message
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$baseurl);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
$return = curl_exec($ch);
curl_close($ch);

$send = explode(" :: ",$return);
if(stristr($send[0],"SUCCESS") != FALSE){
echo "<script>alert('message sent');
window.location='manage_member.php'</script>";

}else{
echo "<script>alert('message could not be sent');</script>";


}
}
sendsms($body,$subject,$tel);
}


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:auto;padding:30px;background-color:#fff;">

            <h3>SEND MEMBER SMS</h3><hr>

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#home">Personal Information</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <form action="" method="post">
<!--                    <div class="tab-pane fade active show" id="home">-->
                    <!--      <div class="container-fluid">-->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input type="text" name="firstname" value="<?php echo $row['first_name']; ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Other Name</label>
                                <input type="text" name="othername" value="<?php echo $row['other_name']; ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input type="text" name="lastname" value="<?php echo $row['last_name']; ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" size="50" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label> Message</label>
                                <textarea class="form-control" rows="4" name="body" id="body" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 form-group">
                                <input type="submit" class="btn btn-primary btn-block" name="btnSms"   value="SEND SMS">
                            </div>
                        </div>
<!--                    </div>  -->
                </form>
            </div>
        <div class="col-md-4"></div>
    </div>
</div>

<script>
// function validator(){
//   if(document.getElementById('subject').value ==""){
//  alert("Empty Messages Not Allowed");
// window.location.href('sms_member_detail.php');

//   }
// if(document.getElementById('bdy').value==""){
//   alert("Empty Messages Not Allowed");
// window.location('sms_member_detail.php');

// }


// }

</script>

<?php
include 'layout/foot.php';
?>
