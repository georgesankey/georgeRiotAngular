<?php

/* API for obtaining user data */

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


// Route calls by action
$returnValue = 'An error has occured';

function getUserData($user=null) {

	global $dbh;

	if(is_null($user)) {
		$authQuery = $dbh->prepare("SELECT username, email, first_name, last_name, role_id, phone_number FROM USER WHERE (username = :user)");
	    $authQuery->bindParam(':user', $_SESSION['user']);
	    $authQuery->execute();
	    $authRows = $authQuery->rowCount();

	    return $authQuery->fetch(PDO::FETCH_ASSOC);
	}

	// Validate Credentials

	if($user != $_SESSION["user"]) {

	}
}

$returnValue = getUserData();
		

//         if($authRows == 1){
//         	$authRow = $authQuery->fetch();
//         	$roleQuery = $conn->prepare("SELECT role_name FROM ROLE WHERE role_id = :role_id");
//         	$roleQuery->bindParam('role_id', $authRow["role_id"]);
//         	$roleQuery->execute();
//         	$roleNameRow = $roleQuery->fetch();
//         	$returnJSON = array(
//         			(object) array(
//         				'authenticated' => true,
//         				 'role' => $roleNameRow["role_name"],
//         				 'roleid'=> $authRow["role_id"]
//         				)
//         			);
//         } else {
//         	$returnJSON = array(
//         		    (object) array(
//         				'authenticated' => false
//         				)
//         			);
//         }
//         //$conn->close();
//         return $returnJSON;
// }


exit(json_encode($returnValue));

?>