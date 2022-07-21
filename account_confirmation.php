<?php

if(isset($_GET)) {

    $activation_code = $_GET['code'];
    $email = $_GET['email'];

    var_dump($email);die;

    function find_unverified_user(string $activation_code, string $email)
    {
        $conn = mysqli_connect('localhost', 'root', '', 'furniture');

        $sql = "SELECT korisnik_id, activation_code, activation_expiry < now() as expired
                FROM korisnik
                WHERE active = 0 AND email = '$email'";

        $rezultat = mysqli_query($conn,$sql);

        if(!$rezultat) {

            //MYSQLI ERROR FOR TESTING ONLY-REMOVE LATER
            echo 'greska u upitu';
            die();
        }
    
        $user = mysqli_fetch_array($rezultat, MYSQLI_ASSOC);

        var_dump($user);

        if ($user) {
            // already expired, delete the in active user with expired activation code
            if ((int)$user['expired'] === 1) {
                //delete_user_by_id($user['korisnik_id']);
                return null;
            }
            // verify the password
            if (password_verify($activation_code, $user['activation_code'])) {
                return $user;
            }
        }

        return null;
    }

    $user = find_unverified_user($activation_code, $email);
    

    function activate_user(int $user_id)
    {
        $sql = 'UPDATE korisnik
                SET active = 1,
                    activated_at = CURRENT_TIMESTAMP
                WHERE id=korisnik_id';

        $rezultat = mysqli_query($conn,$sql);

        if(!$rezultat) {

            //MYSQLI ERROR FOR TESTING ONLY-REMOVE LATER
            echo 'greska u upitu';
            die();
        }

        $user_id = mysqli_fetch_array($rezultat, MYSQLI_ASSOC);

       
        return $user_id;
    }

   
}
