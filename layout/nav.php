



<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
<nav style="margin-right:0px;padding-right:0px;"class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="navbar-header">
        <a class="navbar-brand" href="#"> ChMS</a>
    </div>
  <ul class="navbar-nav">


    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">DASHBOARD</a>
    </li>
<!--
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
-->

      <?php
      $_SESSION['pass'];
      $get_level = select("SELECT * FROM church_login WHERE pass='".$_SESSION['pass']."'");
      foreach($get_level as $get_levels){}
      if($get_levels['a_level']=='2'|| $get_levels['a_level']=='1'){

// echo "<script>alert('{$get_levels['a_level']}')</script>";
        ?>
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        MEMBERSHIP
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="create_member.php">REGISTER MEMBER</a>
        <a class="dropdown-item" href="manage_member.php">MANAGE MEMBER</a>
      </div>
    </li>
    <?php }?>


    <?php
       if($get_levels['a_level']=='3'|| $get_levels['a_level']=='1'){?>
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        MINISTRY
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="create_ministry.php">CREATE MINISTRY</a>
        <a class="dropdown-item" href="manage_ministry.php">MANAGE MINISTRY</a><hr>
        <a class="dropdown-item" href="other_group.php">OTHER GROUPS</a>
      </div>
    </li>
      <?php } ?>

      <?php
       if($get_levels['a_level']=='4'|| $get_levels['a_level']=='1'){?>
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        ACCOUNTS
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="create_account.php">CREATE ACCOUNT</a>
        <a class="dropdown-item" href="post_account.php">POST ACCOUNT</a>
        <a class="dropdown-item" href="tithe_account.php">TITHE ACCOUNT</a>
      </div>
    </li>
  <?php }?>

    <!-- Dropdown -->
    <?php
     if($get_levels['a_level']=='4'|| $get_levels['a_level']=='1'){?>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        REPORT
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="tithe_report.php">TITHE REPORT</a>
        <a class="dropdown-item" href="s_report.php">FINANCIAL REPORT</a>

      </div>
    </li>
  <?php } ?>

  <?php
   if($get_levels['a_level']=='5'|| $get_levels['a_level']=='1'){?>
      <li class="nav-item">
      <a class="nav-link" href="counselling.php">COUNSELLING</a>
    </li>
<?php } ?>

<?php
 if($get_levels['a_level']=='4'|| $get_levels['a_level']=='1'){?>
      <li class="nav-item">
      <a class="nav-link" href="inventory.php">INVENTORY</a>
    </li>

    <?php
 if($get_levels['a_level']=='1'){?>
      <li class="nav-item">
      <a class="nav-link" href="register_user.php">REGISTER NEW USER</a>
    </li>
<?php } ?>
    </li>
<?php } ?>
  </ul>
</nav>

        </div>
<div class="col-md-4">

    <nav style="margin-right:0px;padding-right:0px;"class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="navbar-header" style="padding:0px;">
        <a class="navbar-brand" href="#"> <img class="" style="width:50px;" src="assets/images/icon.png"> THE ROHI CHURCH</a>
    </div>
  <ul class="navbar-nav pull-right" style="margin-left:150px;">

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="margin-left:-80px;">
        <i class="fa fa-cogs"></i> Settings
      </a>
      <div class="dropdown-menu" style="margin-left:-100px;">
        <?php
         if($get_levels['a_level']=='2'|| $get_levels['a_level']=='1'){?>
<!--        <a class="dropdown-item" href="user_creation.php">User Creation</a>-->
        <a class="dropdown-item" href="event.php">Event Creation</a>
        <?php }?>

<!--        <a class="dropdown-item" href="#">Activities Reminder</a>-->
<?php
 if($get_levels['a_level']=='2'|| $get_levels['a_level']=='3'|| $get_levels['a_level']=='1'){

  ?>
        <a class="dropdown-item" href="attendance.php">Attendance</a>
<?php }?>
        <?php
         if($get_levels['a_level']=='2'|| $get_levels['a_level']=='1'){?>
        <a class="dropdown-item" href="create_acctype.php">Create Account Type</a>
        <a class="dropdown-item" href="create_pledge.php">Manage Pledge</a>
      <?php } ?>
        <hr>
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </li>

  </ul>
</nav>



        </div>
    </div>
</div>
