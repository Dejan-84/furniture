<?php
try {
  //var_dump($_POST["amount"]); die();

    include("config/config.php");

    $token = $_POST["stripeToken"];
    $contact_name = $_POST["c_name"];
    $token_card_type = $_POST["stripeTokenType"];
    $phone           = '12345';
    $email           = $_POST["stripeEmail"];
    $address         = $_POST["address"];
    $amount          = $_POST["amount"]; 
    $desc            = $_POST["product_name"];
    $charge = \Stripe\Charge::create([
      "amount" => $amount * 100,
      "currency" => 'usd',
      "description"=>$desc,
      "source"=> $token,
    ]);

    if($charge){
      echo '<script>alert("Your payment is successfull.")</script>';
      header("Location:index.php");
    }
} catch (Exception $e) {
  echo $e->getMessage();
}
?>