$(document).ready(function () {

    $(document).on('click', '.add-to-cart', function(){
        

        var product_id = $(this).data('id');
        var product_name = $(this).data('name');
        var product_price = $(this).data('price');
        var product_picture = $(this).data('picture');
        var quantity = $('#quantity-' + product_id).val();

        //SLANJE AJAX POZIVA U FAJL ZA GENERISANJE PODATAKA O ARTIKLU
        $.ajax({  

            url:"ajax/add_to_cart.php",  
            method:"POST",
            dataType: 'json',  
            data:{product_id,product_name,product_price,product_picture,quantity},  

            success:function(response){  
                console.log(response);
                //alert(response.html);
                alert(response.message);
                $('.items-number').html(response.num_of_items);
                $('.cart-btn').html(response.html);
                
            }

        });

        console.log(quantity);

    });

    $(document).on('click', '.delete_item', function(){

        var delete_product_id = $(this).data('id');

        $.ajax({  

            url:"ajax/add_to_cart.php",  
            method:"POST",
            dataType: 'json',  
            data:{delete_product_id},  

            success:function(response){  
                console.log(response);

                //$('.items-number').html(response.num_of_items);
                alert(response.message);
                location.reload();
            }

        });

    });


})