<?php
require 'assets/core/connection.php';
session_start();

if(!$_SESSION['user'] && !$_SESSION['pass'] && !$_SESSION['a_level']){
    echo "<script>window.location.href='index.php'</script>";
}

?>
<!doctype html>

<html>
	<head>
		<title>CHURCH SYSTEM</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets/css1/bootstrap.min.css">
       <link rel="stylesheet" href="assets/css1/font-awesome.min.css">
       <link rel="stylesheet" href="assets/css1/bootstrap-select.min.css">

        <style>

            body{
                padding:3%;
                background-color: rgba(234, 234, 234, 0.53);
            }
/*

            .move{
                margin-top:-100px;
                padding:0px;
            }
*/

            #modal {
    position: fixed;
    font-family: Arial, Helvetica, sans-serif;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 99999;
    height: 100%;
    width: 100%;
}
.modalconent {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    width: 80%;
    padding: 20px;
}

        </style>

<script type="text/javascript">
$(document).ready(function()
            {
        $("#mem_name").autocomplete(
    {
            source:'auto_complete.php',
            minLength:1
        });
      });
</script>
<style>
        <link rel="stylesheet" href="dash.css">
    </style>
	</head>

	<body>
