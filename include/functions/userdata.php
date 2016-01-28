<?php

function getUserData($user=null) {

	global $dbh;

	if(empty($user)) {
		$authQuery = $dbh->prepare("
			SELECT u.email, c.first_name, c.last_name, r.role_name, c.phone_number FROM USER u, ROLE r, CONTACT c
			WHERE u.email = :user AND u.id = c.user_id AND r.role_id = u.role_id
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
				SELECT u.email, c.first_name, c.last_name, r.role_name, c.phone_number FROM USER AS u, ROLE AS r, CONTACT as c  
				WHERE u.email = :user AND u.id = c.user_id AND r.role_id = u.role_id
			");
		} else {
			$authQuery = $dbh->prepare("
				SELECT u.email, c.first_name, c.last_name, c.phone_number FROM USER AS u, CONTACT as c   
				WHERE u.email = :user AND u.id = c.user_id
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