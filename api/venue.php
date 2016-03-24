<?php

/* API for getting and saving venues */

// For Dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Authenticate use of API:
require_once __DIR__ . '/../include/db/dbconfig.php';
require __DIR__ . '/../include/Auth.php';
require __DIR__ . '/../include/functions/venue.functions.php';
$auth = new OMBAuth($cfg, $dbh);

if(!$auth->loggedIn()) {
	die("403 Forbidden");
}

// Route calls by action
$returnValue = 'An error has occured';

if(isset($_GET["func"])) {
	
	if($_GET["func"] == "getAllVenues"){
		$returnValue = getAllVenues();
	} else if($_GET["func"] == "getVenue" && isset($_GET["venue"])){
		$returnValue = getVenue($_GET["venue"]);
	} else if($_GET["func"] == "editVenue") {
		$venue = array();

		$venue["id"] = isset($_POST["id"]) ? $_POST["id"] : null;
		$venue["name"] = isset($_POST["name"]) ? $_POST["name"] : "";
		$venue["comments"] = isset($_POST["comments"]) ? $_POST["comments"] : "";
		$venue["contacts"] = isset($_POST["contacts"]) ? $_POST["contacts"] : null;
		$venue["address"] = isset($_POST["address"]) ? $_POST["address"] : null;

		$returnValue = getVenue($venue);
	}
}

exit(json_encode($returnValue));

?>