<?php

function get_name()
{
session_start();

if(isset($_SESSION())
{
     echo ucfirst(@$_SESSION['user_name']);
}

else
{
     echo "";
}
}

//<?php session_start(); if(isset($_SESSION)) { echo ucfirst(@$_SESSION['user_name']); } else echo "";
?>