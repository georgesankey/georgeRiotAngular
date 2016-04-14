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


try {
  if (!empty($_GET['action']))
  {
   switch($_GET['action'])  {
    case 'getNotification' :
        getNotificationsAPI(); 
        break;
    case 'addNotification' :
        addNotificationAPI(); 
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


function getNotificationsAPI(){
$request = json_decode(file_get_contents("php://input"));
$returnValue = getNotifications();
exit(json_encode($returnValue)); 
}

function addNotificationAPI(){

		$data = json_decode(file_get_contents("php://input")); 
		//function addNotification($userid, $showid,$message,$date,$type){
		$userid      = $data->userid;   
		$showid      = $data->showid;   
		$message      = $data->message;   
		$date      = $data->date;   
		$type      = $data->type;   

		$returnValue = addNotification($userid ,$showid,$message,$date,$type);
		exit(json_encode($returnValue)); 

}

?>






