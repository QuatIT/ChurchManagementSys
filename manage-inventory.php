<?php
$dropactive = "inventory";
$active = "maninventory";
include 'layout/headside.php';

if(@$_GET['m']);
if(@$_GET['m'] == 'success'){
    echo "<script type='text/javascript'>toastr.success('ITEM ADDED TO INVENTORY','SAVE SUCCESSFUL',{timeOut: 7000})</script>";
}
if(@$_GET['m'] == 'updatesuccess'){
    echo "<script type='text/javascript'>toastr.success('ITEM UPDATED','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['fa'] == 'flagsuccess'){
    $vid = @$_GET['vid'];
    echo "<script type='text/javascript'>toastr.success('ITEM $vid FLAGGED','SUCCESS',{timeOut: 7000})</script>";
}elseif(@$_GET['fa'] == 'flagerror'){
    $vid = @$_GET['vid'];
    echo "<script type='text/javascript'>toastr.error('ITEM $vid FLAGGING FAILED','FAILED',{timeOut: 7000})</script>";
}
if(@$_GET['ufa'] == 'unflagsuccess'){
    $vid = @$_GET['vid'];
    echo "<script type='text/javascript'>toastr.success('ITEM $vid UNFLAGGED','SUCCESS',{timeOut: 7000})</script>";
}elseif(@$_GET['ufa'] == 'unflagerror'){
    $vid = @$_GET['vid'];
    echo "<script type='text/javascript'>toastr.error('ITEM $vid UNFLAGGING FAILED','FAILED',{timeOut: 7000})</script>";
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">MANAGE INVENTORY</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventory</a></li>
              <li class="breadcrumb-item active">Manage Inventory</li>
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
                    <th>ID</th>
                    <th>ITEM</th>
                    <th>LOCATION</th>
                    <th>STATUS</th>
                    <th>QUANTITY</th>
                    <th>VALUE</th>
                    <th class="text-center">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getmember = select("SELECT * FROM inventory WHERE status='Active' AND branch_id='$churchID'");
                      if($getmember){
                    foreach($getmember as $memgotten){
                ?>
                  <tr>
                    <td><?php echo $memgotten['item_id'];?></td>
                    <td><?php echo $memgotten['item_name'];?></td>
                    <td><?php echo $memgotten['item_location'];?></td>
                       <td style="color:white;">
                        <?php if( $memgotten['item_status'] == 'Excellent'){?>
                        <a class="btn btn-success btn-xs "><?php echo  $memgotten['item_status'];?></a>
                        <?php }?>
                        <?php if( $memgotten['item_status'] == 'Good'){?>
                        <a class="btn btn-primary btn-xs "><?php echo  $memgotten['item_status'];?></a>
                        <?php }?>
                        <?php if( $memgotten['item_status'] == 'Bad'){?>
                        <a class="btn btn-warning btn-xs "><?php echo  $memgotten['item_status'];?></a>
                        <?php }?>
                        <?php if( $memgotten['item_status'] == 'Worse'){?>
                        <a class="btn btn-secondary btn-xs "><?php echo  $memgotten['item_status'];?></a>
                        <?php }?>
                        <?php if( $memgotten['item_status'] == 'Damaged'){?>
                        <a class="btn btn-danger btn-xs "><?php echo  $memgotten['item_status'];?></a>
                        <?php }?>
                    </td>
                    <td><?php echo $memgotten['item_quantity'];?></td>
                    <td><?php echo $memgotten['item_value'];?></td>
                    <td class="text-center">
                        <a  href="update-inventory?iid=<?php echo encode5t($memgotten['id']);?>" class="btn btn-info btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a  href="flag-inventory?vid=<?php echo encode5t($memgotten['id']);?>" onclick="return confirm('FLAG ITEM ?');" class="btn btn-danger btn-sm">
                            <i class="fa fa-flag"></i> Flag
                        </a>
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