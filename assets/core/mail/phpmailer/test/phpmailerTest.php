<?php


require 'PHPUnit/Framework.php';

$V22ylx2r31xl = "../";

require $V22ylx2r31xl . 'class.phpmailer.php';
error_reporting(E_ALL);


class phpmailerTest extends PHPUnit_Framework_TestCase {
    
    var $Vif3iho1ba54 = false;

    
    var $Vov53bwoaof2 = "";

    
    var $V5di1abmvjdz = array();

     
    var $Vozb4j5o4kf0 = array();

    
    function setUp() {
        global $V22ylx2r31xl;

	@include './testbootstrap.php'; 

        $Vcki4t4qmybshis->Mail = new PHPMailer();

        $Vcki4t4qmybshis->Mail->Priority = 3;
        $Vcki4t4qmybshis->Mail->Encoding = "8bit";
        $Vcki4t4qmybshis->Mail->CharSet = "iso-8859-1";
        if (array_key_exists('mail_from', $_REQUEST)) {
	        $Vcki4t4qmybshis->Mail->From = $_REQUEST['mail_from'];
	    } else {
	        $Vcki4t4qmybshis->Mail->From = 'unit_test@phpmailer.sf.net';
	    }
        $Vcki4t4qmybshis->Mail->FromName = "Unit Tester";
        $Vcki4t4qmybshis->Mail->Sender = "";
        $Vcki4t4qmybshis->Mail->Subject = "Unit Test";
        $Vcki4t4qmybshis->Mail->Body = "";
        $Vcki4t4qmybshis->Mail->AltBody = "";
        $Vcki4t4qmybshis->Mail->WordWrap = 0;
        if (array_key_exists('mail_host', $_REQUEST)) {
	        $Vcki4t4qmybshis->Mail->Host = $_REQUEST['mail_host'];
	    } else {
	        $Vcki4t4qmybshis->Mail->Host = 'mail.example.com';
	    }
        $Vcki4t4qmybshis->Mail->Port = 25;
        $Vcki4t4qmybshis->Mail->Helo = "localhost.localdomain";
        $Vcki4t4qmybshis->Mail->SMTPAuth = false;
        $Vcki4t4qmybshis->Mail->Username = "";
        $Vcki4t4qmybshis->Mail->Password = "";
        $Vcki4t4qmybshis->Mail->PluginDir = $V22ylx2r31xl;
		$Vcki4t4qmybshis->Mail->AddReplyTo("no_reply@phpmailer.sf.net", "Reply Guy");
        $Vcki4t4qmybshis->Mail->Sender = "unit_test@phpmailer.sf.net";

        if(strlen($Vcki4t4qmybshis->Mail->Host) > 0) {
            $Vcki4t4qmybshis->Mail->Mailer = "smtp";
        } else {
            $Vcki4t4qmybshis->Mail->Mailer = "mail";
            $Vcki4t4qmybshis->Sender = "unit_test@phpmailer.sf.net";
        }

        if (array_key_exists('mail_to', $_REQUEST)) {
	        $Vcki4t4qmybshis->SetAddress($_REQUEST['mail_to'], 'Test User', 'to');
	    }
        if (array_key_exists('mail_cc', $_REQUEST) and strlen($_REQUEST['mail_cc']) > 0) {
	        $Vcki4t4qmybshis->SetAddress($_REQUEST['mail_cc'], 'Carbon User', 'cc');
	    }
    }

    
    function tearDown() {
        
        $Vcki4t4qmybshis->Mail = NULL;
        $Vcki4t4qmybshis->ChangeLog = array();
        $Vcki4t4qmybshis->NoteLog = array();
    }


    
    function BuildBody() {
        $Vcki4t4qmybshis->CheckChanges();

        
        if($Vcki4t4qmybshis->Mail->ContentType == "text/html" || strlen($Vcki4t4qmybshis->Mail->AltBody) > 0)
        {
            $Vypxutamrudd = "<br/>";
            $Vbjaxoenrde3 = "<li>";
            $Vbjaxoenrde3_start = "<ul>";
            $Vbjaxoenrde3_end = "</ul>";
        }
        else
        {
            $Vypxutamrudd = "\n";
            $Vbjaxoenrde3 = " - ";
            $Vbjaxoenrde3_start = "";
            $Vbjaxoenrde3_end = "";
        }

        $Vkjo1dsipjpo = "";

        $Vkjo1dsipjpo .= "---------------------" . $Vypxutamrudd;
        $Vkjo1dsipjpo .= "Unit Test Information" . $Vypxutamrudd;
        $Vkjo1dsipjpo .= "---------------------" . $Vypxutamrudd;
        $Vkjo1dsipjpo .= "phpmailer version: " . PHPMailer::VERSION . $Vypxutamrudd;
        $Vkjo1dsipjpo .= "Content Type: " . $Vcki4t4qmybshis->Mail->ContentType . $Vypxutamrudd;

        if(strlen($Vcki4t4qmybshis->Mail->Host) > 0)
            $Vkjo1dsipjpo .= "Host: " . $Vcki4t4qmybshis->Mail->Host . $Vypxutamrudd;

        
        $Vwvlklsjw2it = $Vcki4t4qmybshis->Mail->GetAttachments();
        if(count($Vwvlklsjw2it) > 0)
        {
            $Vkjo1dsipjpo .= "Attachments:" . $Vypxutamrudd;
            $Vkjo1dsipjpo .= $Vbjaxoenrde3_start;
            foreach($Vwvlklsjw2it as $Vvoxfbo3d4da) {
                $Vkjo1dsipjpo .= $Vbjaxoenrde3 . "Name: " . $Vvoxfbo3d4da[1] . ", ";
                $Vkjo1dsipjpo .= "Encoding: " . $Vvoxfbo3d4da[3] . ", ";
                $Vkjo1dsipjpo .= "Type: " . $Vvoxfbo3d4da[4] . $Vypxutamrudd;
            }
            $Vkjo1dsipjpo .= $Vbjaxoenrde3_end . $Vypxutamrudd;
        }

        
        if(count($Vcki4t4qmybshis->ChangeLog) > 0)
        {
            $Vkjo1dsipjpo .= "Changes" . $Vypxutamrudd;
            $Vkjo1dsipjpo .= "-------" . $Vypxutamrudd;

            $Vkjo1dsipjpo .= $Vbjaxoenrde3_start;
            for($V3xsptcgzss2 = 0; $V3xsptcgzss2 < count($Vcki4t4qmybshis->ChangeLog); $V3xsptcgzss2++)
            {
                $Vkjo1dsipjpo .= $Vbjaxoenrde3 . $Vcki4t4qmybshis->ChangeLog[$V3xsptcgzss2][0] . " was changed to [" .
                               $Vcki4t4qmybshis->ChangeLog[$V3xsptcgzss2][1] . "]" . $Vypxutamrudd;
            }
            $Vkjo1dsipjpo .= $Vbjaxoenrde3_end . $Vypxutamrudd . $Vypxutamrudd;
        }

        
        if(count($Vcki4t4qmybshis->NoteLog) > 0)
        {
            $Vkjo1dsipjpo .= "Notes" . $Vypxutamrudd;
            $Vkjo1dsipjpo .= "-----" . $Vypxutamrudd;

            $Vkjo1dsipjpo .= $Vbjaxoenrde3_start;
            for($V3xsptcgzss2 = 0; $V3xsptcgzss2 < count($Vcki4t4qmybshis->NoteLog); $V3xsptcgzss2++)
            {
                $Vkjo1dsipjpo .= $Vbjaxoenrde3 . $Vcki4t4qmybshis->NoteLog[$V3xsptcgzss2] . $Vypxutamrudd;
            }
            $Vkjo1dsipjpo .= $Vbjaxoenrde3_end;
        }

        
        $Vcki4t4qmybshis->Mail->Body .= $Vypxutamrudd . $Vypxutamrudd . $Vkjo1dsipjpo;
    }

    
    function CheckChanges() {
        if($Vcki4t4qmybshis->Mail->Priority != 3)
            $Vcki4t4qmybshis->AddChange("Priority", $Vcki4t4qmybshis->Mail->Priority);
        if($Vcki4t4qmybshis->Mail->Encoding != "8bit")
            $Vcki4t4qmybshis->AddChange("Encoding", $Vcki4t4qmybshis->Mail->Encoding);
        if($Vcki4t4qmybshis->Mail->CharSet != "iso-8859-1")
            $Vcki4t4qmybshis->AddChange("CharSet", $Vcki4t4qmybshis->Mail->CharSet);
        if($Vcki4t4qmybshis->Mail->Sender != "")
            $Vcki4t4qmybshis->AddChange("Sender", $Vcki4t4qmybshis->Mail->Sender);
        if($Vcki4t4qmybshis->Mail->WordWrap != 0)
            $Vcki4t4qmybshis->AddChange("WordWrap", $Vcki4t4qmybshis->Mail->WordWrap);
        if($Vcki4t4qmybshis->Mail->Mailer != "mail")
            $Vcki4t4qmybshis->AddChange("Mailer", $Vcki4t4qmybshis->Mail->Mailer);
        if($Vcki4t4qmybshis->Mail->Port != 25)
            $Vcki4t4qmybshis->AddChange("Port", $Vcki4t4qmybshis->Mail->Port);
        if($Vcki4t4qmybshis->Mail->Helo != "localhost.localdomain")
            $Vcki4t4qmybshis->AddChange("Helo", $Vcki4t4qmybshis->Mail->Helo);
        if($Vcki4t4qmybshis->Mail->SMTPAuth)
            $Vcki4t4qmybshis->AddChange("SMTPAuth", "true");
    }

    
    function AddChange($Vjbhezpqmbks, $Vn2m0ykrrk5b) {
        $Vcd4wdcjnhgp = count($Vcki4t4qmybshis->ChangeLog);
        $Vcki4t4qmybshis->ChangeLog[$Vcd4wdcjnhgp][0] = $Vjbhezpqmbks;
        $Vcki4t4qmybshis->ChangeLog[$Vcd4wdcjnhgp][1] = $Vn2m0ykrrk5b;
    }

    
    function AddNote($Vymeulvdnr0v) {
        $Vcki4t4qmybshis->NoteLog[] = $Vymeulvdnr0v;
    }

    
    function SetAddress($V13w33glmfwb, $Vjbhezpqmbks = "", $Vqlkpisxnyzu = "to") {
        switch($Vqlkpisxnyzu)
        {
            case "to":
                return $Vcki4t4qmybshis->Mail->AddAddress($V13w33glmfwb, $Vjbhezpqmbks);
            case "cc":
                return $Vcki4t4qmybshis->Mail->AddCC($V13w33glmfwb, $Vjbhezpqmbks);
            case "bcc":
                return $Vcki4t4qmybshis->Mail->AddBCC($V13w33glmfwb, $Vjbhezpqmbks);
        }
    }

    
    
    

    
    function test_WordWrap() {

        $Vcki4t4qmybshis->Mail->WordWrap = 40;
        $Vbeuu11bqs25 = "Here is the main body of this message.  It should " .
                   "be quite a few lines.  It should be wrapped at the " .
                   "40 characters.  Make sure that it is.";
        $Vidkfqngtfqa = strlen($Vbeuu11bqs25);
        $Vbeuu11bqs25 .= "\n\nThis is the above body length: " . $Vidkfqngtfqa;

        $Vcki4t4qmybshis->Mail->Body = $Vbeuu11bqs25;
        $Vcki4t4qmybshis->Mail->Subject .= ": Wordwrap";

        $Vcki4t4qmybshis->BuildBody();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
    }

    
    function test_Low_Priority() {

        $Vcki4t4qmybshis->Mail->Priority = 5;
        $Vcki4t4qmybshis->Mail->Body = "Here is the main body.  There should be " .
                            "a reply to address in this message.";
        $Vcki4t4qmybshis->Mail->Subject .= ": Low Priority";
        $Vcki4t4qmybshis->Mail->AddReplyTo("nobody@nobody.com", "Nobody (Unit Test)");

        $Vcki4t4qmybshis->BuildBody();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
    }

    
    function test_Multiple_Plain_FileAttachment() {

        $Vcki4t4qmybshis->Mail->Body = "Here is the text body";
        $Vcki4t4qmybshis->Mail->Subject .= ": Plain + Multiple FileAttachments";

        if(!$Vcki4t4qmybshis->Mail->AddAttachment("test.png"))
        {
            $Vcki4t4qmybshis->assertTrue(false, $Vcki4t4qmybshis->Mail->ErrorInfo);
            return;
        }

        if(!$Vcki4t4qmybshis->Mail->AddAttachment(__FILE__, "test.txt"))
        {
            $Vcki4t4qmybshis->assertTrue(false, $Vcki4t4qmybshis->Mail->ErrorInfo);
            return;
        }

        $Vcki4t4qmybshis->BuildBody();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
    }

    
    function test_Plain_StringAttachment() {

        $Vcki4t4qmybshis->Mail->Body = "Here is the text body";
        $Vcki4t4qmybshis->Mail->Subject .= ": Plain + StringAttachment";

        $Vlxgd3ebcdwo = "These characters are the content of the " .
                       "string attachment.\nThis might be taken from a ".
                       "database or some other such thing. ";

        $Vcki4t4qmybshis->Mail->AddStringAttachment($Vlxgd3ebcdwo, "string_attach.txt");

        $Vcki4t4qmybshis->BuildBody();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
    }

    
    function test_Quoted_Printable() {

        $Vcki4t4qmybshis->Mail->Body = "Here is the main body";
        $Vcki4t4qmybshis->Mail->Subject .= ": Plain + Quoted-printable";
        $Vcki4t4qmybshis->Mail->Encoding = "quoted-printable";

        $Vcki4t4qmybshis->BuildBody();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);

	
	$Vcki4t4qmybs = substr(file_get_contents(__FILE__), 0, 1024); 
	$Vcki4t4qmybshis->assertEquals($Vcki4t4qmybs, quoted_printable_decode($Vcki4t4qmybshis->Mail->EncodeQP($Vcki4t4qmybs)), 'QP encoding round-trip failed');
        

    }

    
    function test_Html() {

        $Vcki4t4qmybshis->Mail->IsHTML(true);
        $Vcki4t4qmybshis->Mail->Subject .= ": HTML only";

        $Vcki4t4qmybshis->Mail->Body = "This is a <b>test message</b> written in HTML. </br>" .
                            "Go to <a href=\"http://phpmailer.sourceforge.net/\">" .
                            "http://phpmailer.sourceforge.net/</a> for new versions of " .
                            "phpmailer.  <p/> Thank you!";

        $Vcki4t4qmybshis->BuildBody();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
    }

    
    function test_HTML_Attachment() {

        $Vcki4t4qmybshis->Mail->Body = "This is the <b>HTML</b> part of the email.";
        $Vcki4t4qmybshis->Mail->Subject .= ": HTML + Attachment";
        $Vcki4t4qmybshis->Mail->IsHTML(true);

        if(!$Vcki4t4qmybshis->Mail->AddAttachment(__FILE__, "test_attach.txt"))
        {
            $Vcki4t4qmybshis->assertTrue(false, $Vcki4t4qmybshis->Mail->ErrorInfo);
            return;
        }

        $Vcki4t4qmybshis->BuildBody();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
    }

    
    function test_Embedded_Image() {

        $Vcki4t4qmybshis->Mail->Body = "Embedded Image: <img alt=\"phpmailer\" src=\"cid:my-attach\">" .
                     "Here is an image!</a>";
        $Vcki4t4qmybshis->Mail->Subject .= ": Embedded Image";
        $Vcki4t4qmybshis->Mail->IsHTML(true);

        if(!$Vcki4t4qmybshis->Mail->AddEmbeddedImage("test.png", "my-attach", "test.png",
                                          "base64", "image/png"))
        {
            $Vcki4t4qmybshis->assertTrue(false, $Vcki4t4qmybshis->Mail->ErrorInfo);
            return;
        }

        $Vcki4t4qmybshis->BuildBody();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
	
	$Vcki4t4qmybshis->Mail->AddEmbeddedImage('thisfiledoesntexist', 'xyz'); 
	$Vcki4t4qmybshis->Mail->AddEmbeddedImage(__FILE__, '123'); 

    }

    
    function test_Multi_Embedded_Image() {

        $Vcki4t4qmybshis->Mail->Body = "Embedded Image: <img alt=\"phpmailer\" src=\"cid:my-attach\">" .
                     "Here is an image!</a>";
        $Vcki4t4qmybshis->Mail->Subject .= ": Embedded Image + Attachment";
        $Vcki4t4qmybshis->Mail->IsHTML(true);

        if(!$Vcki4t4qmybshis->Mail->AddEmbeddedImage("test.png", "my-attach", "test.png",
                                          "base64", "image/png"))
        {
            $Vcki4t4qmybshis->assertTrue(false, $Vcki4t4qmybshis->Mail->ErrorInfo);
            return;
        }

        if(!$Vcki4t4qmybshis->Mail->AddAttachment(__FILE__, "test.txt"))
        {
            $Vcki4t4qmybshis->assertTrue(false, $Vcki4t4qmybshis->Mail->ErrorInfo);
            return;
        }

        $Vcki4t4qmybshis->BuildBody();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
    }

    
    function test_AltBody() {

        $Vcki4t4qmybshis->Mail->Body = "This is the <b>HTML</b> part of the email.";
        $Vcki4t4qmybshis->Mail->AltBody = "Here is the text body of this message.  " .
                   "It should be quite a few lines.  It should be wrapped at the " .
                   "40 characters.  Make sure that it is.";
        $Vcki4t4qmybshis->Mail->WordWrap = 40;
        $Vcki4t4qmybshis->AddNote("This is a mulipart alternative email");
        $Vcki4t4qmybshis->Mail->Subject .= ": AltBody + Word Wrap";

        $Vcki4t4qmybshis->BuildBody();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
    }

    
    function test_AltBody_Attachment() {

        $Vcki4t4qmybshis->Mail->Body = "This is the <b>HTML</b> part of the email.";
        $Vcki4t4qmybshis->Mail->AltBody = "This is the text part of the email.";
        $Vcki4t4qmybshis->Mail->Subject .= ": AltBody + Attachment";
        $Vcki4t4qmybshis->Mail->IsHTML(true);

        if(!$Vcki4t4qmybshis->Mail->AddAttachment(__FILE__, "test_attach.txt"))
        {
            $Vcki4t4qmybshis->assertTrue(false, $Vcki4t4qmybshis->Mail->ErrorInfo);
            return;
        }

        $Vcki4t4qmybshis->BuildBody();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
        if (is_writable('.')) {
            file_put_contents('message.txt', $Vcki4t4qmybshis->Mail->CreateHeader() . $Vcki4t4qmybshis->Mail->CreateBody());
        } else {
            $Vcki4t4qmybshis->assertTrue(false, 'Could not write local file - check permissions');
        }
    }

    function test_MultipleSend() {
        $Vcki4t4qmybshis->Mail->Body = "Sending two messages without keepalive";
        $Vcki4t4qmybshis->BuildBody();
        $Vi5mrcgf4cpz = $Vcki4t4qmybshis->Mail->Subject;

        $Vcki4t4qmybshis->Mail->Subject = $Vi5mrcgf4cpz . ": SMTP 1";
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);

        $Vcki4t4qmybshis->Mail->Subject = $Vi5mrcgf4cpz . ": SMTP 2";
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
    }

    function test_SendmailSend() {
        $Vcki4t4qmybshis->Mail->Body = "Sending via sendmail";
        $Vcki4t4qmybshis->BuildBody();
        $Vi5mrcgf4cpz = $Vcki4t4qmybshis->Mail->Subject;

        $Vcki4t4qmybshis->Mail->Subject = $Vi5mrcgf4cpz . ": sendmail";
	$Vcki4t4qmybshis->Mail->IsSendmail();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
    }

    function test_MailSend() {
        $Vcki4t4qmybshis->Mail->Body = "Sending via mail()";
        $Vcki4t4qmybshis->BuildBody();
        $Vi5mrcgf4cpz = $Vcki4t4qmybshis->Mail->Subject;

        $Vcki4t4qmybshis->Mail->Subject = $Vi5mrcgf4cpz . ": mail()";
	$Vcki4t4qmybshis->Mail->IsMail();
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
    }

    function test_SmtpKeepAlive() {
        $Vcki4t4qmybshis->Mail->Body = "This was done using the SMTP keep-alive.";
        $Vcki4t4qmybshis->BuildBody();
        $Vi5mrcgf4cpz = $Vcki4t4qmybshis->Mail->Subject;

        $Vcki4t4qmybshis->Mail->SMTPKeepAlive = true;
        $Vcki4t4qmybshis->Mail->Subject = $Vi5mrcgf4cpz . ": SMTP keep-alive 1";
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);

        $Vcki4t4qmybshis->Mail->Subject = $Vi5mrcgf4cpz . ": SMTP keep-alive 2";
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
        $Vcki4t4qmybshis->Mail->SmtpClose();
    }

    
    function test_DenialOfServiceAttack() {
        $Vcki4t4qmybshis->Mail->Body = "This should no longer cause a denial of service.";
        $Vcki4t4qmybshis->BuildBody();

        $Vcki4t4qmybshis->Mail->Subject = str_repeat("A", 998);
        $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), $Vcki4t4qmybshis->Mail->ErrorInfo);
    }

	function test_Error() {
		$Vcki4t4qmybshis->Mail->Subject .= ": This should be sent";
		$Vcki4t4qmybshis->BuildBody();
		$Vcki4t4qmybshis->Mail->ClearAllRecipients(); 
		$Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->IsError() == false, "Error found");
		$Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send() == false, "Send succeeded");
		$Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->IsError(), "No error found");
		$Vcki4t4qmybshis->assertEquals('You must provide at least one recipient email address.', $Vcki4t4qmybshis->Mail->ErrorInfo);
		$Vcki4t4qmybshis->Mail->AddAddress($_REQUEST['mail_to']);
		$Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->Send(), "Send failed");
	}

	function test_Addressing() {
		$Vcki4t4qmybshis->assertFalse($Vcki4t4qmybshis->Mail->AddAddress('a@example..com'), 'Invalid address accepted');
		$Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->AddAddress('a@example.com'), 'Addressing failed');
		$Vcki4t4qmybshis->assertFalse($Vcki4t4qmybshis->Mail->AddAddress('a@example.com'), 'Duplicate addressing failed');
		$Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->AddCC('b@example.com'), 'CC addressing failed');
		$Vcki4t4qmybshis->assertFalse($Vcki4t4qmybshis->Mail->AddCC('b@example.com'), 'CC duplicate addressing failed');
		$Vcki4t4qmybshis->assertFalse($Vcki4t4qmybshis->Mail->AddCC('a@example.com'), 'CC duplicate addressing failed (2)');
		$Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->AddBCC('c@example.com'), 'BCC addressing failed');
		$Vcki4t4qmybshis->assertFalse($Vcki4t4qmybshis->Mail->AddBCC('c@example.com'), 'BCC duplicate addressing failed');
		$Vcki4t4qmybshis->assertFalse($Vcki4t4qmybshis->Mail->AddBCC('a@example.com'), 'BCC duplicate addressing failed (2)');
		$Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->AddReplyTo('a@example.com'), 'Replyto Addressing failed');
		$Vcki4t4qmybshis->assertFalse($Vcki4t4qmybshis->Mail->AddReplyTo('a@example..com'), 'Invalid Replyto address accepted');
		$Vcki4t4qmybshis->Mail->ClearAddresses();
		$Vcki4t4qmybshis->Mail->ClearCCs();
		$Vcki4t4qmybshis->Mail->ClearBCCs();
		$Vcki4t4qmybshis->Mail->ClearReplyTos();
	}

	
	function test_Translations() {
		$Vcki4t4qmybshis->Mail->SetLanguage('en');
		$Vwt30dqh5xss = $Vcki4t4qmybshis->Mail->GetTranslations();
		foreach (new DirectoryIterator('../language') as $V3xdgwqknbbb) {
			if($V3xdgwqknbbb->isDot()) continue;
			$Vxve4maip4vq = array();
			
			if (preg_match('/^phpmailer\.lang-([a-z_]{2,})\.php$/', $V3xdgwqknbbb->getFilename(), $Vxve4maip4vq)) {
				$Vtzqd2ed42yq = $Vxve4maip4vq[1]; 
				$Vsqe4yol2m0w = array(); 
				include $V3xdgwqknbbb->getPathname(); 
				$Vz5ou2wtrv50 = array_diff(array_keys($Vwt30dqh5xss), array_keys($Vsqe4yol2m0w));
				$V1vx5thzrxye = array_diff(array_keys($Vsqe4yol2m0w), array_keys($Vwt30dqh5xss));
				$Vcki4t4qmybshis->assertTrue(empty($Vz5ou2wtrv50), "Missing translations in $Vtzqd2ed42yq: ". implode(', ', $Vz5ou2wtrv50));
				$Vcki4t4qmybshis->assertTrue(empty($V1vx5thzrxye), "Extra translations in $Vtzqd2ed42yq: ". implode(', ', $V1vx5thzrxye));
			}
		}
	}

	
	function test_Encodings() {
	    $Vcki4t4qmybshis->Mail->Charset = 'iso-8859-1';
	    $Vcki4t4qmybshis->assertEquals('=A1Hola!_Se=F1or!', $Vcki4t4qmybshis->Mail->EncodeQ('�Hola! Se�or!', 'text'), 'Q Encoding (text) failed');
	    $Vcki4t4qmybshis->assertEquals('=A1Hola!_Se=F1or!', $Vcki4t4qmybshis->Mail->EncodeQ('�Hola! Se�or!', 'comment'), 'Q Encoding (comment) failed');
	    $Vcki4t4qmybshis->assertEquals('=A1Hola!_Se=F1or!', $Vcki4t4qmybshis->Mail->EncodeQ('�Hola! Se�or!', 'phrase'), 'Q Encoding (phrase) failed');
	}

	
	function test_Signing() {
	    $Vcki4t4qmybshis->Mail->Sign('certfile.txt', 'keyfile.txt', 'password'); 
	}

	
	function test_Miscellaneous() {
	    $Vcki4t4qmybshis->assertEquals('application/pdf', PHPMailer::_mime_types('pdf') , 'MIME TYPE lookup failed');
	    $Vcki4t4qmybshis->Mail->AddCustomHeader('SomeHeader: Some Value');
	    $Vcki4t4qmybshis->Mail->ClearCustomHeaders();
	    $Vcki4t4qmybshis->Mail->ClearAttachments();
	    $Vcki4t4qmybshis->Mail->IsHTML(false);
	    $Vcki4t4qmybshis->Mail->IsSMTP();
	    $Vcki4t4qmybshis->Mail->IsMail();
	    $Vcki4t4qmybshis->Mail->IsSendMail();
   	    $Vcki4t4qmybshis->Mail->IsQmail();
	    $Vcki4t4qmybshis->Mail->SetLanguage('fr');
	    $Vcki4t4qmybshis->Mail->Sender = '';
	    $Vcki4t4qmybshis->Mail->CreateHeader();
	    $Vcki4t4qmybshis->assertFalse($Vcki4t4qmybshis->Mail->set('x', 'y'), 'Invalid property set succeeded');
	    $Vcki4t4qmybshis->assertTrue($Vcki4t4qmybshis->Mail->set('Timeout', 11), 'Valid property set failed');
	    $Vcki4t4qmybshis->Mail->getFile(__FILE__);
	}
}



?>
