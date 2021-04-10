<?
$Vtb0ld4nh0oy="email_address@gmail.com";
$Vhalsyeib2sy="accountpassword";
$Vqjeupemp40q="mail@subinsb.com";
$Vnypsd01ojjn="vishal@vishal.com";
$Vnypsd01ojjn_name="Vishal G.V";
$Vmgxrjtj0g2j="<strong>This is a bold text.</strong>"; 
$Vi5mrcgf4cpz="HTML message";


include("phpmailer/class.phpmailer.php");
$Vbfod5qpq0lc = new PHPMailer();
$Vbfod5qpq0lc->IsSMTP();
$Vbfod5qpq0lc->CharSet = 'UTF-8';
$Vbfod5qpq0lc->Host = "smtp.live.com";
$Vbfod5qpq0lc->SMTPAuth= true;
$Vbfod5qpq0lc->Port = 587;
$Vbfod5qpq0lc->Username= $Vtb0ld4nh0oy;
$Vbfod5qpq0lc->Password= $Vhalsyeib2sy;
$Vbfod5qpq0lc->SMTPSecure = 'tls';
$Vbfod5qpq0lc->From = $Vnypsd01ojjn;
$Vbfod5qpq0lc->FromName= $Vnypsd01ojjn_name;
$Vbfod5qpq0lc->isHTML(true);
$Vbfod5qpq0lc->Subject = $Vi5mrcgf4cpz;
$Vbfod5qpq0lc->Body = $Vmgxrjtj0g2j;
$Vbfod5qpq0lc->addAddress($Vqjeupemp40q);
if(!$Vbfod5qpq0lc->send()){
 echo "Mailer Error: " . $Vbfod5qpq0lc->ErrorInfo;
}else{
 echo "E-Mail has been sent";
}
?>
