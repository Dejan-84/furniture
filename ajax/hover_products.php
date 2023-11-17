<?php
//error_reporting(0);
session_start();


if (isset($_POST['request_name']) && $_POST['request_name'] == 'refresh_dropdown') {
    
    if(!empty($_SESSION["shopping_cart"])) {

        $niz_podaci = array();
        
        
        $html ='<tr >
                    <th style="width:30%; text-align:center; border:1px solid #ccc8c8;">Item Name</th>
                    <th style="width:20%; text-align:center; border:1px solid #ccc8c8;">Item Picture</th>
                    <th style="width:30%; text-align:center; border:1px solid #ccc8c8;">Amount</th>
                    <th style="width:20%; text-align:center; border:1px solid #ccc8c8;">Total</th>
                </tr>';

        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            $name = $values["item_name"];
            $picture = $values["item_picture"];
            $cena = $values["item_price"];
            $kolicina = $values["item_quantity"];
            $total = $cena * $kolicina;

            $html.='<tr>
                        <td style="text-align:center; border:1px solid #ccc8c8;">'.$name.'</td>
                        <td style="border:1px solid #ccc8c8;"><img style="width:60px; height:auto; padding:3px; display:block; margin-left:auto; margin-right:auto;" src="'.$picture.'"></td>
                        <td style="text-align:center; border:1px solid #ccc8c8;">'.$kolicina.'</td>
                        <td style="text-align:center; border:1px solid #ccc8c8;">$'.number_format($total, 2).'</td>
                    </tr>';
        }
    }
    else { 
        
        $html = "<p style='text-align:center; padding:5px;'>Shopping cart is empty.</p>";
    }
   
    $niz_podaci['html'] = $html;

    echo json_encode($niz_podaci);

   
    /*$broj = count($_SESSION["shopping_cart"]);
     print_r($broj);
    if($broj > 0){


        $html.='<a href="shoping_cart.php"><i class="fa fa-shopping-cart"></i><span class="items-number">'.$broj.'</span></a>';

    }
    else{

        $html.='<a><i class="fa fa-shopping-cart"></i><span class="items-number">'.$broj.'</span></a>';

    } */
        
      
    

    
}    







   

   
  








