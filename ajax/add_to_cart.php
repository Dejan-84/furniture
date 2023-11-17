<?php
error_reporting(0);
session_start();
//session_destroy();

if(isset($_POST['product_id'])) {

    $kolicina = $_POST["quantity"];
    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_picture = $_POST["product_picture"];

    //print_r($product_picture);
    if(isset($_SESSION["shopping_cart"])) {

        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

        if(!in_array($product_id, $item_array_id)) {

            $count = count($_SESSION["shopping_cart"]);
           
            $item_array = array(
                    'item_id'			=>	$product_id,
                    'item_name'			=>	$product_name,
                    'item_price'		=>	$product_price,
                    'item_picture'      =>  $product_picture,
                    'item_quantity'		=>	$kolicina,
                    
            );

            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else {

            foreach ($_SESSION["shopping_cart"] as $key => $item) {

                if ($product_id == $item['item_id']) {

                    $_SESSION["shopping_cart"][$key]['item_quantity'] += $kolicina;
                }
            }
        }

       

        
    }
    else
    {
        $item_array = array(
            'item_id'			=>	$product_id,
            'item_name'			=>	$product_name,
            'item_price'		=>	$product_price,
            'item_picture'      =>  $product_picture,
            'item_quantity'		=>	$kolicina
        );

        $_SESSION["shopping_cart"][0] = $item_array;
    }

    $num_of_items = count($_SESSION["shopping_cart"]);

    if(isset($num_of_items)){

        $response = array(
            'num_of_items' => $num_of_items,
            'message'      => 'You have succesfully added the item.'
        );

    }

    echo json_encode($response);

  
    

   
}


if(isset($_POST['delete_product_id'])) {

    $product_id = $_POST["delete_product_id"];

    foreach($_SESSION["shopping_cart"] as $keys => $item)
    {
        if ($product_id == $item['item_id']) {
        
            unset($_SESSION["shopping_cart"][$keys]);

            $num_of_items = count($_SESSION["shopping_cart"]);

            $response = array(
                'num_of_items' => $num_of_items,
                'message'      => 'You have succesfully deleted the item.'
            );

            echo json_encode($response);
        }
    }
}



if(isset($_POST['quantity_product_id'])) {

    $quantity_product_id = $_POST["quantity_product_id"];
    $kolicina = $_POST["quantity"];

    foreach($_SESSION["shopping_cart"] as $key => $item)
    {
        if ($quantity_product_id == $item['item_id']) {

            $_SESSION["shopping_cart"][$key]['item_quantity'] = $kolicina;

            $response = array(
                'message'      => 'You have succesfully updated quantity.'
            );

            echo json_encode($response);
        }
    }

}













