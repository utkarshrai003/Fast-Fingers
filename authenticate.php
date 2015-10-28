<?php
include_once("connection.php");

$name = $_GET['name'];
$password = $_GET['password'];

$db = new Database();
$db->connect();
$send = 2;

// 0 not match
// 1 match
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
		if(strtolower($row[1])==strtolower($name) && $row[2]==$password)
		{
			 $_SESSION['user'] = ucfirst($row[1]);
             $send = 1;
             break;
		}
	}
}

echo $send;

?>