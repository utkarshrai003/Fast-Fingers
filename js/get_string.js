function get_string()
{
  var data = "hello";
	var xmlhttp;
  var send;

	if(window.XMLHttpRequest)
	{
          xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
          	if(xmlhttp.readyState==4 && xmlhttp.status==200)
          	{
              send =  xmlhttp.responseText;
              alert(send);
              return send;
          	}
          }
	}

	var data = "get_string.php";
	xmlhttp.open("get",data,true);
  xmlhttp.send();
}