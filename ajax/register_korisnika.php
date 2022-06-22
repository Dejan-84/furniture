<?php
//ini_set('display_errors',0);
session_start();


if (isset($_POST['form'])) {

    $validation = true;
    $message = '';
    $response = array();

    $form = array();
    parse_str($_POST['form'], $form);

    $csrf = $_POST['csrf'];

    //create CSRF token
    $token = hash_hmac('sha256', 'this is some string: index.php', $_SESSION['key']);

    if (!hash_equals($token, $csrf)) {

        $validation = false;
        $message .=  'You are not authorize';
    }

    include '../includes/function.php';



    //UPIT ZA PROVERU PRAZNIH POLJA
    $provera = prazna_polja($form);

    if ($provera['status'] == 0) {

        $validation = false;
        $message .= $provera['message'];
    }

   
     
    if($validation) {

        //PROVERA DA LI SE LOZINKE POPUDARAJU
        $lozinka = htmlspecialchars($form['lozinku']);
        $potvrdjena_lozinka = htmlspecialchars($form['potvrda_lozinke']);

        $provera_lozinke = provera_lozinke($lozinka, $potvrdjena_lozinka);

        if ($provera_lozinke['status'] == 0) {

            $validation = false;
            $message .= $provera_lozinke['message'];
        }
    }
  

    if($validation) {

        //PROVERA DA LI POSTOJI KORISNIK SA ISTOM MAIL ADRESOM

        $ime = htmlspecialchars($form['ime']);
        $prezime = htmlspecialchars($form['prezime']);
        $email =  htmlspecialchars($form['email']);

        $provera_korisnika = provera_korisnika($email);

        if ($provera_korisnika['status'] == 0) {

            $validation = false;
            $message .= $provera_korisnika['message'];
        }  
    }

  

    if($validation) {
 
        $lozinka = password_hash($lozinka, PASSWORD_DEFAULT);
       
        $provera_unosa = unos_korisnika($ime, $prezime, $email, $lozinka);

        if ($provera_unosa['status'] == 0) {
            $validation = false;
            $message .= $provera_unosa['message'];
        } 
        else {
            $url = $provera_unosa['redirect_url'];
            $response['redirect_url'] = $url;
        } 
        
    }

    $response['status'] = $validation;
    $response['message'] = $message;

    echo json_encode($response);
    


}