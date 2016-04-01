<?php

/* API for getting a user's notifications */

// For Dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Authenticate use of API:
require_once __DIR__ . '/../include/db/dbconfig.php';
require __DIR__ . '/../include/Auth.php';
require __DIR__ . '/../include/functions/events.functions.php';
$auth = new OMBAuth($cfg, $dbh);

if(!$auth->loggedIn()) {
	die("403 Forbidden");
}

try {
  if (!empty($_GET['action']))
  {
   switch($_GET['action'])  {
    case 'get_assigned_events' :
        getAssignedEventsAPI(); 
        break;
    case 'accept_event' :
        acceptEventAPI(); 
        break;
   case 'reject_event' :
        rejectEventAPI(); 
        break;
    default:
        $returnValue = 'An error has occured';
         break;
} 
  }else {
      echo "An error has occured";
  }
    
} catch (Exception $ex) {
    echo $ex;
}

function getAssignedEventsAPI(){
$request = json_decode(file_get_contents("php://input"));
$returnValue = getAssignedEvents();
exit(json_encode($returnValue)); 
}

function acceptEventAPI(){
    $data = json_decode(file_get_contents("php://input")); 
    $eventID      = $data->eventUserID;    
        
$returnValue = acceptEvent($eventID);
exit(json_encode($returnValue)); 
}

function rejectEventAPI(){
    $data = json_decode(file_get_contents("php://input")); 
    $eventID      = $data->eventUserID;    
        
$returnValue = rejectEvent($eventID);
exit(json_encode($returnValue)); 
}

?>