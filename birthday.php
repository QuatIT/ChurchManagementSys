<?php
 include 'layout/head.php';
 date_default_timezone_set("Africa/Accra");




$pick_birthday = select("SELECT * FROM membership_tb WHERE DAY(dob) = DAY(NOW()) && MONTH(dob)=MONTH(NOW())");
foreach($pick_birthday as $pick_birthdays){
	 $tel = $pick_birthdays['phone_number'];
    $names = $pick_birthdays['full_name'];


//SMS to members
function sendsms($body,$subject,$tel){
$username = 'richardkanfrah';
$password = 'godwin1.';
// $subject = 'The Church Rohi';
$body = 'The Rohi Church would like to wish you a happy birthday';
$message= $body;

$from = "Rohi Church";//your senderid example "kwamena"max is 11 chars;
$baseurl = "http://isms.wigalsolutions.com/ismsweb/sendmsg/";

//All numbers must have a country code. delimit them with comma(,)

$params = "username=".$username."&password=".$password."&from=".$from."&to=".$tel."&message=".$message ;

//send the message
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$baseurl);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
$return = curl_exec($ch);
curl_close($ch);

$send = explode(" :: ",$return);
if(stristr($send[0],"SUCCESS") != FALSE){
echo "<script>alert('message sent')</script>";

}else{
echo "<script>alert('message could not be sent')</script>";
// echo "<script>alert('{$return}')</script>";
}
}

sendsms($body,$subject,$tel);

    }


?>
