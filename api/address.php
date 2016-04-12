<?php

/* API for getting and saving venues */

// For Dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Authenticate use of API:
require_once __DIR__ . '/../include/db/dbconfig.php';
require __DIR__ . '/../include/Auth.php';
require __DIR__ . '/../include/functions/address.functions.php';
$auth = new OMBAuth($cfg, $dbh);

if(!$auth->loggedIn()) {
	die("403 Forbidden");
}

// Route calls by action
$returnValue = 'An error has occured';

if(isset($_GET["id"])) {
	$returnValue = getAddress($_GET["id"]);
} else if(isset($_POST["data"])) {
	$returnValue = editAddress($_POST["data"]);
}

exit(json_encode($returnValue));

?>