<?php
//session_start();
//ini_set('display_errors',0);

require_once '../includes/baza.php';

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

	
	$conn = database_connection('localhost', 'root', '', 'furniture');

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

	
	$conn = database_connection('localhost', 'root', '', 'furniture');

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

function unos_korisnika($ime, $prezime, $email, $lozinka) {

	$response = array();

	$status = 1;
	$message = '';

	$conn = database_connection('localhost', 'root', '', 'furniture');
	
	$upit_unos = "INSERT INTO korisnik(ime,prezime,email,lozinka) VALUES('$ime','$prezime','$email','$lozinka')";

	$rezultat_unos = mysqli_query($conn,$upit_unos);

	if(!$rezultat_unos) {
		
		$status = 0;
		$message .=  'Greska u upitu';
	}
	else {
        $status = 1;
		$last_id = mysqli_insert_id($conn);

		$rezultat = mysqli_query($conn, $podaci_korisnik);
		
		
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

function table_refresh() {

	$odgovor = array();

	$html = '';

	$conn = database_connection('localhost', 'root', '', 'furniture');

    //DODATI PROVERU DA LI JE UPIT USPESNO IZVRSEN,ILI NE
    $query = "SELECT korisnik_id,ime,prezime,email,datum_registracije FROM korisnik ORDER BY korisnik_id DESC";

    $result = mysqli_query($conn, $query);

    if (!$result) {

		$odgovor['message'] = 'Greska u upitu.';
    }
	else {


		$html .= " <!-- TABLE CONSTRUCTION-->
					<table>
						<tr>
							<th>ID</th>
							<th>Ime</th>
							<th>Prezime</th>
							<th>Email</th>
							<th>Datum Registracije</th>
							<th><a id='add-user' class='btn btn-success'>Add New User</a></th>
						</tr>

						<tbody class='result-wrapper'>";

		while($rows = mysqli_fetch_assoc($result)) {
		
			$id = $rows['korisnik_id'];
			$ime = $rows['ime'];
			$prezime = $rows['prezime'];
			$email = $rows['email'];
			$datum_registracije = $rows['datum_registracije'];

			$html .= "<tr>
							<td>".$id."</td>
							<td>".$ime."</td>
							<td>".$prezime."</td>
							<td>".$email."</td>
							<td>".$datum_registracije."</td>
							<td>
								<a class='btn btn-info edit-user' data-id = $id>Edit</a>
								<a id = $id class='btn btn-danger' onclick='confirmation(this.id)'>Delete</a>
							</td>
						</tr>";
		}
		
		$html .= "</tbody>
				</table>";

		$odgovor['html'] = $html;
	}	

	return $odgovor;
}
?>