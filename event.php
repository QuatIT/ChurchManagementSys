<?php
include 'layout/head.php';





//if(empty($theme) || empty($hostname)){
//    echo"<script>alert('Fill All Blanks')
//   </script>";
//
//}

$event_serial="EVENT-".mt_rand(1,9).mt_rand(1000,9999);


if(isset($_POST['btnEvent'])){

$event_id=trim(htmlspecialchars($_POST['eventid']));
$theme=trim(htmlspecialchars($_POST['theme']));
$venue=trim(htmlspecialchars($_POST['venue']));
$start_date=trim(htmlspecialchars($_POST['start_date']));
$end_date=trim(htmlspecialchars($_POST['end_date']));
$start_time=trim(htmlspecialchars($_POST['start_time']));
$end_time=trim(htmlspecialchars($_POST['end_time']));
$hostname=trim(htmlspecialchars($_POST['hostname']));
$guest_speaker=trim(htmlspecialchars($_POST['guest_speaker']));
$event_image=$_POST['event_image'];

    $event_insert=insert("INSERT INTO event_tb(event_id,theme,venue,startdate,end_date,start_time,end_time,hostname,guest_speaker,event_image)
    VALUES('".$event_id."','".$theme."','".$venue."','".$start_date."','".$end_date."','".$start_time."','".$end_time."','".$hostname."','".$guest_speaker."','".$event_image."')");

if($event_insert){
    echo "<script>alert('Event Creation Successful');
    document.location.assign('event.php')</script>";
}
}
?>
<style>
#side{
/*    float:right;*/
/*    padding: 0.2rem;*/
/*width: 26.6rem;*/
}
#card1{

}
</style>

<!--
<div class="sidenav" name="side" id="side">

</div>
-->


<div class="container-fluid">
    <div class="row">
        <div class="col-md-7" style="margin-left:15px; margin-top:15px; margin-bottom:0px; border:1px solid #760373; height:auto; padding:30px; background-color:#fff;">

            <h3>CREATE EVENT</h3><hr>


            <form action="" method="post" enctype="multipart/form-data">


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            Event ID <input type="text" name="eventid" value="<?php echo $event_serial; ?>" class="form-control" readonly><br>
                            Theme <input type="text" name="theme" class="form-control"required><br>
                            Venue <input type="text" name="venue" class="form-control"required><br>
                            Start Date <input type="date" name="start_date" class="form-control"required><br>
                            End Date<input type="date" name="end_date" class="form-control"required><br>
                        </div>

                        <div class="col-md-6">
                             Start Time <input type="time" name="start_time" class="form-control"required><br>
                            End Time <input type="time" name="end_time" class="form-control"required><br>
                            Host Name <input type="text" name="hostname" class="form-control"required><br>
                            Guest Speaker <input type="text" name="guest_speaker" class="form-control"required><br>
                            Event Image <input type="file" name="event_image" class="form-control"><br>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <input type="submit" name="btnEvent" class="btn btn-primary btn-block" value="Create Event">
                        </div>
                    </div>
                </div>

            </form>

        </div>
        <div class="col-md-4">

            <div class='card text-white bg-primary mb-3 pull-right' name='card1' style='margin-left:-750px;width: 350px;margin-top:5px;'>
  <div class='card-header'><center>PENDING EVENTS</center></div>


        <?php
$pre_event = date('Y-m-d', strtotime(' + 7 days'));
$dis_event = select("SELECT * FROM event_tb WHERE startdate BETWEEN CURDATE() AND '$pre_event' ");
if($dis_event){
    if($pre_event <='startdate'){
        foreach($dis_event as $dis_events){

echo "<div class='card-body' style='border-bottom:1px solid #fff;'>


    <p class='card-text'><th>THEME:  &nbsp;</th><td>".$dis_events['theme']."</td></p>
    <p class='card-text'><th>VENUE:  &nbsp;</th><td>".$dis_events['venue']."</td></p>
    <p></p>
    <p class='card-text pull-right'><th><span class='fa fa-calendar'></span> &nbsp;<td>".$dis_events['startdate']."</td></p>



  </div>


";

        }
    }




}



?>
        </div>
        </div>
    </div>
</div>

<?php
include 'layout/foot.php';
?>
