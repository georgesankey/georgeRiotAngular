<?php

/**
 * Requires $dbh and $_SESSION["user"] to be set
 */
function getNotifications() {
    
       // print($user);
	global $dbh;
        $user = $_SESSION["userid"];
	if(!empty($user)) {
		$authQuery = $dbh->prepare("
			SELECT *
			FROM NOTIFICATION
			WHERE userId = :user
		");
	    $authQuery->bindParam(':user', $user);
	    $authQuery->execute();
	    $authRows = $authQuery->rowCount();

	    	return ($authRows > 0)? $authQuery->fetchAll() : null;
		} else {
			return null;	
		}	
            
//	    if($authRows > 0) {
//                
//	    	//return $authQuery->fetch(PDO::FETCH_ASSOC);
//	    }

	// Validate Credentials
	// For now, we haven't created access levels yet
	// So using weird fix for now

	if($user != $_SESSION["userid"]) {
             print("test");
		// Get personal data
		$data = getNotifications();

		// Vet role
		if($data["role_name"] == "Administrator") {
			$authQuery = $dbh->prepare("
			SELECT id, userId, message, date
			FROM NOTIFICATION
			WHERE userId = :user
			");
		} else {
			$authQuery = $dbh->prepare("
			SELECT id, userId, message, date
			FROM NOTIFICATION
			WHERE userId = :user
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