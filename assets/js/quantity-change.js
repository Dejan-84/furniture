jQuery(document).ready(($) => {
   
    $(document).on('click', '.plus', function(e) {
     
        let $input = $(this).prev('input.qty');
        let val = parseInt($input.val());
        $input.val( val+1 ).change();
    });

    $(document).on('click', '.minus',  function(e) {

        let $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        if (val > 1) {
            $input.val( val-1 ).change();
        } 
    
    });
});


jQuery(document).ready(($) => {
   
    $(document).on('click', '.plus2', function(e) {
     
        let $input = $(this).prev('input.qty');
        let val = parseInt($input.val());
        $input.val( val+1 ).change();

        update_quantity(this);
        
    });

    $(document).on('click', '.minus2',  function(e) {

        let $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        if (val > 1) {
            $input.val( val-1 ).change();
        } 
        
        update_quantity(this);
    });

    function update_quantity(button) {

        var total = 0;

        var quantity_product_id = $(button).data('id');
        var quantity = $('#quantity-' + quantity_product_id).val();
        var item_price = $('#item-price-' + quantity_product_id).html().substring(1);
        total = '$' + (quantity * item_price).toFixed(2);
        
        //SLANJE AJAX POZIVA U FAJL ZA GENERISANJE PODATAKA O ARTIKLU
        $.ajax({  

            url:"ajax/add_to_cart.php",  
            method:"POST",
            dataType: 'json',  
            data:{quantity_product_id,quantity},  

            success:function(response){  
                console.log(response);

                alert(response.message);

                $('#item-total-' + quantity_product_id).html(total);

                calculate_sum();
            }

        });
        
    }

    function calculate_sum() {

        var total = 0;

        $('.item-total').each(function() {

            var value = $(this).html().substring(1);
            total += parseInt(value);
        });

        total = '$' + (total).toFixed(2);

        console.log(total);
        $('#total-sum').html(total);
    }
});