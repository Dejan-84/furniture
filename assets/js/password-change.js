$(document).ready(function() {

    $(document).on('submit', '#submit-form', function(event) {
        event.preventDefault();

        $('.text-danger').html('');

        var form = $(this).serialize();
         
        $.ajax({

            url: 'ajax/password-change-request.php',
            method: 'post',
            dataType: 'json',
            data: {form},

            success: function(response) {

                console.log(response);

                if(response.status) {

                    $('.modal-body').html(response.message);
                    $('#myModal').modal('show');

                    modal_fade('login.php');
                }
                else{	

                    $('.text-danger').html(response.message);
                }
            }

        });
    });

    function modal_fade(url) {
				
        $('#myModal').delay(3000).fadeOut('slow');

        setTimeout(function() {
            $("#myModal").modal('hide');
            window.location.href = url;
        }, 3000);
    }
});