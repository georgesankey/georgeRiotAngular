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

if(isset($_POST["name"]) || isset($_POST["id"])) {
	$script_id = isset($_POST["id"]) ? $_POST["id"] : null;
	$script_name = isset($_POST["name"]) ? $_POST["name"] : null;
	$script_synopsis = isset($_POST["synopsis"]) ? $_POST["synopsis"] : null;
	$user_id = isset($_POST["user_id"]) ? $_POST["user_id"] : null;
	
	$returnValue = editScript($script_id, $script_name, $script_synopsis, $user_id);
}


exit(json_encode($returnValue));

?>