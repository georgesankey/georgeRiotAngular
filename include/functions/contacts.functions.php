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

    //$authQuery->bindParam(':id', $id);
    $authQuery->execute();
    //$authRows = $authQuery->rowCount();

    return $authQuery->fetchAll(PDO::FETCH_ASSOC);

}

/**
 * Requires $dbh and contact data
 */
function editContact($contact) {

	global $dbh;

	if(isset($contact["id"]) && !is_null($contact["id"])) {
		
		$authQuery = $dbh->prepare("
			UPDATE CONTACT SET 
				first_name = :firstname,
				last_name = :lastname,
				cell_number = :cell,
				home_number = :home,
				work_number = :work,
				details = :details,
				user_id = :userid
			WHERE
				id = :id
		");

		$authQuery->bindParam(':firstname', $contact["first_name"]);
		$authQuery->bindParam(':lastname', $contact["last_name"]);
		$authQuery->bindParam(':cell', $contact["cell_number"]);
		$authQuery->bindParam(':home', $contact["home_number"]);
		$authQuery->bindParam(':work', $contact["work_number"]);
		$authQuery->bindParam(':details', $contact["details"]);
	    $authQuery->bindParam(':userid', $contact["user_id"]);
	    $authQuery->bindParam(':id', $contact["id"]);

	    if($authQuery->execute()) {
	    	if($authQuery->rowCount() == 1) {
	    		return "Success";
	    	}
	    	return "Failed: No rows changed.";
	    }

	    return "Failed: ".$authQuery->errorInfo();

	} else {

		// Create new
		$authQuery = $dbh->prepare("
			INSERT INTO CONTACT (
				first_name, 
				last_name,
				cell_number,
				home_number,
				work_number,
				details,
				user_id
			) 
			VALUES (
				:firstname,
				:lastname,
				:cell,
				:home,
				:work,
				:details,
				:userid
			)
		");
		$authQuery->bindParam(':firstname', $contact["first_name"]);
		$authQuery->bindParam(':lastname', $contact["last_name"]);
		$authQuery->bindParam(':cell', $contact["cell_number"]);
		$authQuery->bindParam(':home', $contact["home_number"]);
		$authQuery->bindParam(':work', $contact["work_number"]);
		$authQuery->bindParam(':details', $contact["details"]);
	    $authQuery->bindParam(':userid', $contact["user_id"]);

	    if ($authQuery->execute()) {
	    	return "Success";
	    }

	    return "Failed: ".$authQuery->errorInfo();
	}

	
}

?>