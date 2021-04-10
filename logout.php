<?php
//include 'layout/head.php';
session_start();
require 'assets/core/connection.php';
//require 'assets/core/mail/phpmailer/class.phpmailer.php';

  $logout_audit = insert("INSERT INTO login_audit(fullname,username,level,status,dateInsert)VALUES('". $_SESSION['fullname']."','". $_SESSION['user']."','". $_SESSION['a_level']."','logged out',CURDATE())");

session_destroy();
session_unset();

echo "<script>window.location.href='index'</script>";

?>
