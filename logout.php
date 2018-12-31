<?php
include 'layout/head.php';

session_unset($_SESSION['user']);
session_unset($_SESSION['pass']);
session_unset($_SESSION['a_level']);
session_destroy();

echo "<script>window.location.href='index.php'</script>";

?>
