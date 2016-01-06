<?php

/* USED FOR THE SESSION USER DATA AS WELL AS AUTHENTICATION*/

$returnValue = 'An error has occured';

$switchValue = isset($_GET["action"]) ? $_GET["action"] : $_POST["action"];

switch($switchValue){
	case 'loginService': 
		$decryptPass = decrypt_pass($_GET["password"]);
		$returnValue = loginService($_GET["username"], $decryptPass);
 		break;
 	case 'checkEmail':
 		$returnValue = checkEmail($_GET["email"]);
 		break;	
 	case 'checkUsername':
		$returnValue = checkUsername($_GET["username"]);
		break;
 	case 'addAccountRequest':
		addAccountRequest();
		break;		
 	default:
 	echo 'defaultService';
 		break;

}

function loginService($username, $password){
	    require __DIR__ . '/../include/DB_Connect.php';
		$conn = (new DB_Connect())-> connect();
		$authQuery = $conn->prepare("SELECT * FROM USER WHERE (username = :usernameOrEmail OR email = :usernameOrEmail) AND password = PASSWORD(:password) AND active = '1'");
	    $authQuery->bindParam(':usernameOrEmail', $username);
	    $authQuery->bindParam(':password', $password);
        $authQuery-> execute();
        $authRows = $authQuery->rowCount();

        if($authRows == 1){
        	$authRow = $authQuery->fetch();
        	$roleQuery = $conn->prepare("SELECT role_name FROM ROLE WHERE role_id = :role_id");
        	$roleQuery->bindParam('role_id', $authRow["role_id"]);
        	$roleQuery->execute();
        	$roleNameRow = $roleQuery->fetch();
        	$returnJSON = array(
        			(object) array(
        				'authenticated' => true,
        				 'role' => $roleNameRow["role_name"],
        				 'roleid'=> $authRow["role_id"]
        				)
        			);
        } else {
        	$returnJSON = array(
        		    (object) array(
        				'authenticated' => false
        				)
        			);
        }
        //$conn->close();
        return $returnJSON;
}


exit(json_encode($returnValue));

?>