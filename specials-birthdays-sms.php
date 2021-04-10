<?php
$dropactive = "specials";
$active = "birthdays";
include 'layout/headside.php';

if(isset($_GET['mid'])){
    $memid = $_GET['mid'];
    $getmem = select("SELECT * FROM membership_tb WHERE member_id='$memid'");
    foreach($getmem as $getmemgot){}
}

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
            <h1 class="m-0 text-dark text-lg"> SEND SMS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Specials</a></li>
              <li class="breadcrumb-item active">Birthday SMS</li>
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
                                <input type="text" class="form-control" name="memberID" value="<?php echo $getmemgot['member_id'];?>" placeholder="Member ID" required readonly />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-control" name="member_name" value="<?php echo $getmemgot['full_name'];?>" placeholder="Member Name" required />
                            </div>
                            
                             <div class="form-group">
                                <input type="tel" class="form-control" name="phone" value="<?php echo $getmemgot['phone_number'];?>" placeholder="Member Phone" required />
                            </div>
                               
                        <div class="form-group">
                              <textarea class="form-control" placeholder="Birthday Message" name="notes" rows="5" required></textarea>
                        </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                <a class="nav-link" href="specials-birthdays"> <i class="fa fa-arrow-left"></i> Back</a>
                                </div>
                                <div class="col-md-8">
                            <div class="form-group">
                                <input type="submit" name="submit" onclick="return confirm('SAVE NOTES ?');" value="SEND SMS" class="btn btn-warning btn-block btn-sm" disabled />  
                            </div>
                                </div>
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
                    <th>MESSAGE</th>
                    <th>STATUS</th>
                  </tr>
                  </thead>
                  <tbody>
                    
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