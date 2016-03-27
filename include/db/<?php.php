<?php

$db_host = "localhost";
$db_name = "omb_db";
$username = "root";
$password = "pass";
$port = 3306;

try {
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name",$username,$password);
	$dbh ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
	die('sorry m8 could not connect'. $e);
}


?>

