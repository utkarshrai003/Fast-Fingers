<?php

include_once 'connection.php';

$rand = rand(1 , 8);

$db = new Database();
$db->connect();

$query = "select string from strings where id = $rand";
$result = $db->run_query($query);

$row = mysqli_fetch_array($result);
$send = $row[0];

echo $send;

?>