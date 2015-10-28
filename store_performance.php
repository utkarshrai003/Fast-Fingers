<?php

session_start();

include_once 'connection.php';

$wpm = $_GET['wpm'];
$correct = $_GET['correct'];
$incorrect = $_GET['incorrect'];
$keystrokes = $_GET['keystrokes'];
$accuracy = $_GET['accuracy'];

$db = new Database();
$db->connect();

$query = "select user_id from users where lower(user_name)= '". strtolower($_SESSION['user_name']) . "'";
$result = $db->run_query($query);

$row = mysqli_fetch_array($result);
$user_id = $row[0];

$query = "insert into ranking (user_id , wpm , correct , incorrect , keystrokes , accuracy) values ('$user_id' , '$wpm' , '$correct' , '$incorrect' , '$keystrokes' , '$accuracy')";
$result = $db->run_query($query);

?>