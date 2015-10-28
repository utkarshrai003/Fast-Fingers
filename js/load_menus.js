function load_menus(x)
{
    var xmlhttp;

    if(window.XMLHttpRequest)
     {
      xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function()
      {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            if(x==1)
            {
                $("#menu1").html(xmlhttp.responseText);
            }
            else if(x==2)
            {
                $("#menu2").html(xmlhttp.responseText);
            }
            else if(x==3)
            {
                $("#menu3").html(xmlhttp.responseText);
            }
        }
      }
}

var data = "load_menus.php?&menu=" + x;
xmlhttp.open("get",data,true);
xmlhttp.send();
}
