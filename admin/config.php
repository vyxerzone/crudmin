<?php
// Error Reporting Turn On
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Setting up the time zone
date_default_timezone_set('Asia/Dhaka');

// Host Name
$dbhost = 'localhost';

// Database Name
$dbname = 'crud';

// Database Username
$dbuser = 'root';

// Database Password
$dbpass = '110315';

// Defining base url
define("BASE_URL", "http://crud.iz/");

try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $ex ) {
    echo "Connection error :" . $ex->getMessage();
}