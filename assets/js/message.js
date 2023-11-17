$(document).ready(function() {

    $(document).on('submit', '#postComment', function(event) {
        event.preventDefault();


        var form = $(this).serialize();
         
        $.ajax({

            url: 'ajax/message.php',
            method: 'post',
            dataType: 'json',
            data: {form},

            success: function(response) {

                console.log(response);

                if(!response.status) {

                    $('.text-danger').html(response.message);
                }
                /*else{

                    $('.text-danger').html(response.message);
                }*/
            }

        });

    
        
    });
});