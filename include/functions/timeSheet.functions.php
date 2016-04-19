<?php


function getAllUsers() {

	global $dbh;

		
			$retrieveUserQuery = $dbh->prepare("
				SELECT c.first_name, c.last_name FROM USER u
				LEFT JOIN ROLE r ON u.role_id=r.role_id
				LEFT JOIN CONTACT c ON u.id=c.user_id
				WHERE u.active=1
			");
	    	$retrieveUserQuery->execute();	    	
	    	$numberOfUserRows = $retrieveUserQuery->rowCount();
	    	return ($numberOfUserRows > 0)? $retrieveUserQuery->fetchAll() : null;
		} 
			


?>