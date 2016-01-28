<?php

function getAllAccountRequests() {

	global $dbh;

		if($_SESSION["role"] == 'Administrator'){
			$accountRequestQuery = $dbh->prepare("
				SELECT u.id, u.email, c.first_name, c.last_name, r.role_name, c.phone_number FROM USER u, ROLE r, CONTACT c
				WHERE u.active = '0' AND u.id = c.user_id AND r.role_id = u.role_id
			");
	    	$accountRequestQuery->execute();
	    	$accountRequestRows = $accountRequestQuery->rowCount();
	    	return ($accountRequestRows > 0)? $accountRequestQuery->fetchAll() : null;
		} else {
			return null;	
		}	
}






?>