<?php
$db_host = "localhost"; // "localhost:9090" or wherever your mysql server is
$db_name ="omb_db";
$username = "root";
$password = "";
//establish a PDO Database Connection
 try {
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $username, $password);

 	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

 } catch (PDOException $e)
{
	die('sorry m8 could not connect'. $e);
}

?>
