<?php

/* API for obtaining contacts */

// For Dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Authenticate use of API:
require_once __DIR__ . '/../include/db/dbconfig.php';
require __DIR__ . '/../include/Auth.php';
require __DIR__ . '/../include/functions/contacts.functions.php';
$auth = new OMBAuth($cfg, $dbh);

if(!$auth->loggedIn()) {
	die("403 Forbidden");
}

// Route calls by action
$returnValue = 'An error has occured';

if(isset($_GET["id"])) {
	$returnValue = getContact($_GET["id"]);
}

else if(isset($_POST["first_name"])) {
	$contact = array();

	$contact["id"] = isset($_POST["id"]) ? $_POST["id"] : null;
	$contact["first_name"] = $_POST["first_name"];
	$contact["last_name"] = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
	$contact["cell_number"] = isset($_POST["cell_number"]) ? $_POST["cell_number"] : "";
	$contact["home_number"] = isset($_POST["home_number"]) ? $_POST["home_number"] : "";
	$contact["work_number"] = isset($_POST["work_number"]) ? $_POST["work_number"] : "";
	$contact["details"] = isset($_POST["details"]) ? $_POST["details"] : "";
	$contact["user_id"] = isset($_POST["user_id"]) ? $_POST["user_id"] : 0;

	$returnValue = editContact($contact);
}

else {
	$returnValue = getAllContacts();
}


exit(json_encode($returnValue));

?>