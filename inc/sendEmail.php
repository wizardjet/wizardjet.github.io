<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Replace this with your own email address
$siteOwnersEmail = "jet.web.helper@gmail.com";
$mail = new PHPMailer();
try {
	//Details
	$mail->IsSMTP();		// Set mailer to use SMTP
	$mail->CharSet = 'UTF-8';
	$mail->Host       = "smtp.gmail.com"; // SMTP server example                             
	$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
	$mail->Username   = "jet.web.helper@gmail.com"; // SMTP account username example
	$mail->Password   = "zRc4PU@AxfyB3hf#sK]B>q!";        // SMTP account password example
	$mail->addAddress('jet.web.helper@gmail.com', 'Jet Chew');		//add addressee of email

	//Content
	if($_POST) {
		$name = trim(stripslashes($_POST['contactName']));
		$email = trim(stripslashes($_POST['contactEmail']));
		$subject = trim(stripslashes($_POST['contactSubject']));
		$contact_message = trim(stripslashes($_POST['contactMessage']));

		$mail->setFrom($email, $name);
		$mail->Subject = $subject;
		$mail->Body = $contact_message;
	}

	//Send
	$mail->send();
	
	//Ok message for Ajax
    echo 'OK';
} catch (Exception $e) {
	//Exception message if email fails
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>