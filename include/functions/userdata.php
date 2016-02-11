<?php

/**
 * Requires $dbh and $_SESSION["user"] to be set
 */
function getUserData($user=null) {

	global $dbh;

	if(empty($user)) {
		$authQuery = $dbh->prepare("
			SELECT u.id, u.email, c.first_name, c.last_name, r.role_name, c.phone_number 
			FROM USER u
			LEFT JOIN ROLE r ON u.role_id = r.role_id
			LEFT JOIN CONTACT c ON u.id = c.user_id
			WHERE u.email = :user
		");
	    $authQuery->bindParam(':user', $_SESSION['user']);
	    $authQuery->execute();
	    $authRows = $authQuery->rowCount();

	    if($authRows == 1) {
	    	return $authQuery->fetch(PDO::FETCH_ASSOC);
	    }
	}

	// Validate Credentials
	// For now, we haven't created access levels yet
	// So using weird fix for now

	if($user != $_SESSION["user"]) {

		// Get personal data
		$data = getUserData();

		// Vet role
		if($data["role_name"] == "Administrator") {
			$authQuery = $dbh->prepare("
				SELECT u.id, u.email, c.first_name, c.last_name, r.role_name, c.phone_number 
				FROM USER AS u
				LEFT JOIN ROLE AS r ON u.role_id=r.role_id 
				LEFT JOIN CONTACT AS c ON u.id = c.user_id 
				WHERE u.id = :user 
			");
		} else {
			$authQuery = $dbh->prepare("
				SELECT u.id, u.email, c.first_name, c.last_name, c.phone_number 
				FROM USER AS u 
				LEFT JOIN CONTACT AS c ON u.id = c.user_id  
				WHERE u.id = :user 
			");
		}

	    $authQuery->bindParam(':user', $user);
	    $authQuery->execute();
	    $authRows = $authQuery->rowCount();

	    if($authRows == 1) {
	    	return $authQuery->fetch(PDO::FETCH_ASSOC);
	    }

	}
}






?>