function register_user()
{
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
				  //alert(xmlhttp.responseText);
                  if(xmlhttp.responseText==0)
                  {
                       // duplicate user or field blank
                       $("#message").html('<div class="alert alert-danger"><p>Duplicate user or fields left blank</p></div>');
                  }
                  else if(xmlhttp.responseText==1)
                  {
                      // query inserted
                      $('#message').html('<div class="alert alert-success"><p>User registered. Please login to continue ...</p></div>');
                      $('#button_replace').html('<button type="button" onclick="switch_buttons()" class="btn btn-danger" style="float:left">New user</button><button type="button" onclick="authenticate_user()" class="btn btn-success" style="float:right">Continue</button>');
                  }
			}
		}
	}


  var data = "register_user.php?&name="+name+"&password="+password;
  xmlhttp.open("get",data,true);
  xmlhttp.send();
}