<?php

require __DIR__ . '/CallFunctions.php';
session_start();

class OMBRegister {


	public function __construct() {

	}


	public function usernameExists($username) {
		

        $regData = array("action"=>"checkUsername", "username"=>$username);
        $jsonRegArray =  json_decode(CallAPI("GET", "localhost/onlymakebelieve/api/userdata.php", $regData), true); 
	    return !$jsonRegArray[0]["isNewUsername"];
				
	}

	public function emailExists($email) {


        $regData = array("action"=>"checkEmail", "email"=>$email);
        $jsonRegArray =  json_decode(CallAPI("GET", "localhost/onlymakebelieve/api/userdata.php", $regData), true); 
	    return !$jsonRegArray[0]["isNewEmail"];
				
	}

	public function addAccountRequest($username, $password, $email, $firstname, $lastname, $address, $city, $state, $zipcode, $phonenumber, $useraccess){
        $regData = array("action"=>"addAccountRequest", "username"=>$username,  "password"=> $password, "email"=>$email, "firstname"=>$firstname, "lastname"=>$lastname, 
        	"address"=>$address, "city"=>$city, "state"=>$state, "zipcode"=>$zipcode, "phonenumber"=>$phonenumber, "useraccess"=>$useraccess);
        CallAPI("POST", "localhost/onlymakebelieve/api/userdata.php", $regData); 

	}



}	


?>