<?php
$dropactive = "membership";
$active = "manmember";
include 'layout/headside.php';

//alert from manage-member
if(@$_GET['mid']);
if(@$_GET['mid'] != ''){
    $mid = @$_GET['mid'];
    echo "<script type='text/javascript'>toastr.success('MEMBER DETIAL FETCH','FETCH SUCCESS',{timeOut: 7000})</script>";
}

$getMember = select("SELECT * FROM membership_tb WHERE  id='$mid'");
foreach($getMember as $member){}


if(isset($_POST['register'])){
//    $memberID = "MEM-".rand(1,100).rand(5,500);
    $memberID = htmlspecialchars(trim($_POST['memberid']));
    $firstName = htmlspecialchars(trim($_POST['firstName']));
    $otherName = htmlspecialchars(trim($_POST['otherName']));
    $lastName = htmlspecialchars(trim($_POST['lastName']));
    $fullName = $firstName." ".$otherName." ".$lastName;
    $dateofbirth = htmlspecialchars(trim($_POST['dob']));
    $residentialAddress = htmlspecialchars(trim($_POST['residentialAddress']));
    $postalAddress = htmlspecialchars(trim($_POST['postalAddress']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $ministry = htmlspecialchars(trim($_POST['ministry']));
    $placeOfBirth = htmlspecialchars(trim($_POST['placeOfBirth']));
    $hometown = htmlspecialchars(trim($_POST['hometown']));
    $occupation = htmlspecialchars(trim($_POST['occupation']));
    $email = htmlspecialchars(trim($_POST['email']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $nationality = htmlspecialchars(trim($_POST['nationality']));
    $maritalstatus = htmlspecialchars(trim($_POST['maritalstatus']));
    $position = htmlspecialchars(trim($_POST['position']));
    $baptismStatus = htmlspecialchars(trim($_POST['baptismStatus']));
    $member_status = htmlspecialchars(trim("YES"));
    $memberType = htmlspecialchars(trim($_POST['memberType']));
    $parent_name = htmlspecialchars(trim($_POST['parent_name']));
    $parental_status = htmlspecialchars(trim($_POST['parental_status']));
    $invitedby = htmlspecialchars(trim($_POST['invitedby']));
    $emergencyPerson = htmlspecialchars(trim($_POST['emergencyPerson']));
    $emergencyContact = htmlspecialchars(trim($_POST['emergencyContact']));
    $relationship = htmlspecialchars(trim($_POST['relationship']));
    $bloodgroup = htmlspecialchars(trim($_POST['bloodgroup']));
//    $photoName = trim($_FILES['image']['name']);
    
//    if($photoName == null || $photoName == ''){
//        $saveWithoutImage = insert("INSERT INTO membership_tb(member_id,last_name,first_name,other_name,full_name,dob,gender,residential_address,postal_address,home_town,phone_number,nationality,place_of_birth,occupation,marital_status,email,group_name,baptism_status,membership_type,parental_name,parental_status,position,member_status,invited_by,emergencyPerson,emergencyContact,relationship,bloodgroup) VALUES('$memberID','$lastName','$firstName','$otherName','$fullName','$dateofbirth','$gender','$residentialAddress','$postalAddress','$hometown','$phone','$nationality','$placeOfBirth','$occupation','$maritalstatus','$email','$ministry','$baptismStatus','$memberType','$parent_name','$parental_status','$position','$member_status','$invitedby','$emergencyPerson','$emergencyContact','$relationship','$bloodgroup')");
        
        
    $revise = update("UPDATE membership_tb SET last_name='$lastName',first_name='$firstName',other_name='$otherName', full_name='$fullName',dob='$dateofbirth',gender='$gender',residential_address='$residentialAddress',postal_address='$postalAddress',
    home_town='$hometown',phone_number='$phone',nationality='$nationality',place_of_birth='$placeOfBirth', occupation='$occupation',marital_status='$maritalstatus', email='$email',group_name='$ministry',baptism_status='$baptismStatus',membership_type='$memberType', parental_name='$parent_name', parental_status='$parental_status', position='$position',member_status='$member_status',emergencyPerson='$emergencyPerson',emergencyContact='$emergencyContact',relationship='$relationship',bloodgroup='$bloodgroup' WHERE member_id='$memberID' ");
        
        
        if($revise){
            $s = "updatesuccess";
            echo "<script>window.location.href='manage-member?ua=$s'</script>";
        }else{
            echo "<script type='text/javascript'>toastr.error('PLEASE TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
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
            <h1 class="m-0 text-dark text-lg">REGISTRATION </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Membership</a></li>
              <li class="breadcrumb-item active">Registration</li>
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
           <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Personal Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Church & Emergency</a></li>
<!--                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Complete</a></li>-->
                </ul>
              </div><!-- /.card-header -->
                <form method="post" action="" enctype="multipart/form-data">
              <div class="card-body">
                <div class="tab-content">
                    
                  <div class="active tab-pane" id="activity">
                    <div class="row">
                      <div class="col-md-4">


                        <div class="form-group">
        <!--                  <label style="color:white;">.<i class="text-danger"></i></label>-->
                              <input type="text" class="form-control" name="memberid" value="<?php echo $member['member_id'];?>" required readonly />
                        </div>


                        <div class="form-group">
                           <label style="color:white;">.<i class="text-danger"></i></label>
                              <input type="text" class="form-control" name="lastName" value="<?php echo $member['last_name'];?>" placeholder="Last Name *" required />
                        </div>

                        <div class="form-group">
        <!--                  <label>Place Of Birth <i class="text-danger">*</i></label>-->
        <!--                     <label style="color:white;">.<i class="text-danger"></i></label>-->
                              <input type="text" class="form-control" name="placeOfBirth" placeholder="Place Of Birth *" value="<?php echo $member['place_of_birth'];?>" required />
                        </div>

                        <div class="form-group">
        <!--                  <label>Residential Address <i class="text-danger">*</i></label>-->
                              <input type="text" class="form-control" name="residentialAddress" value="<?php echo $member['residential_address'];?>" placeholder="Residential Address *" required />
                        </div>
                        <div class="form-group">
        <!--                  <label>Postal Address <i class="text-danger"></i></label> -->
                          <input type="text" class="form-control" name="postalAddress" placeholder="Postal Address" value="<?php echo $member['postal_address'];?>" />
                        </div>
                        <div class="form-group">
        <!--                  <label>Phone <i class="text-danger">*</i></label>-->
                              <input type="tel" class="form-control" name="phone" value="<?php echo $member['phone_number'];?>" placeholder="Phone *" required />
                        </div>




                      </div>
                      <div class="col-md-4">

                        <div class="form-group">
        <!--                  <label>First Name <i class="text-danger">*</i></label>-->
                              <input type="text" class="form-control" name="firstName" value="<?php echo $member['first_name'];?>" placeholder="First Name *" required />
                        </div>

                        <div class="form-group">
                          <label>Date Of Birth <i class="text-danger">*</i></label>
                              <input type="date" class="form-control" name="dob" value="<?php echo $member['dob'];?>" required />
                        </div>


                        <div class="form-group">
        <!--                  <label>Hometown</label>-->
        <!--                    <label style="color:white;">.<i class="text-danger"></i></label>-->
                              <input type="text" class="form-control" name="hometown" value="<?php echo $member['home_town'];?>" placeholder="Home Town *" />
                        </div>
                        <div class="form-group">
        <!--                  <label>Occupation</label>-->
                          <input type="text" class="form-control" name="occupation" value="<?php echo $member['occupation'];?>" placeholder="Occupation *" required  />
                        </div>
                        <div class="form-group">
        <!--                  <label>Email</label>-->
                          <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $member['email'];?>"  />
                        </div>

                        <div class="form-group">
        <!--                  <label>Invited By <i class="text-danger">*</i></label>-->
                          <select class="form-control select2" name="invitedby" data-placeholder="Invited By *" required>
                            <option value="<?php echo $member['invited_by'];?>"><?php echo $member['invited_by'];?></option>
                            <option value="NONE">NO ONE</option>
                              <?php
                              $getmember = select("SELECT member_id, last_name, first_name, other_name FROM membership_tb");
                              if($getmember){
                            foreach($getmember as $memgotten){
                              ?>
                            <option value="<?php echo $memgotten['first_name']." ".$memgotten['last_name'];?>"> <?php echo $memgotten['first_name']." ".$memgotten['last_name'];?> </option>
                              <?php }}?>
                          </select>
                        </div>  

                      </div>
                      <div class="col-md-4">


                        <div class="form-group">
        <!--                  <label>Other Name</label>-->
                          <input type="text" class="form-control" placeholder="Other Name" value="<?php echo $member['other_name'];?>" name="otherName"  />
                        </div>

                        <div class="form-group">
                           <label style="color:white;">.<i class="text-danger"></i></label>
                          <select class="form-control select2" name="gender"data-placeholder="Gender *" required>
                            <option value="<?php echo $member['gender'];?>"><?php echo $member['gender'];?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>

                        <div class="form-group">
        <!--                  <label>Nationality <i class="text-danger">*</i></label>-->
                          <select class="form-control select2" name="nationality" data-placeholder="Nationality *" required>
                        <option value="<?php echo $member['nationality'];?>"><?php echo $member['nationality'];?></option>
                            <option value="Ghana" selected="selected">Ghana</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Togo">Togo</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Ivory Coast">Ivory Coast</option>
                          </select>
                        </div>

                        <div class="form-group">
        <!--                  <label>Marital Status <i class="text-danger">*</i></label>-->
                          <select class="form-control select2" name="maritalstatus" data-placeholder="Marital Status *" required>
                        <option value="<?php echo $member['marital_status'];?>"><?php echo $member['marital_status'];?></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                          </select>
                        </div>


                        <div class="form-group">
        <!--                  <label>Parent Status <i class="text-danger">*</i></label>-->
                          <select class="form-control select2" name="parental_status" data-placeholder="Parent Status *" required>
                    <option value="<?php echo $member['parental_status'];?>"><?php echo $member['parental_status'];?></option>
                            <option value="Alive">Alive</option>
                            <option value="Single">Single ParentHood</option>
                            <option value="Dead">Dead/Deceased</option>
                          </select>
                        </div>
                          
                          
                        <div class="form-group">
<!--                          <label>Parent Name <i class="text-danger">FOR CHILDREN</i></label>-->
                          <select class="form-control select2" name="parent_name" data-placeholder="Parent Name (For Children)">
                        <option value="<?php echo @$member['parent_name'];?>"><?php echo @$member['parent_name'];?></option>
                            <?php
                              $getmember = select("SELECT * FROM membership_tb");
                              if($getmember){
                            foreach($getmember as $memgotten){
                              ?>
                            <option value="<?php echo $memgotten['full_name'];?>"> <?php echo $memgotten['full_name'];?> </option>
                              <?php }}?>
                          </select>
                        </div>

                      </div>            
                    </div>
                  </div>
                    
                     
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                      <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                <!--                  <label>Ministry Wing <i class="text-danger">*</i></label>-->
                                  <select class="form-control select2"  name="ministry" data-placeholder="Select Ministry *" required>
                                <option value="<?php echo $member['group_name'];?>"><?php echo $member['group_name'];?></option>
                                      <?php 
                                      $allmin = select('select * from ministry_tb');
                                        if($allmin){
                                            foreach($allmin as $minget){ ?>
                                    <option value="<?php echo $minget['group_id'];?>"><?php echo $minget['group_name'];?></option>
                                      <?php }}?>

                                      <?php 
                                      $allgmin = select('select * from g_ministry_tb');
                                        if($allgmin){
                                            foreach($allgmin as $gminget){ ?>
                                    <option value="<?php echo $gminget['g_id'];?>"><?php echo $gminget['g_name'];?></option>
                                      <?php }}?>
                                  </select>
                                </div>
                                
                                <div class="form-group">
                <!--                  <label>Position / Worker Status <i class="text-danger">*</i></label>-->
                                  <select class="form-control select2" name="position" data-placeholder="Position / Worker Status *" required>
                                <option value="<?php echo $member['position'];?>"><?php echo $member['position'];?></option>
                                    <option value="General Overseer">General Overseer</option>
                                    <option value="Pastor">Pastor</option>
                                    <option value="Elder">Elder</option>
                                    <option value="Deacon">Deacon</option>
                                    <option value="Deaconess">Deaconess</option>
                                    <option value="Overseer">Overseer</option>
                                    <option value="Shepherd">Shepherd</option>
                                    <option value="Member">Member</option>
                                    <option value="Accountant">Accountant</option>
                                    <option value="Treasurer">Treasurer</option>
                                  </select>
                                </div>
                                
                                
                                 <div class="form-group">
<!--                                   <label style="color:white;">.<i class="text-danger"></i></label>-->
                                  <input type="text" class="form-control" name="relationship" value="<?php echo $member['relationship'];?>" placeholder="Relationship e.g Father *" required />
                                </div>
                                
                                
                            </div>
                          
                          
                            <div class="col-md-4">
                                <div class="form-group">
<!--                                  <label>Baptism Status <i class="text-danger">*</i></label>-->
                                  <select class="form-control select2" name="baptismStatus" data-placeholder="Baptism Status *" required>
                                <option value="<?php echo $member['baptism_status'];?>"><?php echo $member['baptism_status'];?></option>
                                    <option value="Baptised">Baptised</option>
                                    <option value="Not Baptised">Not Baptised</option>
                                  </select>
                                </div>
                                
                                 <div class="form-group">
<!--                                   <label style="color:white;">.<i class="text-danger"></i></label>-->
                                      <input type="text" class="form-control" value="<?php echo $member['emergencyPerson'];?>" name="emergencyPerson" placeholder="Emergency Person *" required />
                                </div>
                                
                                
                                 <div class="form-group">
<!--                                   <label style="color:white;">.<i class="text-danger"></i></label>-->
                                      <input type="text" class="form-control" name="bloodgroup" value="<?php echo $member['bloodgroup'];?>" placeholder="Blood Group"/>
                                </div>
                            </div>
                          
                          
                            <div class="col-md-4">               
                                <div class="form-group">
<!--                                  <label>Membership Type <i class="text-danger">*</i></label>-->
                                  <select class="form-control select2" name="memberType" data-placeholder="Membership Type *" required>
                                    <option value="<?php echo $member['membership_type'];?>"><?php echo $member['membership_type'];?></option>
                                    <option value="Distant">Distant Member</option>
                                    <option value="Local">Local/Regular Member</option>
                                  </select>
                                </div>
                                
                                
                                 <div class="form-group">
<!--                                   <label style="color:white;">.<i class="text-danger"></i></label>-->
                                      <input type="text" class="form-control" name="emergencyContact" value="<?php echo $member['emergencyContact'];?>" placeholder="Emergency Contact *" required />
                                </div>
                                
<!--                                <div class="col-md-4">-->
                            <div class="form-group">
<!--                                <label style="color:white;">.</label>-->
                                <input type="submit" name="register" value="UPDATE MEMBER" onclick="return confirm('UPDATE MEMBER ');" class="btn btn-primary btn-block btn-md" />  
                            </div>
                        </div>
<!--                            </div>-->
                      </div>
                  </div>
                  <!-- /.tab-pane -->
                    

                  <div class="tab-pane" id="settings">
                      <div class="row">
                        <div class="col-md-4">            
                            <div class="form-group">
                              <label>Image</label>
                                  <input type="file" accept="image/*" class="form-control" name="image" />
                            </div>
                          </div>
                          
                        
                      </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
                </form>
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
          </div>
      </div>
    </section>
  </div>

<?php
include 'layout/footer.php';    
?>