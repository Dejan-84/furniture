<?php
//session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['form'])) {

    require_once '../includes/baza.php';
    require_once '../config/db_config.php';

    $validation = true;
    $message = '';
    $response = array();
    $format_mejla = '';
    
    $form = array();
    parse_str($_POST['form'], $form);


    include '../includes/function.php';

    //UPIT ZA PROVERU PRAZNIH POLJA
    $provera = prazna_polja($form);

    if($provera['status'] == 0) {

        $validation = false;
        $message .= $provera['message'];
    }

    if ($validation) {

        $email =  htmlspecialchars($form['email']);
        $format_mejla = provera_formata_mejla($email);

        if (!$format_mejla) {

            $validation = false;
            $message .= 'Mail is not in valid format.';
        }
    }

  
    if($validation) {

        $provera_email = email_check($email);

        if ($provera_email['status'] == 0) {
            $validation = false;
            $message .= $provera_email['message'];
        } 

    }

    if ($validation) {


        $token = bin2hex(random_bytes(16));

        $token = password_hash($token, PASSWORD_DEFAULT);

        $token_expiry = date("Y-m-d", strtotime(" +1 day"));

        $conn = database_connection(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);


        $id_query = "SELECT korisnik_id FROM korisnik WHERE email = '$email' LIMIT 1";

        $id_result = mysqli_query($conn, $id_query);

        if(!$id_result) {
		
            $validation = false;
            $message .=  'Greska u upitu';
        }
        
        if ($validation) {

            $korisnik_array = mysqli_fetch_array($id_result, MYSQLI_ASSOC);
            $korisnik_id = $korisnik_array['korisnik_id'];

            $insert_query = "INSERT INTO password_reset_links(korisnik_id,reset_link,link_expiry)
            
                            VALUES($korisnik_id, '$token', '$token_expiry')";

            if (!mysqli_query($conn, $insert_query)) {

                $validation = false;
                $message .=  'Greska u upitu2';
            }
        }

        if ($validation) {

            $naslov_maila = 'Reset Password';

            $poruka = '<p style="margin-bottom:60px;">Reset Password</p>
                        <p>Reset password, by clicking the link below.</p>
                        <p><a href="http://localhost/furniture/password-change.php?email='.$email.'&code='.$token.'">Reset Password</p>
                        ';

            $status_slanja = posalji_mail($naslov_maila, $email, $poruka);
            
            if ($status_slanja['status'] == 0) {

                $validation = false;
                $message .= $status_slanja['message'];
            }
            else {
                $message .= 'We sent you a verification link for password reset on your email.';
            }
        }
    } 

    $response['status'] = $validation;
    $response['message'] = $message;

    echo json_encode($response);
}    