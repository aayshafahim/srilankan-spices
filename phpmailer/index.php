<?php

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	if(isset($_POST['emailsend'])){


//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "ceylonspicee@gmail.com";
//Set gmail password
	$mail->Password = "bpxprcbcqqmgihre";
//Email subject
	$mail->Subject = $_POST['subject'];
//Set sender email
	$mail->setFrom('ceylonspicee@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
			//$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = $_POST['message'];
//Add recipient
	$mail->addAddress($_POST['email']);
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
		header("Refresh: 1;url=../email.php");
	}else{

		echo "Message could not be sent. Mailer Error: ";

	}
//Closing smtp connection
	$mail->smtpClose();
}