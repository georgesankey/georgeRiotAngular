<?php

/* API for getting and saving event maintenance details */

// For Dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Authenticate use of API:
require_once __DIR__ . '/../include/db/dbconfig.php';
require __DIR__ . '/../include/Auth.php';
require __DIR__ . '/../include/functions/event.maintenance.php';
$auth = new OMBAuth($cfg, $dbh);

if(!$auth->loggedIn()) {
	die("403 Forbidden");
}

// Route calls by action
$returnValue = 'An error has occured';

if($_GET["func"] == "getUsersForEvent" && $_GET["event"]){
	$returnValue = getUsersForEvent($_GET["event"]);
}
if($_GET["func"] == "getScriptsForEvent" && $_GET["event"]){
	$returnValue = getScriptsForEvent($_GET["event"]);
}

exit(json_encode($returnValue));

?>