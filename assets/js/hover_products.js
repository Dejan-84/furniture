$(document).ready(function () {

    /*$('.moja').mouseenter(function() {
        $('.cart-dropdown').stop().slideDown(400);  
      }).mouseleave(function() {
         $('.cart-dropdown').stop().delay(800).slideUp(400);
      });*/

    $('.moja').hover(function(){
        //$(this).stop();
       
        var request_name = 'refresh_dropdown';

        $.ajax({  

            url:"ajax/hover_products.php",  
            method:"POST",
            dataType: 'json',  
            data:{request_name},  
            
            success:function(data){  
                console.log(data);
                
               
                $('.cart-dropdown').html(data.html); 
               
            }
           
        });
    });

    $('.cart-button').hover(function() {
 
        $('.cart-dropdown').css('display', 'block');
    });

    $('.cart-button').mouseout(function() {

        setTimeout(function() {

            $('.cart-dropdown').css('display', 'none');
        }, 2500);
    });
});