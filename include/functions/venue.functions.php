<?php

/**
 * Requires $dbh to be set
 */
function getVenue($id) {

	global $dbh;
	
	$authQuery = $dbh->prepare("
		SELECT 
			v.id,
			v.name,
			v.comments,
			vc.contact_id, 
			c.first_name,
			c.last_name,
			c.cell_number,
			c.home_number,
			c.work_number,
			c.details,
			a.street_1,
			a.street_2,
			a.city,
			a.state,
			a.zipcode
		FROM VENUE v
		INNER JOIN VENUE_CONTACT vc ON vc.venue_id=v.id
		INNER JOIN CONTACT c ON vc.contact_id=c.id
		INNER JOIN ADDRESS a ON v.id=a.owner
		WHERE v.id = :id AND a.owner_type=2
	");

    $authQuery->bindParam(':id', $id);
    $authQuery->execute();
    $authRows = $authQuery->rowCount();

    if($authRows == 1) {
    	return $authQuery->fetch(PDO::FETCH_ASSOC);
    }

}

/**
 * In: String of contacts separated by comma
 * Out: PHP array of Strings
 */
function decodeContacts($contacts) {
	if(is_null($contacts)) return null;
	$contact_arr = explode(",", $contacts);
	return $contact_arr ? $contact_arr : null;
}

/**
 * Requires $dbh to be set
 * Creates new venue or edits existing venue.
 * Functionality is special because does not edit contacts/address directly
 */
function editVenue($venue) {
	global $dbh;

	$contacts = decodeContacts($venue["contacts"]);

	if(isset($venue["id"]) && !is_null($venue["id"])) {
		
		// Update data
		$authQuery = $dbh->prepare("
			UPDATE VENUE SET 
				name = :name,
				comments = :comments
			WHERE
				id = :id
		");

		$authQuery->bindParam(':name', $venue["name"]);
		$authQuery->bindParam(':comments', $venue["comments"]);
	    $authQuery->bindParam(':id', $venue["id"]);

	    if(!$authQuery->execute()) {
	    	return "Failed: ".$authQuery->errorInfo();
	    }

	    // Update contacts
	    $authQuery = $dbh->prepare("
			DELETE FROM VENUE_CONTACT 
			WHERE venue_id = :id
		");
		$authQuery->bindParam(':id', $venue["id"]);
		if(!$authQuery->execute()) {
	    	return "Failed: ".$authQuery->errorInfo();
	    }

	    if(!is_null($contacts)) {
	    	for($i=0;$i<count($contacts)) {
	    		$authQuery = $dbh->prepare("
					INSERT INTO VENUE_CONTACT (
						venue_id,
						contact_id
					)
					VALUES (
						:vid,
						:cid
					)
				");
				$authQuery->bindParam(':vid', $venue["id"]);
				$authQuery->bindParam(':cid', $contacts[$i]);
				if(!$authQuery->execute()) {
			    	return "Failed: ".$authQuery->errorInfo();
			    }
	    	}
	    }

	    // Set address
	    $authQuery = $dbh->prepare("
			UPDATE ADDRESS SET 
				owner_type = 1,
				owner = :vid
			WHERE
				id = :aid
		");
		$authQuery->bindParam(':vid', $venue["id"]);
	    $authQuery->bindParam(':aid', $venue["address"]);

	    if(!$authQuery->execute()) {
	    	return "Failed: ".$authQuery->errorInfo();
	    }
	    return "Success";

	} else {

		// Update data
		$authQuery = $dbh->prepare("
			INSERT INTO VENUE (
				name, 
				comments
			)
			VALUES (
				:name,
				:comments
			)
		");

		$authQuery->bindParam(':name', $venue["name"]);
		$authQuery->bindParam(':comments', $venue["comments"]);

	    if(!$authQuery->execute()) {
	    	return "Failed: ".$authQuery->errorInfo();
	    }

	    return "Success";
	}

}


/**
 * Requires $dbh to be set
 * Gets all venues in db
 */
function getAllVenues(){
	global $dbh;
	
	$authQuery = $dbh->prepare("
		SELECT 
			v.id,
			v.name,
			v.comments,
			vc.contact_id, 
			c.first_name,
			c.last_name,
			c.cell_number,
			c.home_number,
			c.work_number,
			c.details,
			a.street_1,
			a.street_2,
			a.city,
			a.state,
			a.zipcode
		FROM VENUE v
		INNER JOIN VENUE_CONTACT vc ON vc.venue_id=v.id
		INNER JOIN CONTACT c ON vc.contact_id=c.id
		INNER JOIN ADDRESS a ON v.id=a.owner
		WHERE a.owner_type=2
	");

    $authQuery->execute();
    return $authQuery->fetchAll(PDO::FETCH_ASSOC);
    
}

?>