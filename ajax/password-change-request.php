<?php

if (isset($_POST['form'])) {

    $validation = true;
    $message = '';
    $response = array();
    
    $form = array();
    parse_str($_POST['form'], $form);

    include '../includes/function.php';

    //UPIT ZA PROVERU PRAZNIH POLJA
    $provera = prazna_polja($form);

    if($provera['status'] == 0) {

        $validation = false;
        $message .= $provera['message'];
    }

    if($validation) {

        $lozinka = htmlspecialchars($form['password']);
        $email = htmlspecialchars($form['email']);
        $code = htmlspecialchars($form['code']);

        $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,15}$/';

        if (!preg_match($pattern, $lozinka)) {

            $validation = false;
            $message .= 'You must create stronger password.';
        } 
    }

    if($validation) {

        require_once '../includes/baza.php';
        require_once '../config/db_config.php';

        $conn = database_connection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $check_query = "SELECT korisnik_id,link_expiry,link_used FROM password_reset_links
    
                        WHERE reset_link = '$code' LIMIT 1";

        $result = mysqli_query($conn,$check_query);

        if(!$result) {

            $validation = false;
            $message .= 'Query error.';
        }
    }


    if ($validation) {

        $korisnik_array = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $korisnik_id = $korisnik_array['korisnik_id'];

        $datum = strtotime(date("Y-m-d"));

        $datum2 =  strtotime($korisnik_array['link_expiry']);
        
        if ($korisnik_array['link_used'] == 1 || $datum > $datum2) {
        
            $message .= 'Link is expired.';
            $validation = false;
        }

        if($validation) {

            $nova_lozinka = password_hash($lozinka, PASSWORD_DEFAULT);
            
            $upit_update = "UPDATE korisnik SET lozinka = '$nova_lozinka' WHERE korisnik_id = $korisnik_id LIMIT 1";
    
            $rezultat_update = mysqli_query($conn,$upit_update);
    
            if(!$rezultat_update) {
                
                $validation = false;
                $message .=  'Query error.';
            }
    
            else {
                $message .=  'You successfully updated your password.';
            }
        }
    }

    $response['status'] = $validation;
    $response['message'] = $message;

    echo json_encode($response);

}