<?php
include 'layout/head.php';



@$member_id = $_GET['member_id'];

$edit_member= select("SELECT * FROM membership_tb WHERE member_id = '$member_id' ");
foreach($edit_member as $row){}



  if(isset($_POST['btnSubmit'])){


    $last_name= trim(htmlspecialchars($_POST['lastname']));
    $first_name= trim(htmlspecialchars($_POST['firstname']));
    $other_name= trim(htmlspecialchars($_POST['othername']));
    $dob= trim(htmlspecialchars($_POST['dob']));
    $gender= trim(htmlspecialchars($_POST['gender']));
    $residential_address= trim(htmlspecialchars($_POST['residential_address']));
    $postal_address= trim(htmlspecialchars($_POST['postal_address']));
    $home_town= trim(htmlspecialchars($_POST['home_town']));
    $phone_number = trim(htmlspecialchars($_POST['phone_number']));

    $nationality= trim(htmlspecialchars($_POST['nationality']));
    $place_of_birth= trim(htmlspecialchars($_POST['place_of_birth']));
    $occupation= trim(htmlspecialchars($_POST['occupation']));
    $marital_status= trim(htmlspecialchars($_POST['marital_status']));
    $email = trim(htmlspecialchars($_POST['email']));



    $group_name = trim(htmlspecialchars($_POST['group_name']));
    $baptism_status = trim(htmlspecialchars($_POST['baptism_status']));
    $confirmation_status = trim(htmlspecialchars($_POST['confirmation_status']));
    $membership_type= trim(htmlspecialchars($_POST['membership_type']));
    $parent_Name= trim(htmlspecialchars($_POST['parent_name']));
    $parent_status= trim(htmlspecialchars($_POST['parental_status']));
    $position = trim(htmlspecialchars($_POST['position']));
//    $member_image = trim(htmlspecialchars($_POST['image']));



     //image upload
        $fileName =trim($_FILES['image']['tmp_name']);
        $image = explode(".",trim($_FILES['image']['name']));
        $member_image = round(microtime(true)) . '.' . end($image);
        //$new_image = $_POST['con_name'] . '.' . end($image);
        move_uploaded_file($fileName, "upload/image/{$member_image}");




    $revise = update("UPDATE membership_tb SET last_name ='$last_name',first_name='$first_name',other_name='$other_name',dob='$dob',gender='$gender',residential_address='$residential_address',postal_address='$postal_address',
    home_town='$home_town',phone_number='$phone_number',nationality='$nationality',place_of_birth='$place_of_birth', occupation='$occupation',marital_status='$marital_status', email='$email',group_name='$group_name',baptism_status='$baptism_status',confirmation_status='$confirmation_status',membership_type='$membership_type', parental_name='$parent_Name', parental_status='$parent_status', position='$position',member_image='$member_image' WHERE member_id='$member_id' ");


  if($revise){
    echo "<script>alert('Information Has Been Updated')
                    window.location.href='manage_member.php'</script>";
  }
  }


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">

            <h3>EDIT MEMBER DETAIL</h3>

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
    <form action="" method="post" enctype="multipart/form-data">
  <div class="tab-pane fade active show" id="home">
      <div class="container-fluid">
        <div class="row" style="padding-top:1%;">

   <div class="col-md-4" style="z-index:1">
        First Name <input type="text" name="firstname" value="<?php echo $row['first_name']; ?>" class="form-control">
      </div>
   <div class="col-md-4" style="z-index:1">
        Other Name <input type="text" name="othername" value="<?php echo $row['other_name']; ?>" class="form-control">
      </div>
   <div class="col-md-4" style="z-index:1">
        Last Name <input type="text" name="lastname" value="<?php echo $row['last_name']; ?>" class="form-control">
      </div>

   <div class="col-md-4"  style="z-index:1">
        Date of Birth <input type="date" name="dob" value="<?php echo $row['dob']; ?>"class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1">
        Place of Birth <input type="text" name="place_of_birth" value="<?php echo $row['place_of_birth']; ?>" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1">
       Gender <select name="gender" class="form-control" value="<?php echo $row['gender']; ?>"><option></option><option>Male</option><option>Female</option></select>
      </div>

   <div class="col-md-4" style="z-index:1">
        Residential Address <input type="text" name="residential_address" value="<?php echo $row['residential_address']; ?>" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1">
        Home Town <input type="text" name="home_town" value="<?php echo $row['home_town']; ?>" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1">
        Nationality <input type="text" name="nationality" value="<?php echo $row['nationality']; ?>"class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1">
        Postal Address <input type="text" name="postal_address" value="<?php echo $row['postal_address']; ?>" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1">
        Occupation <input type="text" name="occupation" value="<?php echo $row['occupation']; ?>" class="form-control">
      </div>

   <div class="col-md-4" style="z-index:1">
        Marital Status <select name="marital_status" class="form-control" value="<?php echo $row['marital_status']; ?>"><option></option><option>Single</option><option>Married</option><option>Divorced</option><option>Widow</option></select>
      </div>

   <div class="col-md-4" style="z-index:1">
        Parental Status <select name="parental_status" class="form-control"><option></option><option>Living</option><option>Deceased</option></select>
      </div>

   <div class="col-md-4" style="z-index:1">
        Email <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
      </div>

   <div class="col-md-4" style="z-index:1">
        Phone Number <input type="text" name="phone_number" class="form-control" value="<?php echo $row['phone_number']; ?>">
      </div>

   <div class="col-md-4" style="z-index:1">
        Parent Name <input type="text" name="parent_name" class="form-control" value="<?php echo $row['parental_name']; ?>">
      </div>

   <div class="col-md-4" style="z-index:1">
        Position <select name="position" class="form-control" value="<?php echo $row['position']; ?>"><option></option><option>Member</option><option>Elder</option><option>Deacon</option><option>Deaconess</option><option>Pastor</option></select>
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

   <div class="col-md-4 move"  style="margin-top:-250px; z-index:2 ">
        Group/Ministry Name <select name="group_name" class="form-control"><option></option><option>Youth</option><option>Children</option><option>Men</option>><option>Women</option></select>
      </div>

   <div class="col-md-4 move" style="margin-top:-250px;z-index:2">
        Baptism Status <select name="baptism_status" class="form-control"><option></option><option>Baptised</option><option>Not Baptised</option></select>
      </div>

   <div class="col-md-4 move" style="margin-top:-250px;z-index:2">
        Confirmation Status <select name="confirmation_status" class="form-control"><option></option><option>Confirmed</option><option>Not Confirmed</option></select>
      </div>

   <div class="col-md-4 move" style="margin-top:-180px;z-index:2">
        Membership Type <select name="membership_type" class="form-control"  ?>"><option></option><option>Distant Membership</option><option>Regular/Local Member</option></select>
      </div>

         </div>
      </div>
  </div>
  <div class="tab-pane fade" id="fini">

   <div class="col-md-4 move"   style="margin-top:-180px; z-index:3">

   Upload Image <input type="file" class="form-control-file" name="image">
      </div>

   <div class="col-md-12 move">
       <br>
        <p class="text-danger">Please make sure all fields are correct before Submit</p>
      </div>

   <div class="col-md-4 move"   >
    <input type="submit" class="btn btn-primary" name="btnSubmit" value="UPDATE">
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
