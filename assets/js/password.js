$(document).ready(function() {

    $(document).on('submit', '#submit-form', function(event) {
        event.preventDefault();


        var form = $(this).serialize();
         
        $.ajax({

            url: 'ajax/password.php',
            method: 'post',
            dataType: 'json',
            data: {form},

            success: function(response) {

                console.log(response);
                
                $('.text-danger').html(response.message);
            }

        });

    
        
    });
});