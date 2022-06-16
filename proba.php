<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$connect = mysqli_connect("bachataspirit.com", "bachatas_vlada", "bacha19ta10", "bachatas_farm");  

if ($connect) {
    echo 'konekcija ok';
}
else {
    echo 'Greska u konekciji: ' . mysqli_connect_error();
}