<?php
session_start();

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	

	if(isset($_POST['sendmsg'])){


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
	$mail->Subject = "Thank You!";
//Set sender email
	$mail->setFrom('ceylonspicee@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
			$mail->addAttachment('img//thankbanner.jpg');
//Email body
	$mail->Body = "Thank you for Support us !<br>
					Order Name :- ".$_POST['name']."<br>
					email :- ".$_POST['email']."<br>
					Contact No :- ".$_POST['phone']."<br>
					Address :- ".$_POST['address']."<br>
					Total Bill :-".$_POST['tot']." <br>
					Products :-".$_POST['items']." <br>
					Time :- ".$_POST['time']."<br>
					Date :- ".$_POST['date']."<br>
					";
//Add recipient
	$mail->addAddress($_POST['email']);
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
		session_destroy();
		header("Refresh: 1;url=../index.php");

	}else{

		echo "Message could not be sent. Mailer Error: ";

	}
//Closing smtp connection
	$mail->smtpClose();

}

?>
