<?php
$dropactive = "inventory";
$active = "maninventory";
include 'layout/headside.php';

//$serial = 'RINV-'.mt_rand(23,698).mt_rand(700,998);
//$sel_product = select("SELECT * FROM inventory");
if($_GET['iid']){
    $iid = decode5t($_GET['iid']);
}
$getInventory = select("SELECT * FROM inventory WHERE id='$iid'");
if($getInventory){
    foreach($getInventory as $gotInventory){}
}


//if(isset($_POST['add_it'])){
//    $item_id = trim(htmlspecialchars($_POST['item_id1']));
//    $item_name = trim(htmlspecialchars($_POST['item_name1']));
//    $item_state = trim(htmlspecialchars($_POST['item_state1']));
//    $item_location = trim(htmlspecialchars($_POST['item_location']));
//    $item_quantity = trim(htmlspecialchars($_POST['item_quantity1']));
//    $item_value = trim(htmlspecialchars($_POST['item_value1']));
//    // $item_date = trim(htmlspecialchars($_POST['item_date1']));
//
// $add_items = insert("INSERT INTO inventory(item_id,item_name,item_status,item_location,item_quantity,item_value,dateInsert)VALUES('".$_POST['item_id1']."','".$_POST['item_name1']."','".$_POST['item_state1']."','".$_POST['item_location']."','".$_POST['item_quantity1']."','".$_POST['item_value1']."',CURDATE())");
//
//     if($add_items){
//         $s = "success";
//         echo "<script>window.location.href='manage-inventory?m=$s';</script>";
//     }else{
//         echo "<script type='text/javascript'>toastr.error('Something happened, Try Again','FAILED',{timeOut: 7000})</script>";
//     }
//}


if (isset($_POST['updateItem'])) {
    $item_id = trim($_POST['item_id']);
    $item_name = trim($_POST['item_name']);
    $item_status = trim($_POST['item_status']);
    $item_quantity = trim($_POST['item_quantity']);
    $item_location = trim($_POST['item_location']);
    $item_value = trim($_POST['item_value']);
    if(empty($item_name)){
            echo "<script type='text/javascript'>toastr.error('Please fill in a inputs','FAILED',{timeOut: 7000})</script>";
    }else{
        $V12ext3gtwse = update("UPDATE inventory SET item_name='$item_name', item_status='$item_status', item_quantity='$item_quantity', item_location='$item_location', item_value='$item_value' WHERE item_id='$item_id'");
        if($V12ext3gtwse){
                $s = "updatesuccess";
                echo "<script>window.location.href='manage-inventory?m=$s';</script>";       
        } else {
                echo "<script type='text/javascript'>toastr.error('Something Happened','FAILED',{timeOut: 7000})</script>";
        }
    }
}
?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">UPDATE INVENTORY <?php echo $gotInventory['item_id'];?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="manage-inventory">Manage Inventory</a></li>
              <li class="breadcrumb-item active">Update Inventory</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

      
    <section class="content">
      <div class="container-fluid"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    
                <form class="form" action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Item ID <i class="text-danger">*</i></label>
                                <input type="text" class="form-control" name="item_id" value='<?php echo $gotInventory['item_id'];?>' required readonly />
                            </div>    
                            <div class="form-group">
                              <label>Item Quantity <i class="text-danger">*</i></label>
                                <input type="number" min="1" class="form-control" name="item_quantity" value="<?php echo $gotInventory['item_quantity'];?>" required />
                            </div>
                            <div class="form-group">
                              <label>Date <i class="text-danger">*</i></label>
                                <input type='date' name='item_date' class='form-control' value='<?php echo $gotInventory['dateInsert'];?>' readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Item Name <i class="text-danger">*</i></label>
                                  <input type='text' name='item_name' class='form-control' value="<?php echo $gotInventory['item_name'];?>" required>
                            </div>
                             <div class="form-group">
                              <label>Location<i class="text-danger">*</i></label>
                              <select name='item_location' id='item_location' class='form-control select2' data-placeholder="Select Location" required >
                                <option value="<?php echo $gotInventory['item_location'];?>"><?php echo $gotInventory['item_location'];?></option>
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
                            <select name='item_status' class='form-control select2' required>
                                <option value="<?php echo $gotInventory['item_status'];?>"><?php echo $gotInventory['item_status'];?></option>
                                <option value='Excellent'>Excellent</option>
                                <option value='Good'>Good</option>
                                <option value='Bad'>Bad</option>
                                <option value='Worse'>Worse</option>
                                <option value='Damaged'>Damaged</option>
                            </select>
                            </div>
                             <div class="form-group">
                                <label>Estimated Value <i class="text-danger">*</i></label>
                            <input type='number' min="1" name='item_value' class='form-control' value="<?php echo $gotInventory['item_value'];?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label style="color:white;">.</label>
                                <input type="submit" name="updateItem" onclick="return confirm('UPDATE ITEM ?');" value="UPDATE ITEM" class="btn btn-primary btn-block btn-md" />  
                            </div>
                        </div>
                    </div>
                  </div>
                    </form>
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