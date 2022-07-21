<?php
//session_start();
//ini_set('display_errors',0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../includes/baza.php';
require_once '../config/db_config.php';

function prazna_polja(array $form_inputs) {

	$response = array();

	$status = 1;
	$message = '';

	foreach ($form_inputs as $key => $value) {

		if ($key == 'submit') continue;

		if ($value == '') {

			

			$message .= 'Niste uneli ' .$key. "<br>";
		}
	}

	if ($message != '') {

		$status = 0;
		$response['message'] = $message;
	}

	$response['status'] = $status;

	return $response;
}

function provera_lozinke(string $lozinka, string $potvrdjena_lozinka) {

	$response = array();

	$status = 1;
	$message = '';

	$pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,15}$/';

	if (!preg_match($pattern, $lozinka)) {

		$status = 0;
		$message .= 'Lozinka nije dovoljno jaka.';

		$response['message'] = $message;
	} 

	if ($status == 1) {

		if ($lozinka != $potvrdjena_lozinka) {

			$status = 0;
			$message .= 'Lozinke se ne podudaraju.';

			$response['message'] = $message;			
		}
	} 

	$response['status'] = $status;

	return $response;
}


function provera_korisnika($email) {

	$response = array();

	$status = 1;
	$message = '';



    $conn = database_connection(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

	//$conn = mysqli_connect('localhost', 'root', '', 'furniture');  

	$user_query = "SELECT email FROM korisnik WHERE email = '$email' LIMIT 1";
	
	$result = mysqli_query($conn,$user_query);

	if(!$result) {

		//MYSQLI ERROR FOR TESTING ONLY-REMOVE LATER
		$status = 0;
		$message .=  'Greska u upitu';

		$response['message'] = $message;
	}

	if(mysqli_num_rows($result) > 0) {

		$status = 0;
		$message .= 'Korisnik sa unetom email adresom vec postoji.';

		$response['message'] = $message;
	}    

	$response['status'] = $status;

	return $response;
}

function logovanje_korisnika($email,$pass){

	$response = array();

	$status = 1;
	$message = '';

	$conn = database_connection(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

	//$conn = mysqli_connect('localhost', 'root', '', 'furniture');

	$user_query = "SELECT ime,prezime,email,lozinka FROM korisnik WHERE email = '$email' LIMIT 1";
	
	$resultat = mysqli_query($conn,$user_query);

	if(!$resultat) {

		//MYSQLI ERROR FOR TESTING ONLY-REMOVE LATER
		$status = 0;
		$message .=  'Greska u upitu';

		$response['message'] = $message;
	}



	if(mysqli_num_rows($resultat) > 0) {

		$korisnik_array = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
		
		if (!password_verify($pass, $korisnik_array['lozinka'])) {
			$status = 0;
			$message .= 'Pogresan email ili lozinka.';
			$response['message'] = $message;
		}
		else {
			$status = 1;
			$_SESSION['ime'] = $korisnik_array['ime'];
			$_SESSION['prezime'] = $korisnik_array['prezime'];
			$_SESSION['logged_in'] =  true;

			$response['redirect_url'] = 'index.php';
		}
	}
	else{
        $status = 0;
		$message .= 'Pogresan email ili lozinka.';

		$response['message'] = $message;
	}    

	$response['status'] = $status;

	return $response;
}

function unos_korisnika($ime, $prezime, $email, $lozinka, $activation_code) {

	$response = array();

	$status = 1;
	$message = '';

	$conn = database_connection(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

	//$conn = mysqli_connect('localhost', 'root', '', 'furniture');

	$activation_expiry = date("Y-m-d", strtotime(" +1 day"));
	
	$upit_unos = "INSERT INTO korisnik(ime,prezime,email,lozinka,activation_code,activation_expiry)
	
				 VALUES('$ime','$prezime','$email','$lozinka','$activation_code', '$activation_expiry')";

	$rezultat_unos = mysqli_query($conn,$upit_unos);

	if(!$rezultat_unos) {
		
		$status = 0;
		$message .=  'Greska u upitu';
	}
	else {
        $status = 1;
		$last_id = mysqli_insert_id($conn);

		$rezultat = mysqli_query($conn, $last_id);
		
		
        //$message .= 'Uspesno ste se registrovali. ' .$last_id;
        $_SESSION['last_id'] = $last_id;
		$_SESSION['success'] =  true;
		$_SESSION['ime'] =  $ime;
		$_SESSION['prezime'] =  $prezime;
		$response['redirect_url'] = 'login.php';
	}

	$response['message'] = $message;
	$response['status'] = $status;

	return $response;
}

function posalji_mail(string $naslov, string $email, string $poruka) {

	require_once "../vendor/autoload.php";

	$status = 1;

	$message = '';

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

	$mail->addAddress($email);

	$mail->isHTML(true);

	$mail->Subject = $naslov;
	$mail->Body = $poruka;
	$mail->AltBody = "This is the plain text version of the email content";

	if ($mail->send()) {
		$message .= 'Message has been sent successfully';
	} else  {
		$message .= 'Error while sending email.';
		$status = 0;
	}

	$response['message'] = $message;
	$response['status'] = $status;

	return $response;
}

?>