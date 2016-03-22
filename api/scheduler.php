<?php

/* API for getting and saving events */

// For Dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Authenticate use of API:
require_once __DIR__ . '/../include/db/dbconfig.php';
require __DIR__ . '/../include/Auth.php';
require __DIR__ . '/../include/functions/scheduler.functions.php';
$auth = new OMBAuth($cfg, $dbh);

if(!$auth->loggedIn()) {
	die("403 Forbidden");
}

$returnValue = 'An error has occured';

// Getting event by id
if(isset($_GET["func"]) && ($_GET["func"] == "getAllEventsForScheduler")) {
	$returnValue = getAllEventsForScheduler();
}

exit(json_encode($returnValue));

?>