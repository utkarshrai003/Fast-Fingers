<?php

session_start();	

if (isset($_SESSION)) {
    session_unset();
    echo 1;
}
?>