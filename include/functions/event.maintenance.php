<?php

/**
 * Requires $dbh and $_SESSION["user"] to be set
 */
function getUsersForEvent($eventId) {

	global $dbh;
	
	$usersQuery = $dbh->prepare("
		SELECT 
			r.role_name,
			us.status,
			u.email,
			c.first_name,
			c.last_name,
			c.cell_number,
			c.work_number,
			c.home_number
		FROM EVENT_ROLE_USER eru
		LEFT JOIN USER u ON u.id = eru.user_id
		LEFT JOIN ROLE r ON r.role_id = eru.role_id
		LEFT JOIN CONTACT c ON c.user_id = eru.user_id
		LEFT JOIN USER_STATUS us ON us.status_id = eru.status
		WHERE eru.event_id = :id
		ORDER BY c.first_name
	");

    $usersQuery->bindParam(':id', $eventId);
    $usersQuery->execute();

    return $usersQuery->fetchAll(PDO::FETCH_ASSOC);
    
}


function getScriptsForEvent($eventId) {

	global $dbh;
	
	$scriptQuery = $dbh->prepare("
		SELECT 
			es.script_id,
			s.name, 
			s.synopsis,
			us.user_id,
			u.email, 
			c.first_name,
			c.last_name,
			c.cell_number,
			c.home_number,
			c.work_number
		FROM EVENT_SCRIPT es
		LEFT JOIN SCRIPTS s ON s.id  = es.script_id
		LEFT JOIN USER_SCRIPT us ON us.script_id = s.id
		LEFT JOIN USER u ON u.id = us.user_id
		LEFT JOIN CONTACT c ON c.user_id = u.id
		WHERE es.event_id = :id
		ORDER BY es.script_id
	");

    $scriptQuery->bindParam(':id', $eventId);
    $scriptQuery->execute();

    return $scriptQuery->fetchAll(PDO::FETCH_ASSOC);
    

}

?>