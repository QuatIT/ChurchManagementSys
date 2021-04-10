<?php


//SMS API
function sendsms($bdy,$subject,$tel){
    $username = 'richardkanfrah';
	$password = 'godwin1';
     // $subject= $_POST['title'];
    $subject = $_POST['subject'];
    $bdy = $subject.PHP_EOL.$bdy;
   
    //$message= $body;
     $message= $bdy;
    
    
    $from = "Rohi Church";//your senderid example "kwamena"max is 11 chars;
    $baseurl = "http://isms.wigalsolutions.com/ismsweb/sendmsg/";
    
    //All numbers must have a country code. delimit them with comma(,)
    
    $text_to = $tel;
    
    $params = "username=".$username."&password=".$password."&from=".$from."&to=".$text_to."&message=".$message ;
    
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
    }
    }

//SMS to members
// function sendsms($bdy,$subject,$phone_number){
// $username = 'richardkanfrah';
// $password = 'godwin1';
// $bdy = $subject.PHP_EOL.$bdy;
// $message= $bdy;

// $from = "Rohi Church";//your senderid example "kwamena"max is 11 chars;
// $baseurl = "http://isms.wigalsolutions.com/ismsweb/sendmsg/";

// //All numbers must have a country code. delimit them with comma(,)

// $text_to = $phone_number;

// $params = "username=".$username."&password=".$password."&from=".$from."&to=".$text_to."&message=".$message ;

// //send the message
// $ch = curl_init();
// curl_setopt($ch,CURLOPT_URL,$baseurl);
// curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
// curl_setopt($ch,CURLOPT_POST,1);
// curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
// $return = curl_exec($ch);
// curl_close($ch);

// $send = explode(" :: ",$return);
// if(stristr($send[0],"SUCCESS") != FALSE){
// echo "<script>alert('message sent')</script>";

// }else{
// echo "<script>alert('message could not be sent')</script>";

// }
// }
?>
