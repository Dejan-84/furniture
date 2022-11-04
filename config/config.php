<?php
    require_once "./stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" =>"sk_test_51LpxZjH1C3rB0kaaxByw7xBdrbX8ALX5mbHobBzH0F3PZk01DWMoaAAQ008bj2Q49oGC1QvbeHDNEzdF3e1zraZi00SIfoiMHI",
        "publishableKey" =>"pk_test_51LpxZjH1C3rB0kaalIaiY5vhlQwp2jlE8d3FZd6AqS6EVwNe6TsHTHNpz5DzBPuYhZQ9XG9NXViLn7IE9grmQXgS00nyDMKBf0"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>