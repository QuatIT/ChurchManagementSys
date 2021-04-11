<?php
$dropactive = "ministry";
$active = "manministry";
include 'layout/headside.php';

$gid = $_GET['gid'];
$page = "view-ministry-members";


if(!empty($gid)){
  $getMinistryName = select("CALL stproc_Ministry_Group_Select('$gid',1) ");
  foreach($getMinistryName as $ministryName){}
  #echo "<script>console.log('{$ministryName['group_name']}')</script>";
  //$saveLabel = "UPDATE";
}


if(isset($_POST['submit'])){
    $ministryID = trim($gid);
    // $assign = htmlspecialchars(trim($_POST['assign']));
    $assign = $_POST['assign'];
    $saveStatus = "false";
    // $chk="";  
    foreach($assign as $memberId)  
       {  
        //   $chk.= $chk1.","; 
        $chkExist = select("SELECT branch_id,member_id,group_id FROM g_assign_member WHERE branch_id='$churchID' && member_id='$memberId' && group_id = '$ministryID' ");
        if(count($chkExist) >= 1){
            echo "<script type='text/javascript'>toastr.error('DUPLICATE DATA FOR {$ministryID} AND {$ministryID}','FAILED',{timeOut: 7000})</script>";
        }else{
            $saveMinistry = insert("INSERT INTO g_assign_member(branch_id,member_id,group_id) VALUES('$churchID','$memberId','$ministryID')");
            $saveStatus = "true";
        }
        
       } 

    
//    $branch = ChurchID;
    
    
    if($saveStatus == "true"){
        $s = "success";
        echo "<script>window.location.href='manage-ministry?m=$s</script>";
    }else{
        echo "<script type='text/javascript'>toastr.error('PLEASE TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
    }
}

if(@$_GET['m']);

if(@$_GET['m'] == 'success'){
    // echo "<script type='text/javascript'>toastr.success('MINISTRY CREATED SUCCESSFULL','SUCCESS',{timeOut: 7000})</script>";
    echo "<script type='text/javascript'>toastr.success('CREATED SUCCESSFULL','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['ta'] == 'trashsuccess'){
    echo "<script type='text/javascript'>toastr.success('TRASHED SUCCESSFULLY','SUCCESS',{timeOut: 7000})</script>";
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
            <h1 class="m-0 text-dark text-lg"><?php if(!empty($gid)){echo strtoupper($ministryName['group_name']);}else{echo "MINISTRIES";} ?> </h1>
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
            <!-- <div class="col-md-5">
                <div class="card card-default">
                    <form class="form" action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>MIN ID <i class="text-danger">*</i></label>
                                <input type="text" class="form-control" name="ministryID" value="<?php #echo "MINS-".rand(10,50).rand(100,999);?>" placeholder="Ministry ID" required readonly />
                            </div>
                            <div class="form-group">
                              <label>MINISTRY NAME <i class="text-danger">*</i></label>
                                  <input type="text" class="form-control" name="ministryName" placeholder="Ministry Name" required />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" onclick="return confirm('CREATE MINISTRY ?');" value="CREATE MINISTRY" class="btn btn-primary btn-block btn-sm" />  
                            </div>
                        </div>
                        
                    </div>
                  </div>
                    </form>
                </div>
            </div>   -->
            
            
            <div class="col-md-6">
                <div class="card">
                <div class="card-header">List of Members </div>
              <!-- /.card-header -->
              <div class="card-body">

              <form action="" method="POST" enctype="multipart/form-data">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>MEMBER ID</th>
                    <th>MEMBER NAME</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                //  $getministry = select("SELECT g.member_id,m.full_name,g.branch_id FROM g_assign_member g JOIN membership_tb m on m.member_id = g.member_id WHERE group_id <> '$gid' && g.branch_id = '$churchID' && g.isActive = 1 GROUP BY g.member_id, m.full_name;");
                //  $getministry = select("SELECT g.member_id,m.full_name,g.group_id,g.branch_id FROM g_assign_member g JOIN membership_tb m ON m.member_id = g.member_id WHERE group_id <> '$gid'  && g.branch_id = '$churchID' && g.isActive = 1 && LEFT(group_id,3) LIKE CONCAT('%',LEFT('$gid',3)) GROUP BY g.member_id, m.full_name");
                //  $getministry = select("CALL stproc_Ministry_Group_Members_Select('$churchID','$gid')");
                 $getministry = select("SELECT g.member_id as member_id,m.full_name as full_name,g.group_id as group_id,g.branch_id as branch_id FROM g_assign_member g JOIN membership_tb m ON m.member_id = g.member_id WHERE NOT EXISTS( SELECT g.member_id FROM g_assign_member g WHERE g.group_id = '$gid' AND g.member_id = m.member_id) && group_id <> '$gid'  && g.branch_id = '$churchID' && g.isActive = 1 && LEFT(group_id,3) LIKE CONCAT('%',LEFT('$gid',3)) GROUP BY g.member_id, m.full_name;");
                      if($getministry){
                    foreach($getministry as $mingotten){
                    
                ?>
                  <tr>
                    <td> <?php echo $mingotten['member_id'];?> </td>
                    <td> <?php echo $mingotten['full_name'];?> </td>
                    <td> 
                          <input type="checkbox" name="assign[]" value="<?php echo $mingotten['member_id'];?>" class="form-control">
                    </td>
                  </tr>
                      <?php }}?>
                  </tbody>
                  <tfoot>
                        <tr>
                            <td colspan="3"><input type="submit" name="submit" onclick="return confirm('ASSIGN MEMBER(S) ?');" value="ASSIGN MEMBER(S)" class="btn btn-primary btn-block btn-sm" />  
                        </tr>
                  </tfoot>
                </table>
                </form>
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
