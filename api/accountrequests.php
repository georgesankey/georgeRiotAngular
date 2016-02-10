<?php

/* API for obtaining account requests */

// For Dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Authenticate use of API:
require_once __DIR__ . '/../include/db/dbconfig.php';
require __DIR__ . '/../include/Auth.php';
require __DIR__ . '/../include/functions/accountrequests.php';
$auth = new OMBAuth($cfg, $dbh);

if(!$auth->loggedIn()) {
	die("403 Forbidden");
}

// Route calls by action
$returnValue = 'An error has occured';

$request = json_decode(file_get_contents("php://input"));

$returnValue = isset($request->service) ?
	 ($request->service == 'accept'?
	 	 acceptAccountRequest($request->user) : rejectAccountRequest($request->user)) : getAllAccountRequests();

exit(json_encode($returnValue));
?>