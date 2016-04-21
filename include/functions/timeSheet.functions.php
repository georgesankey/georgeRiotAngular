<?php


function getAllUsers() {

	global $dbh;

		
			$retrieveUserQuery = $dbh->prepare("
				SELECT email, c.first_name, c.last_name, role_name, cell_number, home_number FROM USER u
				LEFT JOIN ROLE r ON u.role_id=r.role_id
				LEFT JOIN CONTACT c ON u.id=c.user_id
				WHERE u.active=1 and (r.role_name NOT LIKE 'Administrator')
			");
	    	$retrieveUserQuery->execute();	    	
	    	$numberOfUserRows = $retrieveUserQuery->rowCount();
	    	return ($numberOfUserRows > 0)? $retrieveUserQuery->fetchAll() : null;
		} 
			


?>