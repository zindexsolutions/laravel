$(document).ready(function(){

    $('.login-click').click(function(event){
        event.preventDefault();


        $.ajax({
            url: ProjectUrl +"/api/login",
            type: "post",
            data: $('#loginForm').serialize(),
            success:function(response){

                document.cookie='token_type='+response.token_type;
                document.cookie='access_token='+response.access_token;
                document.cookie='refresh_token='+response.refresh_token;

                window.location.href = ProjectUrl +"/user";
            },
            error:function(response){
                $('#headerMsg').html("<div class='zi-top-margin alert alert-danger alert-dismissible fade in'>\n\<button class='close' type='button' data-dismiss='alert' aria-hidden='true'>x</button>\n\<i class='icon fa fa-ban'></i> "+response.responseJSON.message+"</div>");
            }
        });

    });


});

