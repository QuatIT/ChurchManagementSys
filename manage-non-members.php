<?php
$dropactive = "membership";
$active = "managenonmember";
include 'layout/headside.php';

//alert from new-member
if(@$_GET['m'] && @$_GET['d']);
if(@$_GET['m'] == 'success'){
    $d = @$_GET['d'];
    echo "<script type='text/javascript'>toastr.success('MEMBER $d REGISTERED','REGISTRATION SUCCESS',{timeOut: 7000})</script>";
}

//alert from flag-member
if(@$_GET['am'] && @$_GET['mid']);
if(@$_GET['am'] == 'success'){
    $mid = @$_GET['mid'];
    echo "<script type='text/javascript'>toastr.success('MEMBER $mid UNFLAGGED','SUCCESS',{timeOut: 7000})</script>";
}elseif(@$_GET['am'] == 'error'){
    $mid = @$_GET['mid'];
    echo "<script type='text/javascript'>toastr.error('FAILED, TRY AGAIN LATER','UNFLAG FAILED',{timeOut: 7000})</script>";
}


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">FLAGGED MEMBERS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Membership</a></li>
              <li class="breadcrumb-item active">Flagged Members</li>
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
                    <th>IMAGE</th>
                    <th>FULL NAME</th>
                    <th>PHONE</th>
                    <th class="text-center">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getmember = select("SELECT id, member_id, last_name, first_name, other_name, phone_number FROM membership_tb WHERE member_status='No' AND branch_id='$churchID'");
                      if($getmember){
                    foreach($getmember as $memgotten){
                ?>
                  <tr>
                    <td><?php echo $memgotten['member_id'];?></td>
                    <td><img src="assets/images/logo.jpg" style="width:50px;" /></td>
                    <td><?php echo $memgotten['first_name']." ".$memgotten['last_name'];?></td>
                    <td><?php echo $memgotten['phone_number'];?></td>
                    <td class="text-center"> 
<!--                        <a href="#" class="btn btn-warning"><i class="fa fa-envelope"></i></a>   -->
                        <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                        <a href="make-member?mid=<?php echo $memgotten['id']; ?>" onclick="return confirm('MAKE MEMBER ?');" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Make Member</a>  
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