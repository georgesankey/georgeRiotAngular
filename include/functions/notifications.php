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
			ORDER BY timestamp DESC
			LIMIT 5
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



function addNotification($userid, $showid,$message,$date,$type){

        
	global $dbh;
	if(!empty($userid)) {

					// Create new
		$authQuery = $dbh->prepare("
			INSERT INTO NOTIFICATION (
				userId, 
				show_id,
				message,
				date,
				type,
				timestamp
			) 
			VALUES (
				:userid,
				:showid,
				:message,
				:date,
				:type,
				:timestamp
			)
		");
		$curr_timestamp = date('Y-m-d H:i:s');
		$authQuery->bindParam(':userid', $userid);
		$authQuery->bindParam(':showid',$showid);
		$authQuery->bindParam(':message', $message);
		$authQuery->bindParam(':date', $date);
		$authQuery->bindParam(':type', $type);
		$authQuery->bindParam(':timestamp', $curr_timestamp);


	    if ($authQuery->execute()) {
	    	return "Success";
	    }else {
	    	return "Failed: ".$authQuery->errorInfo();
	    }

}
else {
			return 'erorr bruh';	
		}	
            
}

?>