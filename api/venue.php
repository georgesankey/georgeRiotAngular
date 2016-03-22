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
	}
}

exit(json_encode($returnValue));

?>