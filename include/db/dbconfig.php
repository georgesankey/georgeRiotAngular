<?php
$db_host = "mysql51-075.wc1"; // "localhost:9090" or wherever your mysql server is
$db_name = "876215_devomb";
$username = "876215_devjp";
$password = "ti4kzA2akBKXry";
//establish a PDO Database Connection
 try {
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $username, $password);

 	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

 } catch (PDOException $e)
{
	die('sorry m8 could not connect'. $e);
}

?>

