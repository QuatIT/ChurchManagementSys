<?php
$dropactive = "account";
$active = "cpledgepage";
include 'layout/headside.php';

if (isset($_POST['btnSubmit'])) {
    $V0ngymqhgpt1 = trim($_POST['pledge_id']);
    $Vschmfi4p3p1 = trim($_POST['member_type']);
    $V35ymeeydeat = trim($_POST['member_name']);
    $Vnj1ldfggfcq = trim($_POST['event_name']);
    $Vnixdt5i2tix = trim($_POST['payment_date']);
    $Vovknnn341bi = trim($_POST['amount']);
    $Vpvw4pn1olf5 = trim($_POST['phone']);
    $Vvhsyzupxzwx = trim($_POST['address']);
    $Vztey2y1wsj4 = trim('Pledged');
    if(empty($V35ymeeydeat) || empty($Vnj1ldfggfcq) || empty($Vnixdt5i2tix) || empty($Vovknnn341bi) || empty($Vpvw4pn1olf5)) {
       
        echo "<script type='text/javascript'>toastr.error('Please fill Input Fields','FAILED',{timeOut: 7000})</script>";
        
    }else{
        $V12ext3gtwse = insert("INSERT INTO pledge_tb(branch_id,pledge_id,member_type,member_name,event_name,payment_date,amount,phone,address,pledge_status) VALUES('$churchID','$V0ngymqhgpt1','$Vschmfi4p3p1','$V35ymeeydeat','$Vnj1ldfggfcq','$Vnixdt5i2tix','$Vovknnn341bi','$Vpvw4pn1olf5','$Vvhsyzupxzwx','$Vztey2y1wsj4')");
        if($V12ext3gtwse) {
            echo "<script type='text/javascript'>toastr.success('Pledge Created Successfully','SUCCESS',{timeOut: 7000})</script>";
            $s = "success";
            echo "<script>window.location.href='manage-pledges?m=$s';</script>";
        }else{
            echo "<script type='text/javascript'>toastr.error('Something happened, Try Again','FAILED',{timeOut: 7000})</script>";
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
            <h1 class="m-0 text-dark text-lg">PLEDGE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Pledge</a></li>
              <li class="breadcrumb-item active">New Pledge</li>
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
                                  <input type="text" class="form-control" name="pledge_id" value="<?php echo "PLDG-" . mt_rand(1, 9) . mt_rand(1000, 9999) . mt_rand(100, 999) . date('s'); ?>" required readonly />
                            </div>    
                        
                            <div class="form-group">
                              <label>Event Name <i class="text-danger">*</i></label>
                                  <input type="text" class="form-control" name="event_name" placeholder="Event Name" required />
                            </div>
                            
                            <div class="form-group">
                              <label>Phone <i class="text-danger">*</i></label>
                                  <input type="tel" class="form-control" name="phone" placeholder="Phone Number" required />
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                             <div class="form-group">
                              <label>Member Type<i class="text-danger">*</i></label>
                              <select class="form-control select2" data-placeholder="Select Membership Type" onchange="m_type(this.value);" name="member_type" required>
                                <option></option>
                                <option value="Member"> Member</option>
                                <option value="Visitor"> Visitor</option>
                              </select>
                            </div>
                            
                             <div class="form-group">
                              <label>Payment Date <i class="text-danger">*</i></label>
                                  <input type="date" class="form-control" name="payment_date" placeholder="Payment Date" required />
                            </div>
                            
                             <div class="form-group">
                              <label>Address <i class="text-danger">*</i></label>
                                  <input type="text" class="form-control" name="address" placeholder="Address" required />
                            </div>
                        </div>
                        
                        
                        <div class="col-md-4">
                             <div class="form-group" id="memt"> </div>
                            
                             <div class="form-group">
                              <label>Amount <i class="text-danger">*</i></label>
                                  <input type="number" min="1" class="form-control" name="amount" placeholder="Amount" required />
                            </div>
                            
                            <div class="form-group">
                                <label style="color:white;">.</label>
                                <input type="submit" name="btnSubmit" onclick="return confirm('SAVE PLEDGE ?');" value="SAVE PLEDGE" class="btn btn-primary btn-block btn-sm" />  
                            </div>
                        </div>
                    </div>
                  </div>
                    </form>
<!--                  <div class="card-footer"></div>-->
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