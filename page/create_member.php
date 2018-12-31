
<?php
//include 'layout/head.php';
if(isset($_POST['finish'])){

    $fname= trim(htmlspecialchars($_POST['firstname']));
     $lname= trim(htmlspecialchars($_POST['lastname']));
    $othernames= trim(htmlspecialchars($_POST['othernames']));
    $email = trim(htmlspecialchars($_POST['email']));
    $dob= trim(htmlspecialchars($_POST['dateofbirth']));
    $gender= trim(htmlspecialchars($_POST['gender']));
    $pob= trim(htmlspecialchars($_POST['placeofbirth']));
    $hometown= trim(htmlspecialchars($_POST['hometown']));
    $residentialaddress= trim(htmlspecialchars($_POST['residentialaddress']));
    $postaladdress= trim(htmlspecialchars($_POST['postaladdress']));
    $pnumber= trim(htmlspecialchars($_POST['pnumber']));
    $nationality= trim(htmlspecialchars($_POST['nationality']));
    $occupation= trim(htmlspecialchars($_POST['occupation']));
    $mstatus= trim(htmlspecialchars($_POST['mstatus']));
    $member_id ="MEM-".mt_rand(1,9).mt_rand(100,999);
   //$member_id= trim(mt_rand(1,9).mt_rand(100,999));

      $groupname = trim(htmlspecialchars($_POST['groupname']));
      $baptismstatus = trim(htmlspecialchars($_POST['baptismstatus']));
      $confirmationstatus = trim(htmlspecialchars($_POST['confirmationstatus']));

      $membershiptype = trim(htmlspecialchars($_POST['membershiptype']));
      $parentname = trim(htmlspecialchars($_POST['parentname']));
      $parentposition = trim(htmlspecialchars($_POST['parentposition']));
      #@$_SESSION['m_id']=$member_id;





      #$_SESSION['m_id']=$member_id;



$member= insert("INSERT INTO membership_tb(member_id,last_name,first_name,other_name,dob,gender,residential_address,home_town,phone_number,nationality,place_of_birth,occupation,marital_status, email, group_name,baptism_status,confirmation_status,membership_type,parental_name,position) VALUES('$member_id','".$lname."', '".$fname."', '".$othernames."', '".$dob."', '".$gender."', '".$residentialaddress."','".$hometown."','".$pnumber."','".$nationality."','".$pob."', '".$occupation."', '".$mstatus."','".$email."','$groupname','$baptismstatus','$confirmationstatus','$membershiptype','$parentname','$parentposition')");
    if($member){
      echo "<script>alert('Registration Successful, Complete Form on Next Page')
	  							 window.location.href='dash.php'</script>";
    }
  }



?>
<!Doctype html>
<html>
    <head>
        <title>demo 1</title>
        <link rel="stylesheet" href="assets/css/demo_one_css.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="assets/js/demo_one_js.js"></script>


    </head>

<body>

    <div class="leftcolumn">
      <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Top Navigation Menu -->
<div class="topnav">
  <a href="" class="active">Home</a>
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
  <table width = "100%" cellspacing="2%" border="0">

  <tr>
   <td> <a href="demo two.html">2nd Page</a> </td>
   <td> <a href="#">Link</a> </td>
   <td> <a href="#">Link</a> </td>
  </tr>

	<tr>
    <td> <a href="demo two.html">2nd Page</a> </td>
    <td> <a href="#">Link</a> </td>
    <td> <a href="#">Link</a> </td>
	</tr>

	<tr>
   <td> <a href="demo two.html">2nd Page</a> </td>
   <td> <a href="#">Link</a> </td>
   <td> <a href="#">Link</a> </td>
   </tr>
	</table>
  </div>

  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
          </div>

  </div>
  <div class="rightcolumn">
    <div class="cardy">
        <img src="assets/images/quat_gray.jpg" alt="image" style="width:70px">
        <p style = "float:right; padding-right:100px">Quat IT Solutions</p>

      </div>
      <ul class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li>Home</li>
        </ul>
    </div>

    <div>
              <div class="row">
                <div class="leftcolumn">

              <button id="Open" class="tablink" onclick="openPage('pdetails', this, '#777')">Personal Details</button>
              <button class="tablink" onclick="openPage('church', this, '#777')">Church</button>
              <button class="tablink" onclick="openPage('summary', this, '#777')">Summary</button>

              <div id="pdetails" class="tabcontent">
                <h3>Personal Details</h3>
                <div>
                    <form action="" method="POST" name="details" id="details" >
                        <div class="leftcolumning">
                      <label for="fname">First Name</label>
                      <input type="text" id="fname" name="firstname" >
                  </div>
                  <div class="rightcolumning">
                      <label for="lname">Last Name</label>
                      <input type="text" id="lname" name="lastname">
</div>
<div class="leftcolumning">
                      <label for="fname">Other Names</label>
                      <input type="text" id="oname" name="othernames">
</div>
<div class="rightcolumning">


    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>


</div>
                  <div class="leftcolumning">
                      <label for="dob">Date of Birth</label>
                      <input type="date" id="dob" name="dateofbirth"required>
                  </div>
                  <div class="rightcolumning">
                      <label for="gender">Gender</label>
                      <select id="gender" name="gender"required>
                      <option value=""></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                  </div>
<div class="leftcolumning">
                      <label for="pob">Place of Birth</label>
                      <input type="text" id="pob" name="placeofbirth"required>
</div>
<div class="rightcolumning">
                      <label for="htown">HomeTown</label>
                      <input type="text" id="htown" name="hometown">
</div>
<div class="leftcolumning">
                      <label for="raddress">Residential Address</label>
                      <textarea id="raddress" name="residentialaddress" style="height:100px"></textarea>
                      </div>
                      <div class="rightcolumning">
                        <label for="paddress">Postal Address</label>
                      <textarea id="paddress" name="postaladdress" style="height:100px"></textarea>

                      </div>
                      <div class="leftcolumning">
                      <label for="pnumber">Phone Number</label>
                      <input type="tel" id="pnumber" name="pnumber">
</div>
<div class="rightcolumning">
                      <label for="nationality">Nationality</label>
                      <input type="text" id="nationality" name="nationality">
</div>


                      <div class="leftcolumning">
                      <label for="occupation">Occupation</label>
                      <input type="text" id="occupation" name="occupation">
</div>
<div class="rightcolumning">
                      <label for="mstatus">Marital Status</label>
                      <select id="mstatus" name="mstatus"required>
                      <option value=""></option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                      </select>
                      </div>

                      <input type="button" value="Proceed" name="proceed" id="proceed" onclick="openPage('church', this, 'yellow')">

                  </div>
              </div>

              <div id="church" class="tabcontent">
                <h3>Church</h3>
                <div>
                    <span name="form2" id="form2">
                        <div class="leftcolumning">
                        <label for="gname">Group Name</label>
                        <select id="gname" name="groupname" required>
                        <option value=""></option>
                          <option value="children">Children</option>
                          <option value="youth">Youth</option>
                          <option value="women">Women</option>
                          <option value="mens">men</option>
                        </select>
                        </div>
                        <div class="rightcolumning">
                        <label for="bstatus">Baptism Status</label>
                        <select id="bstatus" name="baptismstatus"required>
                        <option value=""></option>
                          <option value="notbaptised">Not Baptised</option>
                          <option value="baptised">Baptised</option>
                        </select>
                        </div>
                        <div class="leftcolumning">
                      <label for="cstatus">Confirmation Status</label>
                      <select id="cstatus" name="confirmationstatus" required>
                      <option value=""></option>
                        <option value="commencement">commencement</option>
                        <option value="non-commencement">non-commencement</option>
                      </select>
                      </div>
                      <div class="rightcolumning">
                      <label for="mtype">Membership Type</label>
                      <select id="mtype" name="membershiptype" required>
                      <option value=""></option>
                        <option value="regular">Regular</option>
                        <option value="not-regular">NOT! regular</option>
                        </select>
                        </div>
                        <div class="leftcolumning">
                        <label for="pname">Parent Name</label>
                        <input type="text" id="pname" name="parentname">
                            </div>
                            <div class="rightcolumning">
                      <label for="pposition">Parent Position</label>
                      <select id="pposition" name="parentposition" required>
                      <option value="" ></option>
                        <option value="member">member</option>
                        <option value="deacon">deacon</option>
                        <option value="deaconess">deaconess</option>
                        <option value="elder">elder</option>
                      </select>
                  </div>

                      <input type="submit" value="Finish" name="finish" id="finish" >



</span>

                    </form>
                  </div>
              </div>



              <div id="summary" class="tabcontent">
              <h3>Summary</h3>
                <div>
                <div class="leftcolumned">

<!--" <table class= 'table table-bordered table-striped'>
<tr>
<th>FIRSTNAME</th><td></td>
</tr>
<tr>
<th>LASTNAME</th><td>uududjd</td>
</tr>
<tr>
<th>OTHERNAMES</th><td>uududjd</td>
</tr>
<tr>
<th>EMAIL</th><td>uududjd</td>
</tr>
<tr>
<th>DATE OF BIRTH</th><td>uududjd</td>
</tr>
<tr>
<th>GENDER</th><td>uududjd</td>
</tr>
<tr>
<th>PLACE OF BIRTH</th><td>uududjd</td>
</tr>
<tr>
<th>HOMETOWN</th><td>uududjd</td>
</tr>
<tr>
<th>RESIDENTIAL ADDRESS</th><td>uududjd</td>
</tr>
<tr>
<th>POSTAL ADDRESS</th><td>uududjd</td>
</tr>
<tr>
<th>PHONE NUMBER</th><td>uududjd</td>
</tr>
<tr>
<th>NATIONALITY</th><td>uududjd</td>
</tr>
<tr>
<th>OCCUPATION</th><td>uududjd</td>
</tr>
<tr>
<th>MARITAL STATUS</th><td>uududjd</td>
</tr>
<tr>
<th>GROUP NAME</th><td>uududjd</td>
</tr>
<tr>
<th>BAPTISM STATUS</th><td>uududjd</td>
</tr>
<tr>
<th>CONFIRMATION STATUS</th><td>uududjd</td>
</tr>
<tr>
<th>MEMBERSHIP TYPE</th><td>uududjd</td>
</tr>
<tr>
<th>PARENT NAME</th><td>uududjd</td>
</tr>
<tr>
<th>PARENT POSITION</th><td>uududjd</td>
</tr>
<tr>

<table>";
?>-->
 </div>


              <div id="summary" class="tabcontent">
                <h3>Summary</h3>
                <div>
                    <div class="leftcolumned">
                   <p><strong>Firstname:</strong> Name of the Person</p>


                   </div>
                   <div class="rightcolumned">
                    <p><strong>Lastname:</strong> Name of the Personss</p>
                   </div>
                   <div class="rightcolumned">
                      <p><strong>Othername:</strong> Name of the Personss</p>
                     </div>

                  </div>
              </div>
<!--End Tabs-->
</div>

                 </div>
                <div class="rightcolumng" style="padding-left:1%">

                  <div class="card">
                    <h3>Two</h3>
                    <div class="fakeimg" style="height:100px;">Image</div><br>
                    <div class="fakeimg" style="height:100px;">Image</div><br>
                    <div class="fakeimg" style="height:100px;">Image</div>
                  </div>
                </div>
              </div>
           </body>
            </html>
