<?php
include 'layout/head.php';

$msg='';
$error = '';

$min_sql = select("SELECT * FROM ministry_tb ");

$g_min_sql = select("SELECT * FROM g_ministry_tb ");


if(isset($_POST['btnSubmit'])){

$attendance_id = "ATT-".mt_rand(1,9).mt_rand(1000,9999).mt_rand(100,999);
$ministry_id = trim(htmlspecialchars($_POST['ministry_id']));
$men = trim(htmlspecialchars($_POST['men']));
$women = trim(htmlspecialchars($_POST['women']));
$youth = trim(htmlspecialchars($_POST['youth']));
$children = trim(htmlspecialchars($_POST['children']));
$population = trim(htmlspecialchars($_POST['population']));
$attend_date = trim(htmlspecialchars($_POST['attend_date']));

if(empty($ministry_id) || empty($population) || empty($attend_date)){
      $msg = '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Warning!</strong> Please fill in a inputs.
</div>';
}else{

   $usr_sql= insert("INSERT INTO attendance_tb(attendance_id,ministry_id,men,women,youth,children,population,attend_date) VALUES('".$attendance_id."','".$ministry_id."','$men','$women','$youth','$children','$population','$attend_date')");

   if($usr_sql){

       $msg = '<div class="alert alert-dismissible alert-secondary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong> Attendance marked successfully.
</div>';
   }else{
        $error = '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Try again!</strong> Attendance failed.
</div>';
   }
   }

}


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:auto; padding:30px;background-color:#fff;">

            <h3>HEAD COUNT ATTENDANCE</h3><hr>

            <div class="row">
                <div class="col-md-12">
                    <?php
                        if(isset($msg)){
                            echo $msg;
                        }else{
                            echo $error;
                        }
                    ?>
                </div>
            </div>


                <form action="" method="post" enctype="multipart/form-data">
                     <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Ministry/Group</label>
                                <select name="ministry_id" class="form-control">
                                                    <option value="service1">1st Service</option>
                                                    <option value="service2">2nd Service</option>
                                                    <option value="all">Full Service</option>
                                                <?php foreach($min_sql as $mins){ ?>
                                                    <option value="<?php echo $mins['group_id']; ?>"><?php echo $mins['group_name']; ?></option>
                                                <?php } ?>
                                                <?php foreach($g_min_sql as $g_sql){ ?>
                                                    <option value="<?php echo $g_sql['g_id']; ?>"><?php echo $g_sql['g_name']; ?></option>
                                                <?php } ?>

                                            </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Men / Males</label>
                                <input type="number" min="0" id="men" name="men" value="0" onkeyup="getValues(this.value)" class="form-control price">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Women / Females</label>
                                <input type="number" min="0" id="women"  name="women" value="0" onkeyup="getValues(this.value)" class="form-control price">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Youth</label>
                                <input type="number" min="0" id="youth"  name="youth" value="0" onkeyup="getValues(this.value)" class="form-control price">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Children</label>
                                <input type="number" min="0" id="children" name="children" value="0" onkeyup="getValues(this.value)" class="form-control price">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Total Populaton</label>
                                <input type="number" min="0" id="population"  name="population" value="0" readonly class="form-control price">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Date</label>
                                <input type="date" name="attend_date" class="form-control" >
                            </div>
                            <div class="col-md-6 form-group">
                                <label>.</label>
                                <input type="submit" name="btnSubmit" class="btn btn-primary btn-block" value="Mark Attendance">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <div class="col-md-4"></div>
</div>


<?php
include 'layout/foot.php';
?>
<script language="javascript">
function getValues(val){

var numVal1=parseInt(document.getElementById("men").value);
var numVal2=parseInt(document.getElementById("women").value);
var numVal3=parseInt(document.getElementById("children").value);
var numVal4=parseInt(document.getElementById("youth").value);

var totalValue = numVal1 + numVal2 + numVal3 + numVal4;

document.getElementById("population").value = totalValue;
}
</script>
