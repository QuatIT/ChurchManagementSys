
<?php
// session_start();
include 'layout/head.php';

$min_sql = select("SELECT * FROM ministry_tb ");


#$del=delete("DELETE FROM membership_tb WHERE fullname= '' ");


$msg='';
$error='';

$me_sql = select("SELECT * FROM membership_tb");

if(isset($_POST['btnProceed'])){
    $s_mem = trim(htmlspecialchars($_POST['s_mem']));
    $s_min = trim(htmlspecialchars($_POST['s_min']));

    $member_id= "MEM-".mt_rand(1,9).mt_rand(100,999);

    if(empty($s_mem) || empty($s_min) ){
        $msg = '<div class="alert alert-dismissible alert-warning">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Warning!</strong> Please fill in all inputs.
                </div>';
    }else{

    $sql_min = insert("INSERT INTO membership_tb(member_status,group_name,member_id) VALUES('$s_mem','$s_min','$member_id')");

    if($sql_min){
        echo "<script>window.location.href='create_member.php?s={$s_mem}&mid={$member_id}'</script>";
    }

    }

}

if(isset($_POST['btnSubmit'])){
$lname= trim(htmlspecialchars($_POST['lastname']));
$fname= trim(htmlspecialchars($_POST['firstname']));
$othernames= trim(htmlspecialchars($_POST['othername']));

    $full_name = $lname." ".$othernames." ".$fname;

$dob= trim(htmlspecialchars($_POST['dob']));
$gender= trim(htmlspecialchars($_POST['gender']));
$residentialaddress= trim(htmlspecialchars($_POST['residential_address']));
$postal_address= trim(htmlspecialchars($_POST['postal_address']));
$home_town= trim(htmlspecialchars($_POST['home_town']));
$p_number = trim(htmlspecialchars($_POST['phone_number']));

$nationality= trim(htmlspecialchars($_POST['nationality']));
$pob= trim(htmlspecialchars($_POST['place_of_birth']));
$occupation= trim(htmlspecialchars($_POST['occupation']));
$mstatus= trim(htmlspecialchars($_POST['marital_status']));
$email = trim(htmlspecialchars($_POST['email']));

$p_status= trim(htmlspecialchars($_POST['parental_status']));

$p_name = trim(htmlspecialchars($_POST['parent_name']));
$g_name = trim(htmlspecialchars($_POST['group_name']));
$b_status = trim(htmlspecialchars($_POST['baptism_status']));
$c_status = trim(htmlspecialchars($_POST['confirmation_status']));
$m_type= trim(htmlspecialchars($_POST['membership_type']));
$p_name= trim(htmlspecialchars($_POST['parent_name']));
$position = trim(htmlspecialchars($_POST['position']));
//$image = trim(htmlspecialchars($_POST['image']));

//$member_id= trim(mt_rand(1,9).mt_rand(100,999));
//$_SESSION['m_id']=$member_id;


     //image upload
        $fileName =trim($_FILES['image']['tmp_name']);
        $image = explode(".",trim($_FILES['image']['name']));
        $member_image = round(microtime(true)) . '.' . end($image);
        //$new_image = $_POST['con_name'] . '.' . end($image);
        move_uploaded_file($fileName, "upload/image/{$member_image}");

$member = update("UPDATE membership_tb SET last_name='$lname', first_name='$fname', other_name='$othernames', dob='$dob', gender='$gender', residential_address='$residentialaddress', postal_address='$postal_address', home_town='$home_town', phone_number='233$p_number', nationality='$nationality', place_of_birth='$pob', occupation='$occupation', marital_status='$mstatus', email='$email', group_name='$g_name', baptism_status='$b_status', confirmation_status='$c_status', membership_type='$m_type', parental_name='$p_name', parental_status='$p_status', position='$position', member_image='$member_image', full_name='$full_name' WHERE member_id='".$_GET['mid']."' ");


//$member= insert("INSERT INTO membership_tb(last_name,first_name,other_name,dob,gender,residential_address,postal_address, home_town,phone_number,nationality,place_of_birth,occupation,marital_status, email,group_name,baptism_status,confirmation_status,membership_type,parental_name, parental_status, position,member_image) VALUES('".$lname."', '".$fname."', '".$othernames."', '".$dob."', '".$gender."', '".$residentialaddress."','".$postal_address."','".$home_town."','".$p_number."','".$nationality."','".$pob."', '".$occupation."', '".$mstatus."','".$email."','".$g_name."','".$b_status."','".$c_status."','".$m_type."','".$p_name."','".$p_status."' ,'".$position."','".$member_image."' )");

   if($member){
      echo "<script>alert('Registration Was Successful')
                    window.location.href='create_member.php'</script>";
    }

}

?>

<?php if(empty($_GET['s']) || empty($_GET['mid']) ){ ?>

<div id="modal">
    <div class="modalconent" style="width:300px;">
         <h1></h1>

<!--        <p>fasfsdfasfsfsdfsdfsdsffsd</p>-->

        <form action="" method="post">
            Are you a member?
                                <select class="form-control" name="s_mem" onchange="adr_code(this.value);">
                                    <option></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>

            Which Ministry do you belong to?
                                            <select class="form-control" name="s_min">
                                                <option></option>
                                                <?php foreach($min_sql as $min_row){ ?>
                                                <option value="<?php echo $min_row['group_id']; ?>"><?php echo $min_row['group_name']; ?></option>
                                                <?php } ?>
                                            </select>
            <br>
            <input type="submit" class="btn btn-primary" value="Proceed" name="btnProceed">
<!--            <button id="button" class="btn btn-dark pull-right">Close</button>-->
            <a href="dashboard.php" class="btn btn-dark pull-right">Close</a>
        </form>

    </div>
</div>

<?php } ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">

            <h3>MEMBERSHIP REGISTRATION</h3>

  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active show" data-toggle="tab" href="#home">Personal Information</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#profile">Church Information</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  data-toggle="tab"  href="#fini">Complete</a>
  </li>
<!--
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </li>
-->
</ul>
<div id="myTabContent" class="tab-content">
    <form action="" method="post" enctype="multipart/form-data" class="frmSearch">
  <div class="tab-pane fade active show" id="home">
      <div class="container-fluid">
        <div class="row" style="padding-top:1%;">

   <div class="col-md-4" style="z-index:1;">
        First Name <input type="text" name="firstname" class="form-control"required>
      </div>
   <div class="col-md-4" style="z-index:1;">
        Other Name <input type="text" name="othername" class="form-control" required>
      </div>
   <div class="col-md-4" style="z-index:1;">
        Last Name <input type="text" name="lastname" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1;">
        Date of Birth <input type="date" name="dob" class="form-control">
      </div>



   <div class="col-md-4" style="z-index:1;">
        Place of Birth <input type="text" name="place_of_birth" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1;">
       Gender <select name="gender" class="form-control"><option></option><option>Male</option><option>Female</option></select>
      </div>

   <div class="col-md-4" style="z-index:1;">
        Residential Address <input type="text" name="residential_address" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1;">
        Home Town <input type="text" name="home_town" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1;">
        Nationality <input type="text" name="nationality" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1;">
        Postal Address <input type="text" name="postal_address" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1;">
        Occupation <input type="text" name="occupation" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1;">
        Marital Status <select name="marital_status" class="form-control"><option></option><option>Single</option><option>Married</option><option>Divorced</option><option>Widow</option></select>
      </div>

   <div class="col-md-4" style="z-index:1;">
        Parental Status <select name="parental_status" class="form-control"><option></option><option>Living</option><option>Deceased</option></select>
      </div>

   <div class="col-md-4" style="z-index:1;">
        Email <input type="email" name="email" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1;">
        Phone Number <input type="text" name="phone_number" placeholder='format: 243326789' class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1;">
       Parent Name <small class="text-danger">(FOR CHILDREN/YOUTH MINISTRY ONLY)</small> <!-- <input type="text" id="search-box" name="parent_name" class="form-control">-->
       <select class="selectpicker form-control" name="parent_name" data-live-search="true">
  <option data-tokens=""></option>
           <?php foreach($me_sql as $me_row){ ?>
  <option data-tokens="<?php echo $me_row['full_name']; ?>" value="<?php echo $me_row['member_id']; ?>"><?php echo $me_row['full_name']; ?></option>
           <?php } ?>
</select>

      </div>

   <div class="col-md-4" style="z-index:1;">
        Position <select name="position" class="form-control"><option></option><option>Member</option><option>Elder</option><option>Deacon</option><option>Deaconess</option><option>Pastor</option></select>
      </div>


   <div class="col-md-4" style="z-index:1;">
        Phone Number <input type="text" name="phone_number" class="form-control">
      </div>

<!--
            <div class="nav-item">
                <br>
        <a class="btn btn-primary" data-toggle="tab" href="#profile">CONTINUE</a>
                </div>
-->

          </div>
      </div>
  </div>
  <div class="tab-pane fade" id="profile">
     <div class="container-fluid">
        <div class="row" style="padding-top:1%;margin-top:-100px;">

   <div class="col-md-4 move"  style="margin-top:-250px;z-index:2;">
        Group/Ministry Name
                            <select name="group_name" class="form-control">
                                <option></option>
                             <?php foreach($min_sql as $mrow){ ?>
                                <option value="<?php echo $mrow['group_id']; ?>"><?php echo $mrow['group_name']; ?></option>
                            <?php } ?>
                            </select>
      </div>

   <div class="col-md-4 move" style="margin-top:-250px;z-index:2;">
        Baptism Status <select name="baptism_status" class="form-control"><option></option><option>Baptised</option><option>Not Baptised</option></select>
      </div>

    <?php if($_GET['s']=="Yes"){ ?>
   <div class="col-md-4 move" style="margin-top:-250px;z-index:2;">
        Confirmation Status <select name="confirmation_status" class="form-control"><option></option><option>Confirmed</option><option>Not Confirmed</option></select>
      </div>
    <?php } ?>

    <?php if($_GET['s']=="Yes"){ ?>
   <div class="col-md-4 move" style="margin-top:-180px;z-index:2;">
        Membership Type <select name="membership_type" class="form-control"><option></option><option>Distant Membership</option><option>Regular/Local Member</option></select>
      </div>
            <?php } ?>

    <?php if($_GET['s']=="No"){ ?>
   <div class="col-md-4 move" style="margin-top:-250px;z-index:2;">
        Introduced by <input type="text" class="form-control" name="invited_by">
      </div>
            <?php } ?>

         </div>
      </div>
  </div>
  <div class="tab-pane fade" id="fini">

   <div class="col-md-4 move"  style="margin-top:-250px;">

       <label><b>Upload Image</b></label> <input type="file" class="form-control-file" name="image">
      </div>

   <div class="col-md-12 move">
       <br>
        <p class="text-danger">Please make sure all fields are correct before Submit</p>
      </div>

   <div class="col-md-4 move"  >
    <input type="submit" class="btn btn-primary" name="btnSubmit"  value="Submit">
      </div>


  </div>
<!--
  <div class="tab-pane fade" id="dropdown2">
    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
  </div>
-->
            </form>
</div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>



<?php
include 'layout/foot.php';
?>

 <script>
function adr_code(val){
	// load the select option data into a div
        $('#loader').html("Please Wait...");
        $('#dr').load('mem_opt.php?id='+val, function(){
		$('#loader').html("");
       });
//
//        $('#dr1').load('adr_code1.php?id='+val, function(){
//		$('#loader').html("");
//       });
}
</script>

<!--Auto Complete-->
     <script type="text/javascript">
                 $(document).ready(function()
				 		{
                    $("#search-box").autocomplete(

				{
                        source:'pages/search_parent.php',
                        minLength:1
                    });
                  });




        </script>
