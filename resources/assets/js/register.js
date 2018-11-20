$(document).ready(function(){

    $('.login-click').click(function(event){
        event.preventDefault();


        $.ajax({
            url: ProjectUrl +"/api/register",
            type: "post",
            data: $('#registerForm').serialize(),
            success:function(response){

                document.cookie='token_type='+response.token_type;
                document.cookie='access_token='+response.access_token;
                document.cookie='refresh_token='+response.refresh_token;

                window.location.href = ProjectUrl +"/user";
            },
            error:function(response){

                $('#headerMsg').show();

                var alertmessage ;
                if(response.responseJSON && response.responseJSON.error){
                    var count = 0;
                    $.each(response.responseJSON.error, function( index, value ) {
                        if(count === 0){
                            alertmessage = value ;
                        }else{
                            return false;
                        }
                        count = count +1;
                    });
                }
                $('#headerMsg').html("<div class='zi-top-margin alert alert-danger alert-dismissible fade in'>\n\<button class='close' type='button' data-dismiss='alert' aria-hidden='true'>x</button>\n\<i class='icon fa fa-ban'></i> "+alertmessage+"</div>");
                setTimeout(function() {
                    $('#headerMsg').hide("slow");
                }, 5000);

            }
        });

    });


});

