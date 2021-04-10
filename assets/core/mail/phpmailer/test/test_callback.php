<html>
<head>
<title>PHPMailer Lite - DKIM and Callback Function test</title>
</head>
<body>

<?php



function callbackAction ($Vxrvbhqnqlwj, $Vqjeupemp40q, $Vyj5o4ip2jf4, $Vav45ikgcg0f, $Vi5mrcgf4cpz, $V0dtmgmxxnsq) {
  
  $Vqjeupemp40q  = cleanEmails($Vqjeupemp40q,'to');
  $Vyj5o4ip2jf4  = cleanEmails($Vyj5o4ip2jf4[0],'cc');
  $Vav45ikgcg0f = cleanEmails($Vav45ikgcg0f[0],'cc');
  echo $Vxrvbhqnqlwj . "\tTo: "  . $Vqjeupemp40q['Name'] . "\tTo: "  . $Vqjeupemp40q['Email'] . "\tCc: "  . $Vyj5o4ip2jf4['Name'] . "\tCc: "  . $Vyj5o4ip2jf4['Email'] . "\tBcc: "  . $Vav45ikgcg0f['Name'] . "\tBcc: "  . $Vav45ikgcg0f['Email'] . "\t"  . $Vi5mrcgf4cpz . "<br />\n";
  return true;
}

$V2f13dhgs0or = false;

if ($V2f13dhgs0or) {
  require_once '../class.phpmailer-lite.php';
  $Vbfod5qpq0lc = new PHPMailerLite();
} else {
  require_once '../class.phpmailer.php';
  $Vbfod5qpq0lc = new PHPMailer();
}

try {
  $Vbfod5qpq0lc->IsMail(); 
  $Vbfod5qpq0lc->SetFrom('you@yourdomain.com', 'Your Name');
  $Vbfod5qpq0lc->AddAddress('another@yourdomain.com', 'John Doe');
  $Vbfod5qpq0lc->Subject = 'PHPMailer Lite Test Subject via Mail()';
  $Vbfod5qpq0lc->AltBody = 'To view the message, please use an HTML compatible email viewer!'; 
  $Vbfod5qpq0lc->MsgHTML(file_get_contents('contents.html'));
  $Vbfod5qpq0lc->AddAttachment('images/phpmailer.gif');      
  $Vbfod5qpq0lc->AddAttachment('images/phpmailer_mini.gif'); 
  $Vbfod5qpq0lc->action_function = 'callbackAction';
  $Vbfod5qpq0lc->Send();
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $V2bwrjburyuf) {
  echo $V2bwrjburyuf->errorMessage(); 
} catch (Exception $V2bwrjburyuf) {
  echo $V2bwrjburyuf->getMessage(); 
}

function cleanEmails($Vadkcwffkfxw,$Vxeifmjzikkj) {
  if ($Vxeifmjzikkj == 'cc') {
    $Vktn4x5gvatr['Email'] = $Vadkcwffkfxw[0];
    $Vktn4x5gvatr['Name']  = $Vadkcwffkfxw[1];
    return $Vktn4x5gvatr;
  }
  if (!strstr($Vadkcwffkfxw, ' <')) {
    $Vktn4x5gvatr['Name']  = '';
    $Vktn4x5gvatr['Email'] = $Vktn4x5gvatr;
    return $Vktn4x5gvatr;
  }
  $Vktn4x5gvatrArr = explode(' <', $Vadkcwffkfxw);
  if (substr($Vktn4x5gvatrArr[1],-1) == '>') {
    $Vktn4x5gvatrArr[1] = substr($Vktn4x5gvatrArr[1],0,-1);
  }
  $Vktn4x5gvatr['Name']  = $Vktn4x5gvatrArr[0];
  $Vktn4x5gvatr['Email'] = $Vktn4x5gvatrArr[1];
  $Vktn4x5gvatr['Email'] = str_replace('@', '&#64;', $Vktn4x5gvatr['Email']);
  return $Vktn4x5gvatr;
}

?>
</body>
</html>
