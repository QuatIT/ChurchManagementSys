<?php
$dropactive = "specials";
$active = "birthdays";
include 'layout/headside.php';

//alert from new-member
if(@$_GET['m'] && @$_GET['d']);
if(@$_GET['m'] == 'success'){
    $d = @$_GET['d'];
    echo "<script type='text/javascript'>toastr.success('MEMBER $d REGISTERED','REGISTRATION SUCCESS',{timeOut: 7000})</script>";
}
//alert from update-member
//if(@$_GET['m'] && @$_GET['d']);
if(@$_GET['ua'] == 'updatesuccess'){
    $d = @$_GET['ua'];
    echo "<script type='text/javascript'>toastr.success('MEMBER UPDATED','SUCCESS',{timeOut: 7000})</script>";
}

//alert from flag-member
if(@$_GET['a'] && @$_GET['mid']);
if(@$_GET['a'] == 'success'){
    $mid = @$_GET['mid'];
    echo "<script type='text/javascript'>toastr.success('MEMBER $mid FLAGGED','SUCCESS',{timeOut: 7000})</script>";
}elseif(@$_GET['a'] == 'error'){
    $mid = @$_GET['mid'];
    echo "<script type='text/javascript'>toastr.error('FAILED, TRY AGAIN LATER','FLAG FAILED',{timeOut: 7000})</script>";
}


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark"><i class="fa fa-gift"></i> <?php echo strtoupper(date('F'));?> BIRTHDAYS </h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Specials</a></li>
              <li class="breadcrumb-item active">Birthdays</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                
            <div class="card">
<!--
              <div class="card-header">
                <h3 class="card-title">Registered Members Table</h3>
              </div>
-->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>MEM. ID</th>
                    <th>FULL NAME</th>
                    <th>BIRTHDAY</th>
                    <th>AGE</th>
                    <th class="text-center">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                      $currentmonth = date('n');
                 $getmember = select("SELECT * FROM membership_tb WHERE member_status='Yes' AND branch_id='$churchID' AND month(dob)='$currentmonth'  ");
                      if($getmember){
                    foreach($getmember as $memgotten){
                ?>
                  <tr>
                    <td><?php echo $memgotten['member_id'];?></td>
                    <td><?php echo $memgotten['full_name'];?></td>
                    <td><?php echo date("l jS F Y",strtotime($memgotten['dob']));?></td>
                    <td><?php echo $age = date_diff(date_create($memgotten['dob']), date_create('now'))->y;;?></td>
                    <td class="text-center"> 
                        <a href="specials-birthdays-sms?mid=<?php echo $memgotten['member_id']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-envelope"></i> SMS</a>
                    </td>
                  </tr>
                    <?php }}?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
          </div>
      </div>
    </section>
  </div>

<?php include 'layout/footer.php';?>