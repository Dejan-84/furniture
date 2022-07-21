<?php
ini_set('display_errors',0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$activation_expiry = date("Y-m-d", strtotime(" +1 day"));
echo $activation_expiry;die();


function posalji_mail(string $naslov, string $primalac, string $poruka) {

	require_once "vendor/autoload.php";

	$mail = new PHPMailer();
		
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = 'smtp.elasticemail.com';
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password     
	$mail->Username = 'vladaj13@gmail.com';                 
	$mail->Password = '127211FBDEF6516BC9758A3313CC42331E83';                           
	//If SMTP requires TLS encryption then set it
	$mail->SMTPSecure = "tls";                           
	//Set TCP port to connect to
	$mail->Port = 2525;                                   

	$mail->From = "vladaj13@gmail.com";
	$mail->FromName = "Furniture store";

	$mail->addAddress($primalac);

	$mail->isHTML(true);

	$mail->Subject = $naslov;
	$mail->Body = $poruka;
	$mail->AltBody = "This is the plain text version of the email content";

	if ($mail->send()) {

		echo 'sve ok';
	}
	else {
		echo 'greska';
	}



}

$naslov_maila = 'Promena lozinke';
$primalac = 'dekidjurdjevgmail.com';

$poruka = '<p style="margin-bottom:60px;">Reset lozinke</p>
			<p>Ukoliko zelite da promenite lozinku,kliknite na link ispod</p>
			<p><a href="https://www.youtube.com/">reset lozinke</p>
			';

posalji_mail($naslov_maila, $primalac, $poruka);