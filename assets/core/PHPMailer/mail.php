<?php
require "PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'mail.quatitsolutions.com';
        $mail->Port = 465;  
        $mail->Username = 'info@alphasigma.quatitsolutions.com';
        $mail->Password = 'EIRVKXyzvpwY';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="info@alphasigma.quatitsolutions.com";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error =0;
            return $error; 
        }
        else 
        {
            $error = 1;  
            return $error;
        }
    }
    
//    $to   = 'godwinabeaku@gmail.com';
//    $from = 'info@alphasigma.quatitsolutions.com';
//    $name = 'ALPHA SIGMA TEST';
//    $subj = 'PHPMailer 5.2 testing from DomainRacer';
//    $msg = 'This is mail about testing mailing using PHP.';
//    
//    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    
?>

<!--
<html>
    <head>
        <title>PHPMailer</title>
    </head>
    <body style="background: black;">
        <center><h2 style="padding-top:70px;color: white;"><?#php echo $error; ?></h2></center>
    </body>
</html>-->
