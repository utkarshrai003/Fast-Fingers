<?php
include_once("connection.php");

$name = $_GET['name'];
$password = $_GET['password'];

$db = new Database();
$db->connect();
$send = 2;

// 0 for user existes or empty field
// 1 for ok value inserted
if(empty($name) || empty($password))
{
     $send = 0;
}
else
{	
	$query = "select * from users";
	$result = $db->run_query($query);

	while($row = mysqli_fetch_array($result))
	{
		if(strtolower($row[1])==strtolower($name))
		{
             $send = 0;
             break;
		}
	}

    if($send!=0)
	    {
	    $query = "insert into users (user_name , password) values ('$name' , '$password')";
	    $result = $db->run_query($query);
	    if($result)
	        $send = 1;
	    else
	    	$send = 0;
	    }
}


echo $send;

?>