<?php

/* API for getting a user's notifications */

// For Dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Authenticate use of API:
require_once __DIR__ . '/../include/db/dbconfig.php';
require __DIR__ . '/../include/Auth.php';
//require __DIR__ . '/../include/functions/assigneEvents.functions.php';
require __DIR__ . '/../include/functions/notifications.php';

$auth = new OMBAuth($cfg, $dbh);

if(!$auth->loggedIn()) {
	die("403 Forbidden");
}

// Route calls by action
$returnValue = 'An error has occured';

$request = json_decode(file_get_contents("php://input"));

$returnValue = getNotifications();

exit(json_encode($returnValue));

?>