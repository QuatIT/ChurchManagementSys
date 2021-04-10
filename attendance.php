<?php
$dropactive = "attendance";
$active = "markattendance";
include 'layout/headside.php';

//alert from new-member
if(@$_GET['m'] && @$_GET['d']);
if(@$_GET['m'] == 'success'){
    $d = @$_GET['d'];
    echo "<script type='text/javascript'>toastr.success('MEMBER $d REGISTERED','REGISTRATION SUCCESS',{timeOut: 7000})</script>";
}

//alert from absent marking
if(@$_GET['aba'] == 'absentsuccess'){

    echo "<script type='text/javascript'>toastr.success('MEMBER MAKED ABSENT','ABSENT',{timeOut: 7000})</script>";
    
}elseif(@$_GET['aba'] == 'absentfailed'){

    echo "<script type='text/javascript'>toastr.error('RECORDING FAILED, TRY AGAIN','FAILED',{timeOut: 7000})</script>";
}

//alert from present marking
if(@$_GET['pra'] == 'presentsuccess'){

    echo "<script type='text/javascript'>toastr.success('MEMBER MAKED PRESENT','PRESENT',{timeOut: 7000})</script>";
    
}elseif(@$_GET['pra'] == 'presentfailed'){

    echo "<script type='text/javascript'>toastr.error('RECORDING FAILED, TRY AGAIN','FAILED',{timeOut: 7000})</script>";
}


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">ATTENDANCE</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Attendance</a></li>
              <li class="breadcrumb-item active">Member Attendance</li>
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
                    <td><?php echo $memgotten['first_name']." ".$memgotten['last_name']." ".$memgotten['other_name'];?></td>
<!--                    <td><?php // echo $memgotten['phone_number'];?></td>-->
                    <td class="text-center">
                        
                        <?php
                        $Today = date("l");
                            if($Today == "Sunday"){
                        $dateToday = date("Y-m-d");
                        $getattendance = select("SELECT * FROM mem_attendance WHERE member_id='".$memgotten['member_id']."' AND date_reg='$dateToday'");
                        if(!$getattendance){
                        ?>
                        
                <a href="markabsent?mid=<?php echo $memgotten['member_id'];?>" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Absent</a>
                        
                <a href="markpresent?mid=<?php echo $memgotten['member_id'];?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Present</a>
                        <?php }else{
                        foreach($getattendance as $attgotten){
                            
                            if($attgotten['status']=='absent'){
                        ?>
                        
                        <span class="btn btn-danger btn-xs"><?php echo strtoupper($attgotten['status']);?></span>
                        <?php }
                        
                        if($attgotten['status']=='present'){?>
                        <span class="btn btn-success btn-xs"><?php echo strtoupper($attgotten['status']);?></span>
                        <?php } }}}else{ echo " Marking Disabled Until Sunday"; }?>
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