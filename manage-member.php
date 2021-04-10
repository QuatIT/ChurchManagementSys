<?php
$dropactive = "membership";
$active = "managemember";
include 'layout/headside.php';

//alert from new-member
if(@$_GET['m'] && @$_GET['d']);
if(@$_GET['m'] == 'success'){
    $d = @$_GET['d'];
    echo "<script type='text/javascript'>toastr.success('Member Registered','Success',{timeOut: 9000})</script>";
}
//alert from update-member
//if(@$_GET['m'] && @$_GET['d']);
if(@$_GET['ua'] == 'updatesuccess'){
    $d = @$_GET['ua'];
    echo "<script type='text/javascript'>toastr.success('Member Updated','Success',{timeOut: 9000})</script>";
}

//alert from flag-member
if(@$_GET['a'] && @$_GET['mid']);
if(@$_GET['a'] == 'success'){
    $mid = @$_GET['mid'];
    echo "<script type='text/javascript'>toastr.success('Member Flagged','Success',{timeOut: 7000})</script>";
}elseif(@$_GET['a'] == 'error'){
    $mid = @$_GET['mid'];
    echo "<script type='text/javascript'>toastr.error('Failed, Try Again Later','Error',{timeOut: 7000})</script>";
}


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">MANAGE MEMBERS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Membership</a></li>
              <li class="breadcrumb-item active">Manage Members</li>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>MEM. ID</th>
                    <th>FULL NAME</th>
                    <th>PHONE</th>
                    <th class="text-center">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getmember = select("SELECT id, member_id, last_name, first_name, other_name, phone_number FROM membership_tb WHERE member_status='Yes' AND branch_id='$churchID' ");
                      if($getmember){
                    foreach($getmember as $memgotten){
                ?>
                  <tr>
                    <td><?php echo $memgotten['member_id'];?></td>
                    <td><?php echo $memgotten['first_name']." ".$memgotten['last_name'];?></td>
                    <td><?php echo $memgotten['phone_number'];?></td>
                    <td class="text-center"> 
                        <a href="sms-member?mid=<?php echo $memgotten['member_id']; ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-envelope"></i> SMS</a>
                        
                <a href="member-info?mid=<?php echo $memgotten['member_id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View</a>
                        
                        <a href="flag-member?mid=<?php echo $memgotten['member_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('FLAG MEMBER ?');"><i class="fa fa-flag"></i> Flag</a>
                        
<!--                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-vcard"></i> Card</a>-->
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

<?php include 'layout/footer.php';?>