<?php


function getAllAccountRequests() {

	global $dbh;

		if(isAdmin()){
			$accountRequestQuery = $dbh->prepare("
				SELECT u.id, u.active, u.email, c.first_name, c.last_name, r.role_name, c.phone_number FROM USER u
				LEFT JOIN ROLE r ON u.role_id=r.role_id
				LEFT JOIN CONTACT c ON u.id=c.user_id
				WHERE u.active=0
			");
	    	$accountRequestQuery->execute();
	    	$accountRequestRows = $accountRequestQuery->rowCount();
	    	return ($accountRequestRows > 0)? $accountRequestQuery->fetchAll() : null;
		} else {
			return null;	
		}	
}

function acceptAccountRequest($rowId){

	global $dbh;

		if(isAdmin()){
			$acceptAccountQuery = $dbh->prepare("
				UPDATE USER u
				SET u.active = '1'
				WHERE u.id = :id" 
				);
			$acceptAccountQuery->bindParam(":id", $rowId);
			$acceptAccountQuery->execute();
			return getAllAccountRequests();
		}
			return null;
}

function rejectAccountRequest($rowId){

	global $dbh;

		if(isAdmin()){

			//delete from address table first
			$rejectAccountQuery = $dbh->prepare("
				DELETE FROM ADDRESS
				WHERE owner = " . $rowId);
			$rejectAccountQuery->execute();

			//contact table 
			$rejectAccountQuery = $dbh->prepare("
				DELETE FROM CONTACT
				WHERE user_id = " . $rowId);
			$rejectAccountQuery->execute();

			//user table
			$rejectAccountQuery = $dbh->prepare("
				DELETE FROM USER
				WHERE id = " . $rowId);
			$rejectAccountQuery->execute();					

			return getAllAccountRequests();
		}
			return null;
		
}

function isAdmin(){

	global $dbh;

		$accessQuery = $dbh->prepare("SELECT role_id FROM USER WHERE email = :email");
		$accessQuery->bindParam(":email", $_SESSION["user"]);  
		$accessQuery->execute();
		$accessRow = $accessQuery->fetch();

		return $accessRow["role_id"] == '1'? true : false;
}





?>