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

function createVenue() {
	
}

?>