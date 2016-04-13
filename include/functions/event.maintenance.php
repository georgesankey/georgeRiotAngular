<?php

/**
 * Requires $dbh and $_SESSION["user"] to be set
 */

function isAdmin(){

	global $dbh;

		$accessQuery = $dbh->prepare("SELECT role_id FROM USER WHERE email = :email");
		$accessQuery->bindParam(":email", $_SESSION["user"]);  
		$accessQuery->execute();
		$accessRow = $accessQuery->fetch();

		return $accessRow["role_id"] == '1'? true : false;
}


function getUsersForEvent($eventId) {

	global $dbh;
	
	$usersQuery = $dbh->prepare("
		SELECT
			u.id, 
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
	
	$scriptsQuery = $dbh->prepare("
	select
        s.id,
        s.name,
        s.synopsis,
        CONCAT(c.first_name, ' ', c.last_name, ' (', u.email, ')') as creator_info,
        CONCAT(s.name, ' (ID: ', s.id, ')') as script_display_member,
        CONCAT(s.id, ', ', s.name, ', ', s.synopsis, ', ', CONCAT(c.first_name, ' ', c.last_name, ' (', u.email, ')')) as script_value_member
        FROM EVENT_SCRIPT es
        LEFT JOIN SCRIPTS s ON s.id = es.script_id
		LEFT JOIN USER u ON s.creator = u.id
		LEFT JOIN CONTACT c ON c.user_id = u.id 
		WHERE es.event_id = :event_id;     
    ");

	$scriptsQuery->bindParam(':event_id', $eventId);
	$scriptsQuery->execute();

	$scriptsArray = $scriptsQuery->fetchAll(PDO::FETCH_ASSOC);

	foreach($scriptsArray as &$script){
		$owners = "";
		$ownersArray = getScriptOwners($script["id"]);

		foreach($ownersArray as $owner){
			if($owner === end($ownersArray))
				$owners .= ($owner["owner_info"]);
			else		
				$owners .= ($owner["owner_info"] . ", ");
		}

		$script["owners"] = $owners;
	}

	return $scriptsArray;	
    
}

function getEMUsers($eventId){
	
	global $dbh; 
	
	$usersQuery = $dbh->prepare("
		select
	        u.id,
	        u.email,
	        c.first_name,
	        c.last_name,
	        c.cell_number,
	        c.home_number,
	        c.work_number,
	        CONCAT(u.id, ', ', u.email, ', ', c.first_name, ', ', c.last_name, ', ', c.cell_number, ', ', c.home_number, ', ', c.work_number) as value_member,			
            CONCAT(c.first_name, ' ', c.last_name, ' (', u.email, ')')  as display_member
		FROM USER u 
		LEFT JOIN CONTACT c ON c.user_id = u.id
        WHERE u.active = '1' AND u.id NOT IN(select eru.user_id from EVENT_ROLE_USER eru where eru.event_id = :eventId)
        GROUP BY u.id
	");

	$usersQuery->bindParam(':eventId', $eventId);
	$usersQuery->execute();

	return $usersQuery->fetchAll(PDO::FETCH_ASSOC);
}


function addUserToEventService($eventId, $userId, $roleId){

	global $dbh;

	$addUserQuery = $dbh->prepare("INSERT INTO EVENT_ROLE_USER (user_id, event_id, role_id) VALUES (?,?,?)");
	$addUserQuery->bindParam(1, $userId); 
	$addUserQuery->bindParam(2, $eventId);
	$addUserQuery->bindParam(3, $roleId); 
	$addUserQuery->execute();

	return array(
		0 => getEMUsers($eventId),
		1 => getUsersForEvent($eventId)
	);
}

function deleteUserFromEventService($eventId, $userId){

	global $dbh;

	$deleteUserQuery = $dbh->prepare("
		DELETE FROM EVENT_ROLE_USER WHERE event_id = :event_id AND user_id = :user_id");
	$deleteUserQuery->bindParam(':event_id', $eventId); 
	$deleteUserQuery->bindParam(':user_id', $userId);
	$deleteUserQuery->execute();

	return array(
		0 => getEMUsers($eventId),
		1 => getUsersForEvent($eventId)
	);
}


function getScriptOwners($scriptId){

	global $dbh;

	$ownersQuery = $dbh->prepare("
	select 
	CONCAT(c.first_name, ' ', c.last_name, ' (', u.email, ')') as owner_info
	FROM USER_SCRIPT us 
	LEFT JOIN USER u ON u.id = us.user_id
	LEFT JOIN CONTACT c ON c.user_id = u.id
	WHERE us.script_id = :script_id
	");
	$ownersQuery->bindParam(':script_id', $scriptId);
	$ownersQuery->execute();

	return $ownersQuery->fetchAll(PDO::FETCH_ASSOC);

}


function getEMScripts($eventId){

	global $dbh;
	
	$scriptsQuery = $dbh->prepare("
	select
        s.id,
        s.name,
        s.synopsis,
        CONCAT(c.first_name, ' ', c.last_name, ' (', u.email, ')') as creator_info,
        CONCAT(s.name, ' (ID: ', s.id, ')') as script_display_member,
        CONCAT(s.id, ', ', s.name, ', ', s.synopsis, ', ', CONCAT(c.first_name, ' ', c.last_name, ' (', u.email, ')')) as script_value_member
        FROM EVENT_SCRIPT es
        LEFT JOIN SCRIPTS s ON s.id = es.script_id
		LEFT JOIN USER u ON s.creator = u.id
		LEFT JOIN CONTACT c ON c.user_id = u.id 
		WHERE s.id NOT IN (select es.script_id from EVENT_SCRIPT es WHERE es.event_id = :event_id)
    ");

	$scriptsQuery->bindParam(':event_id', $eventId);
	$scriptsQuery->execute();

	$scriptsArray = $scriptsQuery->fetchAll(PDO::FETCH_ASSOC);

	foreach($scriptsArray as &$script){
		$owners = "";
		$ownersArray = getScriptOwners($script["id"]);

		foreach($ownersArray as $owner){
			if($owner === end($ownersArray))
				$owners .= ($owner["owner_info"]);
			else		
				$owners .= ($owner["owner_info"] . "\r\n");
		}
		$script["script_value_member"] .= ("," . $owners);
		$script["owners"] = $owners;
	}

	return $scriptsArray;

}


function addScriptToEventService($scriptId, $eventId){

	global $dbh;

	$addScriptQuery = $dbh->prepare("INSERT INTO EVENT_SCRIPT (event_id, script_id) VALUES (?,?)");
	$addScriptQuery->bindParam(1, $eventId); 
	$addScriptQuery->bindParam(2, $scriptId);
	$addScriptQuery->execute();

	return array(
		0 => getEMScripts($eventId),
		1 => getScriptsForEvent($eventId)
	);
}

function deleteScriptFromEventService($scriptId, $eventId){

	global $dbh;

	$deleteScriptQuery = $dbh->prepare("DELETE FROM EVENT_SCRIPT WHERE event_id = :event_id AND script_id = :script_id");

	$deleteScriptQuery->bindParam(':event_id', $eventId); 
	$deleteScriptQuery->bindParam(':script_id', $scriptId);
	$deleteScriptQuery->execute();

	return array(
		0 => getEMScripts($eventId),
		1 => getScriptsForEvent($eventId)
	);
}

?>