<?php

/**
 * Requires $dbh and $_SESSION["user"] to be set
 */



function getEvent($id) {

	global $dbh;
	
	$authQuery = $dbh->prepare("
		SELECT * FROM EVENT e
		WHERE e.id = :id
	");

    $authQuery->bindParam(':id', $id);
    $authQuery->execute();
    $authRows = $authQuery->rowCount();

    if($authRows == 1) {
    	return $authQuery->fetchAll(PDO::FETCH_ASSOC);
    }

}


function getAssignedEvents() {

	global $dbh;
        $user = $_SESSION["userid"];
	if(!empty($user)) {
		$authQuery = $dbh->prepare("
                    SELECT s.id, s.show_name, s.show_status, s.from, s.to,z.role_name, r.status, r.id as eventUserid FROM EVENT s 
                    LEFT JOIN EVENT_ROLE_USER r ON s.id = r.event_id
                    LEFT JOIN ROLE z ON r.role_id = z.role_id  
                    LEFT JOIN CONTACT c ON r.user_id = c.user_id 
                    WHERE c.user_id = :user
		");
	    $authQuery->bindParam(':user', $user);
	    $authQuery->execute();
	    $authRows = $authQuery->rowCount();

	    	return ($authRows > 0)? $authQuery->fetchAll() : null;
		} else {
			return null;	
		}

}


function acceptEvent($rowId){

        
	global $dbh;
        $user = $_SESSION["userid"];
	if(!empty($user)) {
			$acceptAccountQuery = $dbh->prepare("
				UPDATE EVENT_ROLE_USER u
				SET u.status = 'Accepted'
				WHERE u.id = :id" 
				);
			$acceptAccountQuery->bindParam(":id", $rowId);
			$acceptAccountQuery->execute();
                        return getAllAccountRequests();
		}
			return $rowId;
		
}

function rejectEvent($rowId){

        
	global $dbh;
        $user = $_SESSION["userid"];
	if(!empty($user)) {
			$acceptAccountQuery = $dbh->prepare("
				UPDATE EVENT_ROLE_USER u
				SET u.status = 'Rejected'
				WHERE u.id = :id" 
				);
			$acceptAccountQuery->bindParam(":id", $rowId);
			$acceptAccountQuery->execute();
                        return getAllAccountRequests();
		}
			return $rowId;
		
}

?>