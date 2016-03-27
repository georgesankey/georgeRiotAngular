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

$request = json_decode(file_get_contents("php://input"));


if(isset($_GET["func"])){
	if($_GET["func"] == "getAllEventsForScheduler"){
		$returnValue = getAllEventsForScheduler();
	} else if($_GET["func"] == "showMaintenance"){
		if(isset($request->service)){
			if($request->service == 'add'){
				$returnValue = addEvent($request->data);
			} else if($request->service == 'change'){

			} else if($request->service == 'delete'){

			}	
		}
	}
}


exit(json_encode($returnValue));

?>