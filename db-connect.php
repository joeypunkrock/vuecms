<?php

$servername = "localhost";
$username = "root"; 
$password = "";
$dbase = "cms_v1";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('default_charset','utf8');
session_start();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbase);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
