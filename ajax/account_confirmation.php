<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST)) {

    require_once '../includes/baza.php';
    require_once '../config/db_config.php';

    $validation = true;
    $response = array();

    $activation_code = $_POST['code'];
    $email = $_POST['email'];


    $conn = database_connection(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME); 

	$check_query = "SELECT email,activation_expiry,active FROM korisnik WHERE email = '$email' LIMIT 1";
	
	$result = mysqli_query($conn,$check_query);

	if(!$result) {

        $response['message'] = 'query error';
        $validation = false;
    }

    if ($validation) {

        if(mysqli_num_rows($result) > 0) {

            $korisnik_array = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $datum = strtotime(date("Y-m-d"));

            $datum2 =  strtotime($korisnik_array['activation_expiry']);
            
            if ($korisnik_array['active'] == 1 || $datum > $datum2) {
            
                $response['message'] = 'Link is expired.';
                $validation = false;
            }

            if($validation) {

                $update_query = "UPDATE korisnik SET active = 1 WHERE email = '$email'";

                $result1 = mysqli_query($conn,$update_query);

                if(!$result1) {

                    $response['message'] = 'query error';
                    $validation = false;
                }
                else{
                    $response['message'] = 'Successful verification.</br>You will be redirected to login page.';
                    $response['redirect_url'] = 'login.php';
                }
            }
        }
        else {
            $response['message'] = 'There is no user with this email.';
            $validation = false;
        }
    }

    $response['status'] = $validation;

    echo json_encode($response);
}
