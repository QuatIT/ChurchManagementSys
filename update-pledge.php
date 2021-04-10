<?php
$dropactive = "account";
$active = "cpledgepage";
include 'layout/headside.php';

if($_GET['pid']){
    $pid = decode5t($_GET['pid']);
}
$getPledge = select("SELECT * FROM pledge_tb WHERE id='$pid'");
if($getPledge){
    foreach($getPledge as $gotPledge){}
}


if (isset($_POST['updatePledge'])) {
    $Vztey2y1wsj4 = trim($_POST['pledge_status']);
    $V0ngymqhgpt1 = trim($_POST['pledge_id']);
    if(empty($Vztey2y1wsj4)){
            echo "<script type='text/javascript'>toastr.error('Please fill in a inputs','FAILED',{timeOut: 7000})</script>";
    }else{
        $V12ext3gtwse = update("UPDATE pledge_tb SET pledge_status='$Vztey2y1wsj4' WHERE pledge_id='$V0ngymqhgpt1'");
        if($V12ext3gtwse){
                $s = "updatesuccess";
                echo "<script>window.location.href='manage-pledges?m=$s';</script>";       
        } else {
                echo "<script type='text/javascript'>toastr.error('Something Happened','FAILED',{timeOut: 7000})</script>";
        }
    }
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">UPDATE PLEDGE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Account</a></li>
          <li class="breadcrumb-item active">Pledge <?php echo $gotPledge['pledge_id']?></li>
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
            <div class="col-md-12">
                <div class="card card-default">

                <form class="form" action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Pledge ID <i class="text-danger">*</i></label>
                                  <input type="text" class="form-control" name="pledge_id" value="<?php echo $gotPledge['pledge_id']; ?>" required readonly />
                            </div>
                            <div class="form-group">
                              <label>Event Name <i class="text-danger">*</i></label>
                                  <input type="text" class="form-control" name="event_name" value="<?php echo $gotPledge['event_name'];?>" required readonly />
                            </div>
                            <div class="form-group">
                              <label>Phone <i class="text-danger">*</i></label>
                                <input type="tel" class="form-control" name="phone" value="<?php echo $gotPledge['phone'];?>" required readonly />
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                             <div class="form-group">
                              <label>Member Type <i class="text-danger">*</i></label>
                                  <input type="text" class="form-control" name="payment_date" value="<?php echo $gotPledge['member_type'];?>" required readonly />
                             </div>
                             <div class="form-group">
                              <label>Payment Date <i class="text-danger">*</i></label>
                                  <input type="date" class="form-control" name="payment_date" value="<?php echo $gotPledge['payment_date'];?>" required readonly />
                            </div>
                             <div class="form-group">
                              <label>Status <i class="text-danger">*</i></label>
                                 <select class="form-control select2" name="pledge_status">
                                    <option value="<?php echo $gotPledge['pledge_status'];?>"><?php echo $gotPledge['pledge_status'];?></option>
                                    <option value="Pledged">Pledged</option>
                                    <option value="Fulfilled">Fulfilled</option>
                                 </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                             <div class="form-group">
                              <label>Member Name <i class="text-danger">*</i></label>
                                  <input type="text" min="1" class="form-control" name="member_name" value="<?php echo $gotPledge['member_name'];?>" required readonly />
                            </div>
                             <div class="form-group">
                              <label>Amount <i class="text-danger">*</i></label>
                              <input type="number" min="1" class="form-control" name="amount" value="<?php echo $gotPledge['amount'];?>" required readonly />
                            </div>
                            <div class="form-group">
                                <label style="color:white;">.</label>
                                <input type="submit" name="updatePledge" onclick="return confirm('UPDATE PLEDGE ?');" value="UPDATE PLEDGE" class="btn btn-primary btn-block btn-md" />  
                            </div>
                        </div>
                    </div>
                  </div>
                </form>
                </div>
            </div>       
        </div>
      </div>
    </section>
</div>
<?php include 'layout/footer.php'; ?>
<script>
function m_type(val){
    $('#loader').html("Please Wait...");
    $('#memt').load('mem-type.php?mtp='+val, function(){
    $('#loader').html("");
   });
}
</script>