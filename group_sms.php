<?php
//error_reporting(0);
include 'layout/head.php';
include 'assets/core/sms_api.php';


$group_id = $_GET['g_id'];

@$g_name= $_POST['grp_name'];



 $edition= select("SELECT * FROM g_ministry_tb WHERE g_id = '$group_id'");
   foreach($edition as $editions){}

if(isset($_POST['Sms_Send'])){

    $bdy = trim(htmlspecialchars($_POST['bdy']));
    $subject = trim(htmlspecialchars($_POST['subject']));

    $mem_sql = select("SELECT * FROM membership_tb WHERE group_name='$g_name' ");
    foreach($mem_sql as $mtel){
    $to= $mtel['phone_number'];

        sendsms($bdy,$subject,$to);
    }

}
  //@$tel = trim(htmlspecialchars($_POST['tel']));
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:auto;padding:30px;background-color:#fff;">

            <h3>SEND GROUP SMS</h3><hr>

<!--              <center>-->
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#home">Group Information</a>
                  </li>
                </ul>

            <div id="myTabContent" class="tab-content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="tab-pane fade active show" id="home">
<!--                        <div class="container-fluid">-->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="Group ID">Group ID </label>
                                <input type="text" name="grp_id" value="<?php echo $editions['g_id']; ?>" class="form-control" readonly>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="Group Name">Group Name </label>
                                <input type="text" name="grp_name" value="<?php echo $editions['g_name']; ?>" class="form-control" readonly>
                            </div>
                            <!--                </center>-->
                            <div class="col-md-6 form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" size="50" placeholder="Subject" required>
                            </div>

                            <div class="col-md-6 form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" cols="90" rows="4" name="bdy" id="bdy" required ></textarea>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6 form-group">
                                <input type="submit" class="btn btn-primary btn-block" name="Sms_Send"  value="SEND SMS">
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
