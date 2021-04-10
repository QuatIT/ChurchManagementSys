<?php
$dropactive = "ministry";
$active = "manministry";
include 'layout/headside.php';

$gid = $_GET['gid'];

if(!empty($gid)){
  $getMinistry = select("SELECT group_id, group_name FROM ministry_tb WHERE id='$gid' && isActive = 1");
  foreach($getMinistry as $ministry){}

  $saveLabel = "UPDATE";
}else{
  $saveLabel = "CREATE";
}

if(isset($_POST['submit'])){
    $ministryID = htmlspecialchars(trim($_POST['ministryID']));
    $ministryName = htmlspecialchars(trim($_POST['ministryName']));
//    $branch = ChurchID;

if(empty($gid)){
  $saveMinistry = insert("INSERT INTO ministry_tb(branch_id,group_id,group_name) VALUES('$churchID','$ministryID','$ministryName')");
}else{
  $saveMinistry = update("UPDATE ministry_tb SET branch_id = '$churchID',group_id = '$ministryID',group_name = '$ministryName' WHERE id = '$gid' && isActive = 1 ");
}
    
    
    if($saveMinistry){
        $s = "success";
        echo "<script>window.location.href='manage-ministry?m=$s</script>";
    }else{
        echo "<script type='text/javascript'>toastr.error('PLEASE TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
    }
}

if(@$_GET['m']);

if(@$_GET['m'] == 'success'){
    echo "<script type='text/javascript'>toastr.success('MINISTRY CREATED SUCCESSFULL','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['ta'] == 'trashsuccess'){
    echo "<script type='text/javascript'>toastr.success('MINISTRY TRASHED','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['ta'] == 'trasherror'){
    echo "<script type='text/javascript'>toastr.error('TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
}
?>
<script>
//const swalWithBootstrapButtons = Swal.mixin({
//  customClass: {
//    confirmButton: 'btn btn-success',
//    cancelButton: 'btn btn-danger'
//  },
//  buttonsStyling: false
//})
//
//swalWithBootstrapButtons.fire({
//  title: 'Are you sure?',
//  text: "You won't be able to revert this!",
//  icon: 'warning',
//  showCancelButton: true,
//  confirmButtonText: 'Yes, delete it!',
//  cancelButtonText: 'No, cancel!',
//  reverseButtons: true
//}).then((result) => {
//  if (result.isConfirmed) {
//    swalWithBootstrapButtons.fire(
//      'Deleted!',
//      'Your file has been deleted.',
//      'success'
//    )
//  } else if (
//    /* Read more about handling dismissals below */
//    result.dismiss === Swal.DismissReason.cancel
//  ) {
//    swalWithBootstrapButtons.fire(
//      'Cancelled',
//      'Your imaginary file is safe :)',
//      'error'
//    )
//  }
//})
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">MINISTRIES </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ministry</a></li>
              <li class="breadcrumb-item active">Manage Ministry</li>
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
            <div class="col-md-5">
                <div class="card card-default">
                    <form class="form" action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>MIN ID <i class="text-danger">*</i></label>
                                <input type="text" class="form-control" name="ministryID" value="<?php if(!empty($gid)){echo $ministry['group_id']; }else{ echo "MINS-".rand(10,50).rand(100,999); } ?>" placeholder="Ministry ID" required readonly />
                            </div>
                            <div class="form-group">
                              <label>MINISTRY NAME <i class="text-danger">*</i></label>
                                  <input type="text" class="form-control" name="ministryName" placeholder="Ministry Name" value="<?php if(!empty($gid)){echo $ministry['group_name']; } ?>" required />
                            </div>
                            <div class="form-group">
<!--                                <label style="color:white;">.</label>-->
                                <input type="submit" name="submit" onclick="return confirm('<?php echo $saveLabel; ?> MINISTRY ?');" value="<?php echo $saveLabel; ?> MINISTRY" class="btn btn-primary btn-block btn-sm" />  
                            </div>
                        </div>
                        
                    </div>
                  </div>
                    </form>
<!--                  <div class="card-footer"></div>-->
                </div>
            </div>  
            
            
            <div class="col-md-7">
                <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>MIN ID</th>
                    <th>MINISTRY NAME</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getministry = select("SELECT * FROM ministry_tb WHERE branch_id='$churchID' && isActive = 1");
                      if($getministry){
                    foreach($getministry as $mingotten){
                    
                ?>
                  <tr>
                    <td> <?php echo $mingotten['group_id'];?> </td>
                    <td> <?php echo $mingotten['group_name'];?> </td>
                    <td class="text-center">
                        <a href="view-ministry-members?gid=<?php echo $mingotten['group_id'];?>" class="btn btn-primary btn-xs" ><i class="fa fa-eye"></i> View Members</a>
                        <a href="manage-ministry?gid=<?php echo $mingotten['id'];?>" class="btn btn-warning btn-xs" onclick="return confirm('EDIT RECORD');" ><i class="fa fa-pen"></i> Edit Ministry</a>
                        <a href="trash-ministry?mid=<?php echo $mingotten['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('TRASH RECORD');"><i class="fa fa-trash"></i> Trash</a>
                    </td>
                  </tr>
                      <?php }}?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>  
        </div>
      </div>
    </section>
  </div>

<?php
include 'layout/footer.php';    
?>
