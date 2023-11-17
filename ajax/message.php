<?php
//ini_set('display_errors',0);

//get data from form 

if (isset($_POST['form'])) {

    $validation = true;
    $message = '';
    $response = array();

    $form = array();
    parse_str($_POST['form'], $form);

    include '../includes/function.php';

    $provera = prazna_polja($form);

    if ($provera['status'] == 0) {

        $validation = false;
        $message .= $provera['message'];
    }

    if($validation){

        //setting variables
        $name = $form['name'];
        $email = htmlspecialchars($form['email']);
        $comment = $form['message'];

        $to = "dekidjurdjev@gmail.com";
        $subject = "Mail From Furniture store";

        $txt ="<p>Name = ". $name . "</p>
                <p>Email = " . $email . "</p>
                <p>Message =" . $comment . "</p>";

        //$from = "dekidjurdjev@gmail.com";
        //$headers = "From:" . $from;

        $status_slanja = posalji_mail($subject, $to, $txt);

        $message .= $status_slanja['message'];

        /*
        if(mail($to,$subject,$txt,$headers)){
       
            $validation = true;
            $message .= 'Thank you for contacting us.';
        }
        else{
            $validation = false;
            $message .= 'Something went wrong.';
            
        }
        */
    }
   
    $response['message'] = $message;

    echo json_encode($response);
}