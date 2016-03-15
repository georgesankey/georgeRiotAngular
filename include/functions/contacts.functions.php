<?php

/**
 * Requires $dbh to be set
 */
function getContact($id) {

	global $dbh;
	
	$authQuery = $dbh->prepare("
		SELECT * FROM CONTACT c
		WHERE c.id = :id
	");

    $authQuery->bindParam(':id', $id);
    $authQuery->execute();
    $authRows = $authQuery->rowCount();

    if($authRows == 1) {
    	return $authQuery->fetch(PDO::FETCH_ASSOC);
    }
    return false;

}

/**
 * Requires $dbh to be set
 */
function getAllContacts() {

	global $dbh;
	
	$authQuery = $dbh->prepare("
		SELECT * FROM CONTACT c
	");

    $authQuery->bindParam(':id', $id);
    $authQuery->execute();
    $authRows = $authQuery->rowCount();

    return $authQuery->fetchAll(PDO::FETCH_ASSOC);

}

/**
 * Requires $dbh and contact data
 */
function setContact($contact) {

	global $dbh;

	if(isset($contact["id"])) {
		// Try to edit
	} else {
		$authQuery = $dbh->prepare("
			INSERT INTO CONTACT (name, synopsis, creator) VALUES (:name, :synopsis, :userid)
		");
		$authQuery->bindParam(':name', $name);
		$authQuery->bindParam(':synopsis', $synopsis);
	    $authQuery->bindParam(':userid', $user_id);

	    if ($authQuery->execute()) {
	    	return "Success";
	    }

	    return "Failed: ".$authQuery->errorInfo();
	}

	
}

?>