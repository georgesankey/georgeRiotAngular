<?php

/* API for obtaining sending a new notification */

/**
 * POST data should be:
 * $_POST["change"] -- what changed
 * $_POST["data"] -- data of that change
 */

// For Dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Authenticate use of API:
require_once __DIR__ . '/../include/db/dbconfig.php';
require __DIR__ . '/../include/Auth.php';
$auth = new OMBAuth($cfg, $dbh);

if(!$auth->loggedIn()) {
	die("403 Forbidden");
}

// Recieve notification and process it
function recieve() {

}

// Notifies all parties listening for this notification
function emit() {

}

?>