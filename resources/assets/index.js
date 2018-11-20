
    var allcookies =document.cookie;
    cookiearray = allcookies.split(';');


    var  accessToken="";

    // Now take key value pair out of this array
    for(var i=0; i<cookiearray.length; i++){
        name = cookiearray[i].split('=')[0];
        value = cookiearray[i].split('=')[1];
        if($.trim(name) == 'access_token'){
            accessToken = value ;
        }
    }

    if(accessToken == ""){
        window.location.href=ProjectUrl + '/';
    }

    $.ajaxSetup({
        beforeSend: function (xhr)
        {
            xhr.setRequestHeader("Accept","application/json");
            xhr.setRequestHeader("Authorization",'Bearer '  + accessToken);
        },
        complete: function (xhr,status)
        {
            console.log(xhr);
            console.log(status);


            // If ajax request fail or unauthorised then redirect on login page...
            if(xhr.status == 401){
                window.location.href = ProjectUrl + '/';
            }
        }
    });

