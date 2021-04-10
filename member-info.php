<?php
$dropactive = "membership";
$active = "managemember";
include 'layout/headside.php';

//alert from manage-member
if(@$_GET['mid']);
if(@$_GET['mid'] != ''){
    $mid = @$_GET['mid'];
    echo "<script type='text/javascript'>toastr.success('Member Fetched','Success',{timeOut: 7000})</script>";
}

$getMember = select("SELECT * FROM membership_tb WHERE  member_id='$mid'");
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
        
    $revise = update("UPDATE membership_tb SET last_name='$lastName',first_name='$firstName',other_name='$otherName', full_name='$fullName',dob='$dateofbirth',gender='$gender',residential_address='$residentialAddress',postal_address='$postalAddress',
    home_town='$hometown',phone_number='$phone',nationality='$nationality',place_of_birth='$placeOfBirth', occupation='$occupation',marital_status='$maritalstatus', email='$email',group_name='$ministry',baptism_status='$baptismStatus',membership_type='$memberType', parental_name='$parent_name', parental_status='$parental_status', position='$position',member_status='$member_status',emergencyPerson='$emergencyPerson',emergencyContact='$emergencyContact',relationship='$relationship',bloodgroup='$bloodgroup' WHERE member_id='$memberID' ");
        
        
        if($revise){
            $s = "updatesuccess";
            echo "<script>window.location.href='manage-member?ua=$s'</script>";
        }else{
            echo "<script type='text/javascript'>toastr.error('PLEASE TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
        }

}




if(isset($_POST['upimage'])){  
    //file properties
    $file_name=$_FILES['image']['name'];
    $file_tmp=$_FILES['image']['tmp_name'];
    $file_size= $_FILES['image']['size'];
    $file_error = $_FILES['image']['error'];
    //etract extension
    $file_ext =explode('.',$file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed = array('image','jpg','jpeg','png');

    if(in_array($file_ext, $allowed)){
        if($file_error===0){
            if($file_size <= 4097152){
             $file_name_new=$mid.'-'.$member['last_name'].'.'.$file_ext;
                $file_destination = 'uploads/member/'.$file_name_new;
                //check if file has been loaded earlier and move it from temporary location into folder
                if(move_uploaded_file($file_tmp,$file_destination)){
                           
        //update member image
        $updateIMage = update("UPDATE membership_tb SET member_image='$file_name_new' WHERE member_id='$mid'");
   
        if($updateIMage){
            $s = "success";
            echo "<script>window.location.href='".$_SERVER['PHP_SELF']."?mid=$mid'</script>";
        }else{
            echo "<script type='text/javascript'>toastr.error('Try Again Later','Image Upload Failed',{timeOut: 10000})</script>";
        }
                }else{
                    echo "<script type='text/javascript'>toastr.error('Image Not Moved TGo Uploads','Error',{timeOut: 10000})</script>";
                }
            }else{
                echo "<script type='text/javascript'>toastr.error('Image Size Above 10MB','Error',{timeOut: 10000})</script>";
            }

        }else{
            echo "<script type='text/javascript'>toastr.error('$file_error','Error',{timeOut: 10000})</script>";
        }
    }else{
        echo "<script type='text/javascript'>toastr.error('File Extension Not Supported','Error',{timeOut: 10000})</script>";
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
            <h1 class="m-0 text-dark text-lg">MEMBER INFORMATION </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Membership</a></li>
              <li class="breadcrumb-item active">Member Info</li>
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
                  <li class="nav-item"><a class="nav-link" href="manage-member"> <i class="fa fa-arrow-left"></i> Back</a></li>
                  <li class="nav-item"><a class="nav-link btn-sm active" href="#activity" data-toggle="tab">Personal Information</a></li>
                  <li class="nav-item"><a class="nav-link btn-sm" href="#timeline" data-toggle="tab">Church & Emergency</a></li>
<!--                  <li class="nav-item"><a class="nav-link btn-sm" href="#upimage" data-toggle="tab">Update Image</a></li>-->
                  <li class="nav-item"><a class="nav-link btn-sm" href="#memrep" data-toggle="tab">Member Report</a></li>
                </ul>
              </div>
                
                
                  <div class="card-body">
                    <div class="tab-content">
                    
                      <div class="active tab-pane" id="activity">
                          <form method="post" action="" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                      <label for="memberid">Member ID</label>
                                      <input type="text" class="form-control" id="memberid" name="memberid" value="<?php echo $member['member_id'];?>" required readonly />
                                </div>

                                <div class="form-group">
                                      <label for="lastName">Last Name</label>
                                      <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $member['last_name'];?>" placeholder="Last Name *" required />
                                </div>

                                <div class="form-group">
                                      <label for="placeOfBirth">Place of Birth</label>
                                      <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth" placeholder="Place Of Birth *" value="<?php echo $member['place_of_birth'];?>" required />
                                </div>

                                <div class="form-group">
                                      <label for="residentialAddress">Residential Address</label>
                                      <input type="text" class="form-control" id="residentialAddress" name="residentialAddress" value="<?php echo $member['residential_address'];?>" placeholder="Residential Address *" required />
                                </div>
                                <div class="form-group">
                                      <label for="postalAddress">Postal Address</label>
                                      <input type="text" class="form-control" id="postalAddress" name="postalAddress" placeholder="Postal Address" value="<?php echo $member['postal_address'];?>" />
                                </div>
                                <div class="form-group">
                                      <label for="phone">Phone</label>
                                      <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $member['phone_number'];?>" placeholder="Phone *" required />
                                </div>
                              </div>
                              <div class="col-md-4">

                                <div class="form-group">
                                      <label for="firstName">First Name</label>
                                      <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $member['first_name'];?>" placeholder="First Name *" required />
                                </div>

                                <div class="form-group">
                                      <label for="dob">Date of Birth</label>
                                      <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $member['dob'];?>" required />
                                </div>


                                <div class="form-group">
                                      <label for="hometown">Hometown</label>
                                      <input type="text" class="form-control" id="hometown" name="hometown" value="<?php echo $member['home_town'];?>" placeholder="Home Town *" />
                                </div>
                                <div class="form-group">
                                      <label for="occupation">Occupation</label>
                                  <input type="text" class="form-control" id="occupation" name="occupation" value="<?php echo $member['occupation'];?>" placeholder="Occupation *" required  />
                                </div>
                                <div class="form-group">
                                      <label for="email">Email</label>
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $member['email'];?>"  />
                                </div>

                                <div class="form-group">
                                      <label for="placeOfBirth">Invited By</label>
                                  <select class="form-control select2" id="invitedby" name="invitedby" data-placeholder="Invited By *" required>
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
                                      <label for="otherName">Other Name</label>
                                  <input type="text" class="form-control" placeholder="Other Name" value="<?php echo $member['other_name'];?>" id="otherName" name="otherName"  />
                                </div>

                                <div class="form-group">
                                      <label for="gender">Gender</label>
        <!--                           <label style="color:white;">.<i class="text-danger"></i></label>-->
                                  <select class="form-control select2" id="gender" name="gender"data-placeholder="Gender *" required>
                                    <option value="<?php echo $member['gender'];?>"><?php echo $member['gender'];?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                      <label for="nationality">Nationality</label>
                                  <select class="form-control select2" id="nationality" name="nationality" data-placeholder="Nationality *" required>
                                <option value="<?php echo $member['nationality'];?>"><?php echo $member['nationality'];?></option>
                                    <option value="Ghana" selected="selected">Ghana</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Ivory Coast">Ivory Coast</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                      <label for="maritalstatus">Marital Status</label>
                                  <select class="form-control select2" id="maritalstatus" name="maritalstatus" data-placeholder="Marital Status *" required>
                                <option value="<?php echo $member['marital_status'];?>"><?php echo $member['marital_status'];?></option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                  </select>
                                </div>


                                <div class="form-group">
                                      <label for="parental_status">Parental Status</label>
                                  <select class="form-control select2" id="parental_status" name="parental_status" data-placeholder="Parent Status *" required>
                            <option value="<?php echo $member['parental_status'];?>"><?php echo $member['parental_status'];?></option>
                                    <option value="Alive">Alive</option>
                                    <option value="Single">Single ParentHood</option>
                                    <option value="Dead">Dead/Deceased</option>
                                  </select>
                                </div>


                                <div class="form-group">
                                      <label for="parent_name">Parent Name</label>
                                  <select class="form-control select2" id="parent_name" name="parent_name" data-placeholder="Parent Name (For Children)">
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

                      <div class="tab-pane" id="timeline">
                          <div class="row">
                            <div class="col-md-4">
                                <?php if($member['member_image'] != NULL || $member['member_image'] != ''){?>
                                    <div class="form-group">
                                <img class="form-control" style="height:200px;" src="uploads/member/<?php echo $member['member_image']; ?>" />
                                    </div>
                                <?php }?>
                                
                                <div class="form-group">
                                  <label>Upload Image</label>
                                      <input type="file" accept="image/*" class="form-control" name="image" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                      <label for="relationship">Relationship to Member</label>
                                 <div class="form-group">
                                  <input type="text" class="form-control" id="relationship" name="relationship" value="<?php echo $member['relationship'];?>" placeholder="Relationship e.g Father *" required />
                                </div>

                                <div class="form-group">
                                      <label for="baptismStatus">Baptism Status</label>
                                  <select class="form-control select2" id="baptismStatus" name="baptismStatus" data-placeholder="Baptism Status *" required>
                                <option value="<?php echo $member['baptism_status'];?>"><?php echo $member['baptism_status'];?></option>
                                    <option value="Baptised">Baptised</option>
                                    <option value="Not Baptised">Not Baptised</option>
                                  </select>
                                </div>

                                 <div class="form-group">
                                      <label for="emergencyPerson">Emergency Person Name</label>
                                      <input type="text" class="form-control" value="<?php echo $member['emergencyPerson'];?>" id="emergencyPerson" name="emergencyPerson" placeholder="Emergency Person *" required />
                                </div>

                                 <div class="form-group">
                                      <label for="bloodgroup">Blood Group</label>
                                      <input type="text" class="form-control" id="bloodgroup" name="bloodgroup" value="<?php echo $member['bloodgroup'];?>" placeholder="Blood Group"/>
                                </div>
                                
                                <div class="form-group">
                                    <label style="color:white;">.</label>
                                    <input type="submit" name="upimage" value="UPDATE IMAGE" onsubmit="return confirm('UPDATE IMAGE ');" class="btn btn-primary btn-block btn-flat btn-md" />  
                                </div>
                            </div>
                            <div class="col-md-4">    

                                <div class="form-group">
                                    <label for="ministry">Ministry</label>
                                    <select class="form-control select2" id="ministry" name="ministry" data-placeholder="Select Ministry *" >
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
                                      <label for="position">Position</label>
                                  <select class="form-control select2" id="position" name="position" data-placeholder="Position / Worker Status *" required>
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
                                      <label for="memberType">Member Type</label>
                                  <select class="form-control select2" id="memberType" name="memberType" data-placeholder="Membership Type *" required>
                                    <option value="<?php echo $member['membership_type'];?>"><?php echo $member['membership_type'];?></option>
                                    <option value="Distant">Distant Member</option>
                                    <option value="Local">Local/Regular Member</option>
                                  </select>
                                </div>


                                 <div class="form-group">
                                      <label for="emergencyContact">Emergency Contact</label>
                                      <input type="text" class="form-control" id="emergencyContact" name="emergencyContact" value="<?php echo $member['emergencyContact'];?>" placeholder="Emergency Contact *" required />
                                </div>

                                <div class="form-group">
                                    <label style="color:white;">.</label>
                                    <input type="submit" name="register" value="UPDATE INFORMATION" onclick="return confirm('UPDATE INFORMATION ');" class="btn btn-primary btn-flat btn-block btn-md" />  
                                </div>
                                </div>
                          </div>
                        </form>
                      </div>
                      
                        
<!--
                      <div class="tab-pane" id="upimage">
                          <form method="post" action="" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-md-4">            
                                <div class="form-group">
                                  <label>Upload Image</label>
                                      <input type="file" accept="image/*" class="form-control" name="image" required />
                                </div>
                              </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="color:white;">.</label>
                                    <input type="submit" name="upimage" value="UPDATE IMAGE" onsubmit="return confirm('UPDATE IMAGE ');" class="btn btn-primary btn-block btn-md" />  
                                </div>
                            </div>
                          </div>
                          </form>
                      </div>
-->

                      <div class="tab-pane" id="memrep">
                          <div class="row">    
                            <div class="col-md-12">
                              <div class="card">
                                <div class="card-header">
                                    <b><?php echo strtoupper($member['first_name']);?>'s ATTENDANCE REPORT</b> 
                                </div>
                                  <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped" style="width:100%;">
                                      <thead>
                                      <tr>
                                        <th>MEM. ID</th>
                                        <th>DATE</th>
                                        <th>MINISTRY /GROUP NAME</th>
                                        <th>STATUS</th>
                                      </tr>
                                      </thead>
                                       <tbody>
                                            <?php 
                                            $getattend = select("SELECT * FROM mem_attendance WHERE member_id='".$member['member_id']."' ORDER BY date_reg asc");
                                            if($getattend){
                                                foreach($getattend as $attendgot){

                                            ?>
                                          <tr>
                                            <td><?php echo $attendgot['member_id'];?></td>
                                            <td><?php echo $attendgot['date_reg'];?></td>
                                            <td><?php echo strtoupper($attendgot['ministry_name']);?></td>
                                            <td><?php echo strtoupper($attendgot['status']);?></td>
                                          </tr>
                                            <?php } }?>
                                        </tbody>
                                        <tfoot>
                                        <tr> 
                                        <td colspan="2"></td>
                                            <td> 
                                                <a href="report-printattendance?mid=<?php echo $mid;?>" target="_blank" class="btn btn-warning btn-sm btn-block">
                                                    <i class="fa fa-print"></i> PRINT REPORT
                                                </a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    </table>
                                  </div>  
                                  </div>
                              </div>
                          </div>
                          
                          
                          <div class="row">    
                            <div class="col-md-12">
                              <div class="card">
                                <div class="card-header">
                                    <b><?php echo strtoupper($member['first_name']);?>'s TITHE REPORT</b> 
                                </div>
                                  <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped" style="width:100%;">
                                  <thead>
                                  <tr>
                                    <th>MEM. ID</th>
                                    <th>TITHE ID</th>
                                    <th>AMOUNT</th>
                                    <th>DATE</th>
                                  </tr>
                                  </thead>
                                    <tbody>
                                        <?php 
                                        $gettithe = select("SELECT * FROM tithe WHERE member_id='".$member['member_id']."'");
                                        if($gettithe){
                                            foreach($gettithe as $tithegotten){
                                         
                                        ?>
                                      <tr>
                                        <td><?php echo $tithegotten['member_id'];?></td>
                                        <td><?php echo $tithegotten['tithe_id'];?></td>
                                        <td><?php echo $tithegotten['tithe_amount'];?></td>
                                        <td><?php echo $tithegotten['tithe_date'];?></td>
                                      </tr>
                                        <?php } }?>
                                    </tbody>
                                    <tfoot>
                                        <tr> 
                                        <td colspan="3"></td>
                                            <td> 
                                                <a href="report-printtithe?mid=<?php echo $mid;?>" target="_blank" class="btn btn-warning btn-sm btn-block">
                                                    <i class="fa fa-print"></i> PRINT REPORT
                                                </a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                              </div>  
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
          </div>
      </div>
    </section>
  </div>

<?php
include 'layout/footer.php';    
?>