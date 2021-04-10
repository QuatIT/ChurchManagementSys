<?php
$dropactive = "membership";
$active = "newguests";
include 'layout/headside.php';

$membnum = count(select("SELECT * FROM guest_tb WHERE branch_id='$churchID'")) + 1;
$guestID = $getfullchurchd['branch_prefix']."G-".sprintf('%04s',$membnum);

if(isset($_POST['saveGuest'])){
    $guest_id = htmlspecialchars(trim($_POST['guest_id']));
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $other_name = htmlspecialchars(trim($_POST['other_name']));
//    $fullName = $firstName." ".$otherName." ".$lastName;
    $dob = htmlspecialchars(trim($_POST['dob']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $date_attend = htmlspecialchars(trim($_POST['date_attend']));
    $occupation = htmlspecialchars(trim($_POST['occupation'])); 
    $nationality = htmlspecialchars(trim($_POST['nationality'])); 
    $residential = htmlspecialchars(trim($_POST['resident'])); 
    $invitedby = htmlspecialchars(trim($_POST['invitedby'])); 
    $marital_status = htmlspecialchars(trim($_POST['marital_status'])); 
    $phone = htmlspecialchars(trim($_POST['phone'])); 
    $branch_id = $getfullchurchd['branch_id'];

        $saveguest = insert("INSERT INTO guest_tb(guest_id,branch_id,date_attend,first_name,last_name,other_name,dob,gender,resident,occupation,nationality,phone,invitedby,marital_status) VALUES('$guest_id','$branch_id','$date_attend','$first_name','$last_name','$other_name','$dob','$gender','$resident','$occupation','$nationality','$phone','$invitedby','$marital_status')");
        
        if($saveguest){
            $s = "guestsuccess";
            echo "<script>window.location.href='manage-guest?ga=$s'</script>";
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
            <h1 class="m-0 text-dark text-lg">NEW GUEST </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Membership</a></li>
              <li class="breadcrumb-item active">New Guest</li>
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
                <form method="post" action="" enctype="multipart/form-data">
              <div class="card-body">
                <div class="tab-content">
                    
                  <div class="active tab-pane" id="activity">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                              <input type="text" class="form-control" name="guest_id" value="<?php echo $guestID;?>" required readonly />
                        </div>

                        <div class="form-group">
                           <label style="color:white;">.<i class="text-danger"></i></label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name *" required />
                        </div>
                          

                        <div class="form-group">
                          <select class="form-control select2" name="gender" data-placeholder="Gender *" required>
                            <option></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                          
                          
                        <div class="form-group">
                              <input type="text" class="form-control" name="resident" placeholder="Residential Address" />
                        </div>
                        <div class="form-group">
                              <input type="tel" class="form-control" name="phone" placeholder="Phone *" required />
                        </div>
                      </div>
                        
                        
                      <div class="col-md-4">
                        <div class="form-group">
                              <input type="text" class="form-control" name="first_name" placeholder="First Name *" required />
                        </div>

                        <div class="form-group">
                          <label>Date Of Birth <i class="text-danger">*</i></label>
                              <input type="date" class="form-control" name="dob" required />
                        </div>
     
                        <div class="form-group">
                              <input type="text" class="form-control" name="occupation" placeholder="Occupation *" required  />
                        </div>

                        <div class="form-group">
                          <select class="form-control select2" name="invitedby" data-placeholder="Invited By *" required>
                            <option></option>
                            <option value="NONE">NO ONE</option>
                              <?php
                              $getmember = select("SELECT member_id, last_name, first_name, other_name FROM membership_tb WHERE branch_id='$churchID'");
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
                              <input type="text" class="form-control" placeholder="Other Name" name="other_name"  />
                        </div>
                          
                          
                        <div class="form-group">
                           <label> Date Attended<i class="text-danger"></i></label>
                            <input type="date" class="form-control" name="date_attend" required />
                        </div>


                        <div class="form-group">
                          <select class="form-control select2" name="nationality" data-placeholder="Nationality *" required>
                            <option value="Ghana" selected="selected">Ghana</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Togo">Togo</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Ivory Coast">Ivory Coast</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <select class="form-control select2" name="marital_status" data-placeholder="Marital Status *" required>
                            <option></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                          </select>
                        </div>
 
                        <div class="form-group">
                            <input type="submit" name="saveGuest" value="REGISTER GUEST" onclick="return confirm('REGISTER GUEST ');" class="btn btn-primary btn-block btn-sm" />  
                        </div>

                      </div>            
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

<?php
include 'layout/footer.php';    
?>