<?php

/**
 * Requires $dbh and $_SESSION["user"] to be set
 */
function getScript($id) {

	global $dbh;
	
	$authQuery = $dbh->prepare("
		SELECT * FROM SCRIPTS s
		WHERE s.id = :id
	");

    $authQuery->bindParam(':id', $id);
    $authQuery->execute();
    $authRows = $authQuery->rowCount();

    if($authRows == 1) {
    	return $authQuery->fetch(PDO::FETCH_ASSOC);
    }

}

/**
 * Requires $dbh and $_SESSION["user"] to be set
 */
function getScriptsForUser($user=null) {

	global $dbh;

	// Personal search, use email
	if(empty($user)) {
		$authQuery = $dbh->prepare("
			SELECT s.id, s.name
			FROM SCRIPTS s
			RIGHT JOIN USER_SCRIPT us ON us.script_id = s.id
			INNER JOIN USER u ON u.id = us.user_id
			WHERE u.email = :user
		");
	    $authQuery->bindParam(':user', $_SESSION['user']);
	    $authQuery->execute();
	    //$authRows = $authQuery->rowCount();

	    return $authQuery->fetchAll(PDO::FETCH_ASSOC);
	}

	// Generic search, all access, use id
	else {
		$authQuery = $dbh->prepare("
			SELECT s.id, s.name
			FROM SCRIPTS s
			RIGHT JOIN USER_SCRIPT us ON us.script_id = s.id
			WHERE us.user_id = :user
		");
	    $authQuery->bindParam(':user', $user);
	    $authQuery->execute();
	    //$authRows = $authQuery->rowCount();

	    return $authQuery->fetchAll(PDO::FETCH_ASSOC);
	}
}

/**
 * Requires $dbh, changes or creates a script
 */
function editScript($id, $name, $synopsis, $user_id=null) {

	global $dbh;

	if(is_null($id)) {
		// Create a new script

		$authQuery = $dbh->prepare("
			INSERT INTO SCRIPTS (name, synopsis, creator) VALUES (:name, :synopsis, :userid)
		");
		$authQuery->bindParam(':name', $name);
		$authQuery->bindParam(':synopsis', $synopsis);
	    $authQuery->bindParam(':userid', $user_id);
	    

	    if ($authQuery->execute()) {
	    	return "Success";
	    }

	    return "Failed: ".$authQuery->errorInfo();

	} else {
		// Update this script
	}
}

?>