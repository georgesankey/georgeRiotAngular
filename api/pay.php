<?php

/* API for getting and saving pay info */

// For Dev
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Authenticate use of API:
require_once __DIR__ . '/../include/db/dbconfig.php';
require __DIR__ . '/../include/Auth.php';
require __DIR__ . '/../include/functions/timeSheet.functions.php';
$auth = new OMBAuth($cfg, $dbh);

if(!$auth->loggedIn()) {
	die("403 Forbidden");
}



try {
  if (!empty($_GET['action']))
  {
   switch($_GET['action'])  {
    case 'getAllUsers' :
        getAllUsersAPI(); 
        break;
    case 'getAllTimeSheetEntries' :
        getAllTimeSheetEntriesAPI(); 
        break;
    default:
        if(isset($_POST["data"])) {
          $returnValue = editEntry($_POST["data"]);
          echo $returnValue;
        }
         break;
  } 
}
else {
      echo "An error has occured";
  }
    
} catch (Exception $ex) {
    echo $ex;
}



function getAllUsersAPI(){
$request = json_decode(file_get_contents("php://input"));
$returnValue = getAllUsers();
exit(json_encode($returnValue)); 
}

function getAllTimeSheetEntriesAPI(){
$request = json_decode(file_get_contents("php://input"));
$returnValue = getAllTimeSheetEntries();
exit(json_encode($returnValue)); 
}




?>