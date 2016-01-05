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

function decrypt_pass($text, $salt = "onlymakebelieve!") {

    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));

}

function encrypt_pass($text, $salt = "onlymakebelieve!") {

    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));

}

function checkEmail($email) {

	    require __DIR__ . '/../include/DB_Connect.php';
		$conn = (new DB_Connect())-> connect();
		$regQuery = $conn->prepare("SELECT * FROM USER WHERE email = :email");
		$regQuery->bindParam(':email', $email);
		$regQuery->execute();
		$regRows = $regQuery->rowCount();
		$returnJSON = '';
		if($regRows == 0){
			$returnJSON = array(
				(object) array(
						'isNewEmail' => true
					)
				);
		} else {
			$returnJSON = array(
				(object) array(
						'isNewEmail' => false
					)
				);
		}
		//$conn->close();
		return $returnJSON;

}

function checkUsername($username) {

 		require __DIR__ . '/../include/DB_Connect.php';
		$conn = (new DB_Connect())-> connect();
		$regQuery = $conn->prepare("SELECT * FROM USER WHERE username = :username");
		$regQuery->bindParam(':username', $username);
		$regQuery->execute();
		$regRows = $regQuery->rowCount();
		$returnJSON = '';
		if($regRows == 0){
			$returnJSON = array(
				(object) array(
						'isNewUsername' => true
					)
				);
		} else {
			$returnJSON = array(
				(object) array(
						'isNewUsername' => false
					)
				);
		}
		//$conn->close();
		return $returnJSON;
	
}

function addAccountRequest() {

 		require __DIR__ . '/../include/DB_Connect.php';
		$conn = (new DB_Connect())-> connect();
		$roleQuery = $conn->prepare("SELECT role_id FROM ROLE WHERE role_name = :role_name");
		$roleQuery->bindParam(':role_name', $_POST["useraccess"]);
		$roleQuery->execute();
		$roleRow = $roleQuery->fetch();

		$insertQuery = $conn->prepare("INSERT INTO USER (username, password, first_name, last_name, role_id, email, address_1, city, state, zipcode, phone_number) VALUES (?, PASSWORD('" . $_POST["password"] . "') ,?,?,?,?,?,?,?,?,?)");
		$insertQuery->bindParam(1, $_POST["username"]); 
		//$insertQuery->bindParam(":password", $_POST["password"]); 
		$insertQuery->bindParam(2, $_POST["firstname"]); 
		$insertQuery->bindParam(3, $_POST["lastname"]); 
		$insertQuery->bindParam(4, $roleRow["role_id"]); 
		$insertQuery->bindParam(5, $_POST["email"]); 
		$insertQuery->bindParam(6, $_POST["address"]); 
		$insertQuery->bindParam(7, $_POST["city"]); 
		$insertQuery->bindParam(8, $_POST["state"]); 
		$insertQuery->bindParam(9, $_POST["zipcode"]); 
		$insertQuery->bindParam(10, $_POST["phonenumber"]); 
 
		$insertQuery->execute();
		//$conn->close();
}


exit(json_encode($returnValue));

?>