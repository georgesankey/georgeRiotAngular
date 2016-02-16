<?php

/* API for obtaining scripts */

// For Dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Authenticate use of API:
require_once __DIR__ . '/../include/db/dbconfig.php';
require __DIR__ . '/../include/Auth.php';
require __DIR__ . '/../include/functions/scripts.functions.php';
$auth = new OMBAuth($cfg, $dbh);

if(!$auth->loggedIn()) {
	die("403 Forbidden");
}

// Route calls by action
$returnValue = 'An error has occured';

if(isset($_GET["id"])) {
	$returnValue = getScript($_GET["id"]);
}

if(isset($_GET["user"])) {
	$returnValue = getScriptsForUser($_GET["user"]);
}

exit(json_encode($returnValue));

?>