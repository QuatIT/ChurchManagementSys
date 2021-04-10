<?php
$dropactive = "events";
$active = "manevents";
include 'layout/headside.php';

$eventID = "Evt-".mt_rand(1,9).mt_rand(1000,9999);

if(isset($_POST['btnEvent'])){
    $event_id = trim(htmlspecialchars($_POST['eventid']));
    $theme = trim(htmlspecialchars($_POST['theme']));
    $venue = trim(htmlspecialchars($_POST['venue']));
    $start_date = trim(htmlspecialchars($_POST['start_date']));
    $end_date = trim(htmlspecialchars($_POST['end_date']));
    $start_time = trim(htmlspecialchars($_POST['start_time']));
    $end_time = trim(htmlspecialchars($_POST['end_time']));
    $hostname = trim(htmlspecialchars($_POST['hostname']));
    $guest_speaker = trim(htmlspecialchars($_POST['guest_speaker']));
//    $event_image = $_POST['event_image'];

    $event_insert=insert("INSERT INTO event_tb(branch_id,event_id,theme,venue,startdate,end_date,start_time,end_time,hostname,guest_speaker) VALUES('$churchID','".$event_id."','".$theme."','".$venue."','".$start_date."','".$end_date."','".$start_time."','".$end_time."','".$hostname."','".$guest_speaker."')");

    if($event_insert){
            $s = "success";
            echo "<script>window.location.href='events?a=$s';</script>";
//        echo "<script>alert('Event Creation Successful');document.location.assign('event.php')</script>";
    }
}

//if(@$_GET['m']);
if(@$_GET['a'] == 'success'){
    echo "<script type='text/javascript'>toastr.success('Event Created','SUCCESS',{timeOut: 7000})</script>";
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top:45px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">MANAGE EVENTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Events</a></li>
              <li class="breadcrumb-item active">Manage Events</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <div class="row">
            <div class="col-md-5">
<!--                <div class="card">-->
<!--
                     <div class="card-header">
                        <h3 class="card-title">CREATED ACCOUNT LIST</h3>
                      </div>
-->
                    <div class="card card-default">
                    <form class="form" action="" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group" style="display:none;">
                                    <input type="text" value="<?php echo $eventID;?>" class="form-control"  name="eventid" required readonly />
                                </div>

                                <div class="form-group">
                                     <input type="text" placeholder="Theme" class="form-control" name="theme" required />
                                </div>

                                <div class="form-group">
                                    <label> Start Date <i class="text-danger">*</i> </label>
                                     <input type="date" placeholder="Start Date" class="form-control" name="start_date" required />
                                </div>

                                <div class="form-group">
                                    <label> Start Time <i class="text-danger">*</i> </label>
                                     <input type="time" placeholder="Start Time" class="form-control" name="start_time" required />
                                </div>


                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Host Name" name="hostname" required/>
                                </div>

<!--
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image" placeholder="Event Image" required />
                                </div>
-->
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                     <input type="text" placeholder="Venue" class="form-control" name="venue" required />
                                </div>

                                <div class="form-group">
                                    <label> End Date <i class="text-danger">*</i> </label>
                                     <input type="date" placeholder="End Date" class="form-control" name="end_date" required />
                                </div>


                                <div class="form-group">
                                    <label> End Time <i class="text-danger">*</i> </label>
                                     <input type="time" placeholder="End Time" class="form-control" name="end_time" required />
                                </div>


                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Guest Speaker" name="guest_speaker" required/>
                                </div>


                                <div class="form-group">
                                    <input type="submit" name="btnEvent" onclick="return confirm('CREATE EVENT ?');" value="CREATE EVENT" class="btn btn-primary btn-block btn-md" />  
                                </div>
                            </div>
                        </div>
                      </div>
                        </form>
                    </div>
<!--                </div>-->
            </div>  
            
            
            <div class="col-md-7">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>ID</th>
                        <th>THEME</th>
                        <th>START DATE</th>
                        <th class="text-center">ACTION</th>
                      </tr>
                  </thead>
                  <tbody>
                <?php
                 $getministry = select("SELECT * FROM event_tb WHERE branch_id='$churchID'");
                      if($getministry){
                    foreach($getministry as $mingotten){
                ?>
                  <tr>
                    <td> <?php echo $mingotten['event_id'];?> </td>
                    <td> <?php echo $mingotten['theme'];?> </td>
                    <td> <?php echo $mingotten['startdate'];?> </td>
                    <td class="text-center"> 
<!--
                        <a href="update-user?iid=<?php // echo encode5t($mingotten['id']);?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
-->
                        <a  href="flag-user?uid=<?php echo encode5t($mingotten['id']);?>" onclick="return confirm('FLAG USER ?');" class="btn btn-danger btn-sm">
                            <i class="fa fa-flag"></i> Flag
                        </a>  
                    </td>
                  </tr>
                      <?php }}?>
                  </tbody>
                </table>
              </div>
            </div>
            </div>  
        </div>
      </div>
    </section>
  </div>
<?php
include 'layout/footer.php';    
?>