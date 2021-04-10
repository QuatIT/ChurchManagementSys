<?php
$dropactive = "account";
$active = "offeringaccount";
include 'layout/headside.php';
//
//if(isset($_POST['submit'])){
//    $titheID = htmlspecialchars(trim($_POST['titheID']));
//    $memberID = htmlspecialchars(trim($_POST['memberID']));
//    $titheAmount = htmlspecialchars(trim($_POST['titheAmount']));
//    $date = htmlspecialchars(trim($_POST['date']));
//    
//    $saveTithe = insert("INSERT INTO tithe(branch_id,member_id,tithe_id,tithe_amount,tithe_date) VALUES('$churchID','$memberID','$titheID','$titheAmount','$date')");
//    
//    if($saveTithe){
////        $s = "success";
//        echo "<script>window.location.href='tithe-account';</script>";
////        echo "<script type='text/javascript'>toastr.success('TITHE SAVED','SUCCESS',{timeOut: 7000})</script>";
//    }else{
//        echo "<script type='text/javascript'>toastr.error('PLEASE TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
//    }
//}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">RECORD OFFERING</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Account</a></li>
              <li class="breadcrumb-item active">Record Offerings</li>
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

                    <form class="form" action="" method="post" enctype="multipart/form-data">

                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Select Service<i class="text-danger">*</i></label>
                                <select name="service" class="form-control select2">
                                    <option></option>
                                    <?php 
                                    $getService = select("SELECT * FROM service_tb WHERE branch_id='$churchID'"); 
                                    foreach($getService as $getServiced){
                                    ?>
                                    <option value="<?php echo $getServiced['service_id'];?>" >
                                        <?php echo $getServiced['service_name'];?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            
                            <div class="form-group">
                              <label>Offering Amount <i class="text-danger">*</i></label>
                                  <input type="number" min="1" step="" class="form-control" name="offeringamount" placeholder="Offering Amount" required />
                            </div>
                            
                            <div class="form-group">
                              <label>Date <i class="text-danger">*</i></label>
                                  <input type="date" class="form-control" name="date" placeholder="Pick Date" required />
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="submit" onclick="return confirm('SAVE OFFERINGS ?');" value="SAVE OFFERINGS" class="btn btn-primary btn-block btn-sm" />  
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
                    <th>OFFERING ID</th>
                    <th>MEMBER NAME</th>
                    <th>AMOUNT</th>
                    <th>DATE</th>
<!--                    <th>ACTION</th>-->
                  </tr>
                  </thead>
                  <tbody>
                <?php
                    $gettithe = select("SELECT * FROM tithe WHERE branch_id='$churchID'");
                    if($gettithe){
                    foreach($gettithe as $gettithedet){
                    $memberID = $gettithedet['member_id'];
                    $getMem = select("SELECT * from membership_tb WHERE member_id='$memberID'");

                    foreach($getMem as $getMemdet){
                    $memName = $getMemdet['first_name']." ".$getMemdet['last_name']." ".$getMemdet['other_name'];
                    }
                ?>
                  <tr>
                    <td> <?php echo $gettithedet['tithe_id'];?> </td>
                    <td> <?php echo $memName;?> </td>
                    <td> <?php echo $gettithedet['tithe_amount'];?> </td>
                    <td> <?php echo $gettithedet['tithe_date'];?> </td>
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