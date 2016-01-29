<?php

function getAllAccountRequests() {

	global $dbh;

		if($_SESSION["role"] == 'Administrator'){
			$accountRequestQuery = $dbh->prepare("
				SELECT u.id, u.email, c.first_name, c.last_name, r.role_name, c.phone_number FROM USER u
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






?>