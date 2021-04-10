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
}

if(isset($_POST['submit'])){
    $ministryID = htmlspecialchars(trim($_POST['ministryID']));
    $ministryName = htmlspecialchars(trim($_POST['ministryName']));
//    $branch = ChurchID;
    $saveMinistry = insert("INSERT INTO ministry_tb(branch_id,group_id,group_name) VALUES('$churchID','$ministryID','$ministryName')");
    
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
                                <input type="text" class="form-control" name="ministryID" value="<?php echo "MINS-".rand(10,50).rand(100,999);?>" placeholder="Ministry ID" required readonly />
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>MEM ID</th>
                    <th>MEMBER NAME</th>
                    <!-- <th>ACTION</th> -->
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getministry = select("SELECT m.full_name,m.member_id FROM membership_tb m
                 JOIN g_assign_member g ON g.member_id = m.member_id WHERE g.branch_id='$churchID' && g.group_id = '$gid' ");
                      if($getministry){
                    foreach($getministry as $mingotten){
                    
                ?>
                  <tr>
                    <td> <?php echo $mingotten['member_id'];?> </td>
                    <td> <?php echo $mingotten['full_name'];?> </td>
                    <!-- <td class="text-center"> -->
                        <!-- <a href="view-ministry-members?gid=<?php #echo $mingotten['id'];?>" class="btn btn-primary btn-xs" ><i class="fa fa-eye"></i> View Members</a> -->
                        <!-- <a href="trash-ministry?mid=<?php #echo $mingotten['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('TRASH RECORD');"><i class="fa fa-trash"></i> Trash</a> -->

                    <!-- </td> -->
                  </tr>
                      <?php }}?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>  
            
            
            <div class="col-md-6">
                <div class="card">
              <!-- /.card-header -->
              <div class="card-header">Attendance</div>
              <div class="card-body">
                <table id="example11" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>MEM ID</th>
                    <th>MEMBER NAME</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getministry = select("SELECT m.full_name,m.member_id FROM membership_tb m JOIN g_assign_member g ON g.member_id = m.member_id WHERE g.branch_id='$churchID' && g.group_id = '$gid'  ");
                      if($getministry){
                    foreach($getministry as $mingotten){
                    
                ?>
                  <tr>
                    <td> <?php echo $mingotten['member_id'];?> </td>
                    <td> <?php echo $mingotten['full_name'];?> </td>
                    <td class="text-center">
                        <!-- <a href="view-ministry-members?gid=<?php #echo $mingotten['id'];?>" class="btn btn-primary btn-xs" ><i class="fa fa-eye"></i> View Members</a> -->
                        <!-- <a href="trash-ministry?mid=<?php #echo $mingotten['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('TRASH RECORD');"><i class="fa fa-trash"></i> Trash</a> -->


                        <?php
                        $Today = date("l");
                            #if($Today == "Sunday"){
                        $dateToday = date("Y-m-d");
                        $getattendance = select("SELECT * FROM mem_attendance WHERE member_id='".$memgotten['member_id']."' AND date_reg='$dateToday'");
                        if(!$getattendance){
                        ?>
                        
                <a href="markabsent?mid=<?php echo $mingotten['member_id'];?>&gid=<?php echo $gid;?>&page=<?php echo $page; ?>" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Absent</a>
                        
                <a href="markpresent?mid=<?php echo $mingotten['member_id'];?>&gid=<?php echo $gid;?>&page=<?php echo $page; ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Present</a>
                        <?php }else{
                        foreach($getattendance as $attgotten){
                            
                            if($attgotten['status']=='absent'){
                        ?>
                        
                        <span class="btn btn-danger btn-xs"><?php echo strtoupper($attgotten['status']);?></span>
                        <?php }
                        
                        if($attgotten['status']=='present'){?>
                        <span class="btn btn-success btn-xs"><?php echo strtoupper($attgotten['status']);?></span>
                        <?php } }}#}else{ echo " Marking Disabled Until Sunday"; }?>

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
