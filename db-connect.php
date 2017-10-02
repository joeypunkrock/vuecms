<?php
require_once('settings.php');

// set ENV in settings file
switch (ENV) {
    case 'development':
        $host = "localhost";
        $dbname = "cms_v1";
        $username = "root"; 
        $password = "";
        break;
    case 'staging':
        $host = "";
        $dbase = "";
        $username = ""; 
        $password = "";
        break;
    case 'production':
        $host = "";
        $dbase = "";
        $username = ""; 
        $password = "";
        break;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('default_charset','utf8');
session_start();

// create connection
$conn = mysqli_connect($host, $username, $password, $dbname);
//$conn = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
