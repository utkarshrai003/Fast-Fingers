    function authenticate_user()
    {
        $('#userName').hide();
    	var name = document.getElementById("name").value;
        var password = document.getElementById("password").value;

        var xmlhttp;

        if(window.XMLHttpRequest)
         {
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                //var response=XMLHttpRequest.responseText;
               // alert(xmlhttp.responseText);
                var name=xmlhttp.responseText.split(' ');
                //alert(name[0]);
                if(name[0]==1)
                {
                    //
                   // alert(name[1]);
                    $('#cover').hide();
                    $('#details').hide();
                    $('#userName' ).show(function(){
                        $('#userName span').html(name[1]);
                    });


                    //$('#username').html("<?php session_start(); if(isset($_SESSION)) { echo ucfirst(@$_SESSION['user_name']); } else echo ''; ?>");
                }
                else if(name[0]==2)
                {
                    $("#message").html('<div class="alert alert-danger"><p>User Id and Password do not match or no such user exists ...</p></div>');
                }
                else if(name[0]==0)
                {
                    $("#message").html('<div class="alert alert-danger"><p>Fields are left blank ...</p></div>');
                }
            }
          }
    }

    var data = "authenticate_user.php?&name=" + name + "&password=" + password;
    xmlhttp.open("get",data,true);
    xmlhttp.send();
}
