<?php

/**
 * Requires $dbh and $_SESSION["user"] to be set
 */
function getAllEventsForScheduler() {

	global $dbh;
	
	$eventQuery = $dbh->prepare("
		SELECT  
			e.id,
			e.show_name,
			e.comments,
			e.show_status,
			e.from,
			e.to,
			e.administrator,
			e.venue_id
		FROM EVENT e
	");

    $eventQuery->execute();
    return $eventQuery->fetchAll(PDO::FETCH_ASSOC);  
}

?>