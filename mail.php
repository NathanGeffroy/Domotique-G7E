<?php
	require('Mailer/PHPMailerAutoload.php');

	$mail             = new PHPMailer();

	// $body             = file_get_contents('contents.html');
	// $body             = eregi_replace("[\]",'',$body);
	$body = $_POST['message'];

	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "smtp.outlook.com";    // SMTP server
	$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)

	                                           // 1 = errors and messages
	                                           // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "tsl";
	$mail->Host       = "smtp.outlook.com"; // sets the SMTP server
	$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
	$mail->Username   = "nathangeffroy@outlook.fr"; // SMTP account username
	$mail->Password   = "motleycrue1";        // SMTP account password

	$mail->SetFrom('nathangeffroy@outlook.fr', 'Domisep');

	$mail->AddReplyTo("nathangeffroy@outlook.fr","Domisep");

	$mail->Subject    = $_POST['objet'];

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

	$mail->MsgHTML($body);

	$address = $_POST['email'];
	$mail->AddAddress($address, $_POST['nom']);

	// $mail->AddAttachment("images/phpmailer.gif");      // attachment
	// $mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  include("Vue/Contact.php");
	}    
?>