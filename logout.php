<?php

if (session_status() == PHP_SESSION_NONE) {

    session_start();
}

unset($_SESSION['username']);

unset($_SESSION['logged_in']);


session_destroy();

header('Location: index.php');

?>