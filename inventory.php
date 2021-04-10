<?php
$dropactive = "inventory";
$active = "addinventory";
include 'layout/headside.php';

$serial = 'RINV-'.mt_rand(23,698).mt_rand(700,998);
//$sel_product = select("SELECT * FROM inventory");

$_SESSION['user'];

if(isset($_POST['add_it'])){
    $item_id = trim(htmlspecialchars($_POST['item_id1']));
    $item_name = trim(htmlspecialchars($_POST['item_name1']));
    $item_state = trim(htmlspecialchars($_POST['item_state1']));
    $item_location = trim(htmlspecialchars($_POST['item_location']));
    $item_quantity = trim(htmlspecialchars($_POST['item_quantity1']));
    $item_value = trim(htmlspecialchars($_POST['item_value1']));
    $active = trim(htmlspecialchars("Active"));

 $add_items = insert("INSERT INTO inventory(branch_id,item_id,item_name,item_status,item_location,item_quantity,item_value,status,dateInsert)VALUES('$churchID','".$_POST['item_id1']."','".$_POST['item_name1']."','".$_POST['item_state1']."','".$_POST['item_location']."','".$_POST['item_quantity1']."','".$_POST['item_value1']."','$active',CURDATE())");

     if($add_items){
         $s = "success";
         echo "<script>window.location.href='manage-inventory?m=$s';</script>";
     }else{
         echo "<script type='text/javascript'>toastr.error('Something happened, Try Again','FAILED',{timeOut: 7000})</script>";
     }
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">NEW INVENTORY</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventory</a></li>
              <li class="breadcrumb-item active">New Inventory</li>
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
            <div class="col-md-12">
                <div class="card card-default">
<!--
                  <div class="card-header">
                    <h3 class="card-title">CREATE ACCOUNT</h3>
                    <div class="card-tools">
                    </div>
                  </div>
-->
                    <form class="form" action="" method="post" enctype="multipart/form-data">

                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            
                            <div class="form-group">
                              <label>Item ID <i class="text-danger">*</i></label>
                                  <input type="text" class="form-control" name="item_id1" value='<?php echo $serial;?>' required readonly />
                            </div>    
                        
                            <div class="form-group">
                              <label>Item Quantity <i class="text-danger">*</i></label>
                                  <input type="number" min="1" class="form-control" name="item_quantity1" placeholder="Quantity" required />
                            </div>
                            <div class="form-group">
                              <label>Date <i class="text-danger">*</i></label>
                                <input type='date' name='item_date1' class='form-control' value='<?php echo date('Y-m-d');?>' readonly>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-4">
                            
                            
                            <div class="form-group">
                              <label>Item Name <i class="text-danger">*</i></label>
                                  <input type='text' name='item_name1' class='form-control' placeholder="Item Name" required>
                            </div>
                            
                            
                             <div class="form-group">
                              <label>Location<i class="text-danger">*</i></label>
                              <select name='item_location' id='item_location' class='form-control select2' data-placeholder="Select Location" required >
                                    <option></option>
                                    <option value='Media room'>Media room</option>
                                    <option value='Lead Pastor office'>Lead Pastor's office</option>
                                    <option value='Main Auditorium'>Main Auditorium</option>
                                    <option value='Storeroom '>Storeroom </option>
                                    <option value=' Rehearsal room'> Rehearsal room</option>
                                    <option value='Pastoral Care Office'>Pastoral Care Office</option>
                                    <option value='Associate Pastor Office'>Associate Pastor's Office</option>
                                    <option value='No Limit Church '>No Limit Church </option>
                                    <option value='Sunday Service'>Sunday Service</option>
                                    <option value=' Ushers Room'> Ushers Room</option>
                                    <option value='Guest Pastor Room'>Guest Pastor's Room</option>
                                    <option value=' Kitchen '> Kitchen </option>
                                    <option value='GOS '>GOS </option>
                                    <option value='General '>General </option>
                                </select>
                            </div>
                            
                    
                        </div>
                        
                        
                        <div class="col-md-4">
                            
                            <div class="form-group">
                            <label>Item State <i class="text-danger">*</i></label>
                            <select name='item_state1' class='form-control select2' data-placeholder="Select Item State" required>
                                <option></option>
                                <option value='Excellent'>Excellent</option>
                                <option value='Good'>Good</option>
                                <option value='Bad'>Bad</option>
                                <option value='Worse'>Worse</option>
                                <option value='Damaged'>Damaged</option>
                            </select>
                            </div>
                            
                             <div class="form-group">
                              <label>Estimated Value <i class="text-danger">*</i></label>
                                  <input type='number' min="1" name='item_value1' class='form-control' placeholder="Value" required>
                            </div>
                            
                            <div class="form-group">
                                <label style="color:white;">.</label>
                                <input type="submit" name="add_it" onclick="return confirm('ADD TO INVENTORY ?');" value="ADD TO INVENTORY" class="btn btn-primary btn-block btn-md" />  
                            </div>
                        </div>
                    </div>
                  </div>
                    </form>
<!--                  <div class="card-footer"></div>-->
                </div>
            </div>  
            
            
        </div>
      </div>
    </section>
  </div>

<?php include 'layout/footer.php'; ?>
<script>
function m_type(val){
    $('#loader').html("Please Wait...");
    $('#memt').load('mem-type.php?mtp='+val, function(){
    $('#loader').html("");
   });
}
</script>