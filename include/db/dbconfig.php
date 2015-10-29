<?php

/**
 * Database config variables
 */
<?php
$db_host = ""; // "localhost:9090" or wherever your mysql server is
$db_name ="";
$username = "";
$password = "";
//establish a PDO Database Connection
$dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $username, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
?>