<?php
$dropactive = "membership";
$active = "manageguest";
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
if(@$_GET['ga'] == 'guestsuccess'){
    echo "<script type='text/javascript'>toastr.success('GUEST SAVED','SUCCESS',{timeOut: 7000})</script>";
}elseif(@$_GET['ga'] == 'guesterror'){

    echo "<script type='text/javascript'>toastr.error('FAILED, TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
}


?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">MANAGE GUESTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Membership</a></li>
              <li class="breadcrumb-item active">Manage Guests</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

      
    <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>GUEST ID</th>
                    <th>FULL NAME</th>
                    <th>PHONE</th>
                    <th class="text-center">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getmember = select("SELECT * FROM guest_tb WHERE branch_id='$churchID'");
                      if($getmember){
                    foreach($getmember as $memgotten){
                ?>
                  <tr>
                    <td><?php echo $memgotten['guest_id'];?></td>
                    <td><?php echo $memgotten['first_name']." ".$memgotten['last_name'];?></td>
                    <td><?php echo $memgotten['phone'];?></td>
                    <td class="text-center"> 
                        <a href="sms-guest?gid=<?php echo $memgotten['guest_id']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-envelope"></i> SMS</a>
                        
                <a href="guest-info?gid=<?php echo $memgotten['guest_id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View</a>
                    
                    </td>
                  </tr>
                    <?php }}?>
                </table>
              </div>
            </div>
            </div>
          </div>
      </div>
    </section>
  </div>

<?php include 'layout/footer.php';?>