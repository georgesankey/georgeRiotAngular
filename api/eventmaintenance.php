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

$request = json_decode(file_get_contents("php://input"));

if(!isset($request)){

if($_GET["func"] == "getUsersForEvent" && isset($_GET["event"])){
	$returnValue = getUsersForEvent($_GET["event"]);
} else if($_GET["func"] == "getScriptsForEvent" && isset($_GET["event"])){
	$returnValue = getScriptsForEvent($_GET["event"]);
} else if($_GET["func"] == "getEMUsers" && isset($_GET["event"])){
	$returnValue = getEMUsers($_GET["event"]);
} else if($_GET["func"] == "getEMScripts" && isset($_GET["event"])){
	$returnValue = getEMScripts($_GET["event"]);	
} else if($_GET["func"] == "getScriptOwners" && isset($_GET["script"])){
	$returnValue = getScriptOwners($_GET["script"]);		
}
} else {
if($request->service === "addUser" && isset($request->event) && isset($request->user) && isset($request->role)){
	$returnValue = addUserToEventService($request->event, $request->user, $request->role);
} else if($request->service === "deleteUser" && isset($request->event) && isset($request->user)){
	$returnValue = deleteUserFromEventService($request->event, $request->user);
} else if($request->service === "addScript" && isset($request->script) && isset($request->event)){
	$returnValue = addScriptToEventService($request->script, $request->event);
} else if($request->service === "deleteScript" && isset($request->script) && isset($request->event)){
	$returnValue = deleteScriptFromEventService($request->script, $request->event);	
}
}
exit(json_encode($returnValue));

?>