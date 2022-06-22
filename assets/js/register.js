$(document).ready(function() {

    $(document).on('submit', '#register-form', function(event) {
        event.preventDefault();

        var csrf = $('meta[name="csrf"]').attr('content');

        var form = $(this).serialize();
         
        $.ajax({

            url: 'ajax/register_korisnika.php',
            method: 'post',
            dataType: 'json',
            data: {form, csrf},

            success: function(response) {

                console.log(response);

                if(response.status) {

                    window.location.href = response.redirect_url;
                }
                else{

                    $('.text-danger').html(response.message);
                }
            }

        });

    
        
    });
});
