function logout()
{
	var xmlhttp;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
              if(xmlhttp.responseText==1)
              {
                 window.location = "index.php";
              }
          	}
          }
	}

	var data = "logout.php";
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}