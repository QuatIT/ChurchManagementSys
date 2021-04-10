<?php
$dropactive = "attendance";
$active = "headcount";
include 'layout/headside.php';

//get attendance id
@$atid = $_GET['atid'];

if(!empty($atid)){
  $getAttendance = select("SELECT * FROM attendance_tb WHERE id = '$atid' ");
  foreach($getAttendance as $attendance){}

  $saveButtonLabel = "UPDATE";
}else{
  $saveButtonLabel = "SAVE";
}


if(isset($_POST['submit'])){

  if(empty($atid)){
    $attendance_id = "ATT-".mt_rand(1,9).mt_rand(1000,9999).mt_rand(100,999);
  }else{
    $attendance_id = $atid;
  }
    
    $ministry_id = trim(htmlspecialchars($_POST['service_id']));
    $men = trim(htmlspecialchars($_POST['men']));
    $women = trim(htmlspecialchars($_POST['women']));
    $youth = trim(htmlspecialchars($_POST['youth']));
    $nolimit = trim(htmlspecialchars($_POST['nolimit']));
    $children = trim(htmlspecialchars($_POST['children']));
    $population = trim(htmlspecialchars($_POST['population']));
    $attend_date = trim(htmlspecialchars($_POST['attend_date']));
     $branch_id = $getfullchurchd['branch_id'];
    
    if(empty($ministry_id) || empty($population) || empty($attend_date)){
        echo "<script type='text/javascript'>toastr.error('FILL INPUT FIELDS','ERROR',{timeOut: 7000})</script>";
    }else{

      if(empty($atid)){
       $usr_sql= insert("INSERT INTO attendance_tb(attendance_id,branch_id,ministry_id,men,women,youth,children,nolimit,population,attend_date) VALUES('$attendance_id','$branch_id','$ministry_id','$men','$women','$youth','$children','$nolimit','$population','$attend_date')");
      }else{
        $usr_sql = update("UPDATE attendance_tb SET branch_id='$branch_id', ministry_id = '$ministry_id', men = '$men', women = '$women', youth = '$youth', children = '$children', nolimit = '$nolimit', population = '$population', attend_date = '$attend_date' WHERE id= '$atid' ");
      }

       if($usr_sql){
            $s = "success";
            echo "<script>window.location.href='headcount?a=$s';</script>";
       }else{
            $s = "failed";
            echo "<script>window.location.href='headcount?a=$s';</script>";
       }
    }
}


if(@$_GET['a'] == 'success'){
    echo "<script type='text/javascript'>toastr.success('HEAD COUNT SAVED','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['a'] == 'failed'){
    echo "<script type='text/javascript'>toastr.error('PLEASE TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
}


if(@$_GET['ta'] == 'trashsuccess'){
    echo "<script type='text/javascript'>toastr.success('HEAD COUNT TRASHED','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['ta'] == 'trashfailed'){
    echo "<script type='text/javascript'>toastr.error('PLEASE TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg"> HEAD COUNT ATTENDANCE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Attendance</a></li>
              <li class="breadcrumb-item active">Head Count</li>
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
            <div class="col-md-4">
                <div class="card card-default">
                <form class="form" action="" method="post" id="headcount" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <select class="form-control select2" data-placeholder="Select Service" name="service_id" style="width: 100%;" required>
                                <option></option>
                                  <?php
                                  $getaccType = select("SELECT * FROM service_tb  WHERE branch_id='$churchID'");
                                  if(count($getaccType) > 0){
                                      foreach($getaccType as $getaccTyped){
                                  ?>
                                  
               <option value="<?php echo $getaccTyped['service_id'];?>" <?php if(!empty($atid)){if($attendance['ministry_id'] == $getaccTyped['service_id']){echo "selected";}else{echo "";}} ?> ><?php echo $getaccTyped['service_name'];?></option>
                                  <?php }}?>
                              </select>
                            </div>
                            
                                                       
                            
                            
                            <div class="row">
                                <div class="col-md-6">
                            <div class="form-group">
                                  <input type="number" min="0" class="form-control txtCal" name="men" placeholder="Men/Male" value="<?php if(!empty($atid)){echo $attendance['men'];} ?>" required />
                            </div> 
                                </div>
                                <div class="col-md-6">                            
                            <div class="form-group">
                                <input type="number" min="0" class="form-control txtCal" name="women" placeholder="Women/Female" value="<?php if(!empty($atid)){echo $attendance['women'];} ?>" required />
                            </div>
                                </div>
                            </div> 
                            
                            <div class="row">
                                <div class="col-md-6">
                            <div class="form-group">
                                  <input type="number" min="0" class="form-control txtCal" name="youth" placeholder="Youth" value="<?php if(!empty($atid)){echo $attendance['youth'];} ?>" required />
                            </div>
                                </div>
                                <div class="col-md-6">                            
                            <div class="form-group">
                                <input type="number" min="0" class="form-control txtCal" name="children" placeholder="Children" value="<?php if(!empty($atid)){echo $attendance['children'];} ?>" required />
                            </div></div>
                            </div> 
                            
                            
                            <div class="form-group">
                                  <input type="number" min="0" class="form-control txtCal" name="nolimit" placeholder="No Limit" value="<?php if(!empty($atid)){echo $attendance['nolimit'];} ?>" required />
                            </div>                           
                            <div class="form-group">
                        <input type="number" min="0" id="total_sum_value" class="form-control txt" name="population" placeholder="Total Population" value="<?php if(!empty($atid)){echo $attendance['population'];} ?>" required readonly />
                            </div>
                            
                            <div class="form-group">
                        <input type="date" class="form-control txt" name="attend_date" value="<?php if(!empty($atid)){echo $attendance['attend_date'];}else{ echo date('m/d/Y');} ?>" required />
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="submit" onclick="return confirm('<?php echo $saveButtonLabel; ?> COUNT ?');" value="<?php echo $saveButtonLabel; ?> HEAD COUNT" class="btn btn-primary btn-block btn-sm" />  
                            </div>
                        </div>
                        
                    </div>
                  </div>
                    </form>
                </div>
            </div>  
            
            
            <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>DATE</th>
                    <th>SERVICE</th>
                    <th>TOTAL ATTENDANCE</th>
                    <th class="text-center">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $gettithe = select("SELECT * FROM attendance_tb WHERE branch_id='$churchID'");
                      if($gettithe){
                        foreach($gettithe as $gettithedet){
                            $attenddate = $gettithedet['attend_date'];
                            $serviceid = $gettithedet['ministry_id'];
                            $getService = select("SELECT * FROM service_tb WHERE service_id='$serviceid' AND branch_id='$churchID'");
                            foreach($getService as $serviceGot){
                                
                            
                            
                ?>
                  <tr>
                    <td> <?php echo date('Y-m-d',strtotime($attenddate));?> </td>
                    <td> <?php echo $serviceGot['service_name'];?> </td>
                    <td> <?php echo $gettithedet['population'];?> </td>
                    <td class="text-center">
                        <a href="headcount?atid=<?php echo $gettithedet['id']; ?>" class="btn btn-primary btn-sm" onclick="return confirm('EDIT RECORD');"><i class="fa fa-pen"></i> Edit</a>
                        <a href="trash-attendant?atid=<?php echo $gettithedet['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('TRASH RECORD');"><i class="fa fa-trash"></i> Trash</a>
                    </td>
                  </tr>
                      <?php }}}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </section>
  </div>
<?php include 'layout/footer.php'; ?>
<script>
    $(document).ready(function(){
    $("#headcount").on('input', '.txtCal', function () {
       var calculated_total_sum = 0;
       $("#headcount .txtCal").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("#total_sum_value").val(calculated_total_sum);
       });
    });
</script>