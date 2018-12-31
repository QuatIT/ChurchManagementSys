<?php
include 'layout/head.php';

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
    <form action="" method="post">
  <div class="tab-pane fade active show" id="home">
      <div class="container-fluid">
        <div class="row" style="padding-top:1%;">

   <div class="col-md-4">
        First Name <input type="text" name="firstname" class="form-control">
      </div>
   <div class="col-md-4">
        Other Name <input type="text" name="othername" class="form-control">
      </div>
   <div class="col-md-4">
        Last Name <input type="text" name="lastname" class="form-control">
      </div>

   <div class="col-md-4">
        Date of Birth <input type="date" name="dob" class="form-control">
      </div>

   <div class="col-md-4">
        Place of Birth <input type="text" name="place_of_birth" class="form-control">
      </div>

   <div class="col-md-4">
       Gender <select name="gender" class="form-control"><option></option><option>Male</option><option>Female</option></select>
      </div>

   <div class="col-md-4">
        Residential Address <input type="text" name="residential_address" class="form-control">
      </div>

   <div class="col-md-4">
        Home Town <input type="text" name="home_twon" class="form-control">
      </div>

   <div class="col-md-4">
        Nationality <input type="text" name="nationality" class="form-control">
      </div>

   <div class="col-md-4">
        Postal Address <input type="text" name="postal_address" class="form-control">
      </div>

   <div class="col-md-4">
        Occupation <input type="text" name="occupation" class="form-control">
      </div>

   <div class="col-md-4">
        Marital Status <select name="marital_status" class="form-control"><option></option><option>Single</option><option>Married</option><option>Divorced</option><option>Widow</option></select>
      </div>

   <div class="col-md-4">
        Parental Status <select name="parental_status" class="form-control"><option></option><option>Living</option><option>Deceased</option></select>
      </div>

   <div class="col-md-4">
        Email <input type="email" name="email" class="form-control">
      </div>

   <div class="col-md-4">
        Phone Number <input type="text" name="phone_number" class="form-control">
      </div>

   <div class="col-md-4">
        Parent Name <input type="text" name="parent_name" class="form-control">
      </div>

   <div class="col-md-4">
        Position <select name="marital_status" class="form-control"><option></option><option>Member</option><option>Elder</option><option>Deacon</option><option>Deaconess</option><option>Pastor</option></select>
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

   <div class="col-md-4 move"  style="margin-top:-250px;">
        Group/Ministry Name <select name="group_name" class="form-control"><option></option><option>Youth</option><option>Children</option><option>Men</option>><option>Women</option></select>
      </div>

   <div class="col-md-4 move" style="margin-top:-250px;">
        Baptism Status <select name="baptism_status" class="form-control"><option></option><option>Baptised</option><option>Not Baptised</option></select>
      </div>

   <div class="col-md-4 move" style="margin-top:-250px;">
        Confirmation Status <select name="confirmation_status" class="form-control"><option></option><option>Confirmed</option><option>Not Confirmed</option></select>
      </div>

   <div class="col-md-4 move" style="margin-top:-180px;">
        Membership Type <select name="membership_type" class="form-control"><option></option><option>Distant Membership</option><option>Regular/Local Member</option></select>
      </div>

         </div>
      </div>
  </div>
  <div class="tab-pane fade" id="fini">

   <div class="col-md-4 move"  style="margin-top:-250px;">

   Upload Image <input type="file" class="form-control" name="image">
      </div>

   <div class="col-md-12 move">
       <br>
        <p class="text-danger">Please make sure all fields are correct before Submit</p>
      </div>

   <div class="col-md-4 move"  >
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
