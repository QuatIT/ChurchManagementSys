<?php
$dropactive = "COUNSELLING";
$active = "newcounselling";
include 'layout/headside.php';

if(isset($_POST['submit'])){
    $memberid = trim(htmlspecialchars($_POST['member_id']));
    $counsellor = trim(htmlspecialchars($_POST['counsellorName']));
    $type = trim(htmlspecialchars($_POST['type']));

    $pick_name = select("SELECT * FROM membership_tb WHERE member_id='$memberid' AND branch_id='$churchID'");
    foreach($pick_name as $pick_names){
        $full_name = $pick_names['full_name'];
    }       

    if($type == "text"){
        $notes = trim(htmlspecialchars($_POST['notes']));
        $save_notes = insert("INSERT INTO counselling(branch_id,member_id,full_name,counsellor,msg,dateInsert)VALUES('$churchID','$memberid','$full_name','$counsellor','$notes',CURDATE())");
        if($save_notes){
            $s = "success";
            echo "<script>window.location.href='new-councelling?ta=$s';</script>";
        }else{
            $s = "failed";
            echo "<script>window.location.href='new-councelling?ta=$s';</script>";    
        }
    }
    
    
    if($type == "file"){
//        if(isset($_FILES["file"])){
//      $file =  $_FILES['file']['name'];
      $errors= array();
      $file_name = $_FILES["file"]["name"];
      $file_size = $_FILES["file"]["size"];
      $file_tmp = $_FILES["file"]["tmp_name"];
      $file_type = $_FILES["file"]["type"];
      $file_ext = explode('.', $_FILES["file"]["name"]);
        $extension1 = $file_ext[1];
      //check file extension
      $extensions= array("txt","pdf","docx","doc"); //txt,pdf,doc,docx,
      
      if(!in_array($extension1,$extensions)){
         $errors[]="Extension Not Allowed, Choose a PDF or Doc or Text File";
      }
      
      if($file_size > 4097152) {
         $errors[]='File size must be exactly 4 MB';
      }
      
      if(empty($errors)==true) {
          $extension  = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
          $newfilename = round(microtime(true)). '.' .$extension;
          move_uploaded_file($file_tmp,"uploads/counselling/".$newfilename);
        $save_file = insert("INSERT INTO counselling(branch_id,member_id,full_name,counsellor,file,dateInsert)VALUES('$churchID','$memberid','$full_name','$counsellor','$newfilename',CURDATE())");
        if($save_file){
            $s = "success";
            echo "<script>window.location.href='new-councelling?fa=$s';</script>";
        }else{
            $s = "failed";
            echo "<script>window.location.href='new-councelling?fa=$s';</script>";    
        }
      }else{
        echo "<script type='text/javascript'>toastr.error('".implode(',' , $errors)."','FAILED',{timeOut: 7000})</script>";
      }
//    }
}
    
    if($type == "both"){
        $notes = trim(htmlspecialchars($_POST['notes']));
//        if(isset($_FILES["file"])){

        $errors= array();
        $file_name = $_FILES["file"]["name"];
        $file_size = $_FILES["file"]["size"];
        $file_tmp = $_FILES["file"]["tmp_name"];
        $file_type = $_FILES["file"]["type"];
        $file_ext = explode('.',$_FILES["file"]["name"]);
        $extension1 = $file_ext[1];
        //check file extension
        $extensions= array("txt","pdf","docx","doc"); //txt,pdf,doc,docx,

        if(!in_array($extension1,$extensions)){
         $errors[]="Extension Not Allowed, please choose a PDF or Doc or Text file";
        }

        if($file_size > 4097152) {
         $errors[]="File size must be exactly 4 MB";
        }

        if(empty($errors)==true){
          $extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION );
          $newfilename = round(microtime(true)). '.' .$extension;
          move_uploaded_file($file_tmp,"uploads/counselling/".$newfilename);
        $save_both = insert("INSERT INTO counselling(member_id,full_name,counsellor,msg,file,dateInsert)VALUES('$memberid','$full_name','$counsellor','$notes','$newfilename',CURDATE())");
        if($save_both){
            $s = "success";
            echo "<script>window.location.href='new-councelling?ba=$s';</script>";
        }else{
            $s = "failed";
            echo "<script>window.location.href='new-councelling?ba=$s';</script>";    
        }
        }else{
        echo "<script type='text/javascript'>toastr.error('".implode(',' , $errors)."','FAILED',{timeOut: 7000})</script>";
        }
//    }
    }

}


if(@$_GET['ta'] == 'success'){
    echo "<script type='text/javascript'>toastr.success('COUNSELLING NOTES SAVED','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['ta'] == 'failed'){
    echo "<script type='text/javascript'>toastr.error('SAVING NOTES FAILED, TRY AGAIN','FAILED',{timeOut: 7000})</script>";
}

if(@$_GET['fa'] == 'success'){
    echo "<script type='text/javascript'>toastr.success('COUNSELLING FILE UPLOADED','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['fa'] == 'failed'){
    echo "<script type='text/javascript'>toastr.error('SAVING FILE FAILED, TRY AGAIN','FAILED',{timeOut: 7000})</script>";
}

if(@$_GET['ba'] == 'success'){
    echo "<script type='text/javascript'>toastr.success('COUNSELLING FILE & NOTES SAVED','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['ba'] == 'failed'){
    echo "<script type='text/javascript'>toastr.error('SAVING NOTES & FILE FAILED, TRY AGAIN','FAILED',{timeOut: 7000})</script>";
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg"> COUNSELLING</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Counselling</a></li>
              <li class="breadcrumb-item active">Manage Counselling</li>
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
                              <select class="form-control select2" data-placeholder="Select Member" name="member_id" style="width: 100%;" required>
                                <option></option>
                                  <?php
                                  $getaccType = select("SELECT * FROM membership_tb WHERE branch_id='$churchID'");
                                  if(count($getaccType) > 0){
                                      foreach($getaccType as $getaccTyped){
                                  ?>
               <option value="<?php echo $getaccTyped['member_id'];?>"><?php echo $getaccTyped['first_name']." ".$getaccTyped['last_name']." ".$getaccTyped['other_name'];?></option>
                                  <?php }}?>
                              </select>
                            </div>
                            
                            <div class="form-group">
                                  <input type="text" class="form-control" name="counsellorName" placeholder="Counsellor Name" required />
                            </div> 
                            
                            <div class="form-group">
                                  <select class="form-control select2" name="type" data-placeholder="Select Input Type" onchange="input_type(this.value);" required>
                                        <option></option>
                                        <option value="file">File Upload</option>
                                        <option value="text">Text Input</option>
                                        <option value="both">Both Input & Upload</option>
                                    </select>
                            </div>     
                            
                            <div id="type"></div>
                                           
                            
                            <div class="form-group">
                                <input type="submit" name="submit" onclick="return confirm('SAVE NOTES ?');" value="SAVE NOTES" class="btn btn-primary btn-block btn-md" />  
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
                    <th>MEMBER</th>
                    <th>COUNCELLOR</th>
<!--                    <th>TOTAL ATTENDANCE</th>-->
                  </tr>
                  </thead>
                  <tbody>
                <?php
                $gettithe = select("SELECT * FROM counselling WHERE branch_id='$churchID'");
                  if($gettithe){
                    foreach($gettithe as $gettithedet){
                        $attenddate = $gettithedet['dateInsert'];
                        $full_name = $gettithedet['full_name'];
                ?>
                  <tr>
                    <td> <?php echo date('Y-m-d',strtotime($attenddate));?> </td>
                    <td> <?php echo $full_name;?> </td>
                    <td> <?php echo $gettithedet['counsellor'];?> </td>
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
<?php include 'layout/footer.php'; ?>
<script>

function input_type(val){
    $('#loader').html("Please Wait...");
    $('#type').load('input-type.php?it='+val, function(){
    $('#loader').html("");
    });
} 
</script>