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
			e.from_date,
			e.to_date,
			e.administrator,
			e.venue_id
		FROM EVENT e
	");

    $eventQuery->execute();
    return $eventQuery->fetchAll(PDO::FETCH_ASSOC);  
}



function addEvent($data){

	global $dbh;	
	$repeatStatus = 1;
	$eventQuery = "INSERT INTO EVENT(administrator, show_name, show_status, from_date, to_date, repeat_status, venue_id, comments, created_time)
		VALUES (" 
		. "'" . $data->administrator . "',"
		. "'" . $data->show_name . "',"
		. "'" . $data->show_status . "',"
		. "'" . $data->from_date . "',"
	    . "'" . $data->to_date . "',"
		. "'" . $repeatStatus . "',"
		. "'" . $data->venue_id . "',"
		. "'" . $data->comments . "',"
		. "'" . $data->created_time . "')";

	$eventQuery = $dbh->prepare($eventQuery);
 	$eventQuery->execute();
 	return getAllEventsForScheduler();
}

?>