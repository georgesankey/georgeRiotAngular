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


function deleteEvent($data){

	global $dbh;	
	$eventQuery = $dbh->prepare("DELETE FROM EVENT WHERE id = :id");
	$eventQuery->bindParam(":id", $data->id);
	$eventQuery->execute();
	return getAllEventsForScheduler();

}


function changeEvent($data){

	global $dbh;	
	$eventQuery = $dbh->prepare("UPDATE EVENT 
		SET show_name = :show_name, comments = :comments, show_status = :show_status, from_date = :from_date, to_date = :to_date, venue_id = :venue_id
		WHERE id= :id");
	$eventQuery->bindParam(":show_name", $data->show_name);
	$eventQuery->bindParam(":show_status", $data->show_status);
	$eventQuery->bindParam(":comments", $data->comments);
	$eventQuery->bindParam(":from_date", $data->from_date);
	$eventQuery->bindParam(":to_date", $data->to_date);
	$eventQuery->bindParam(":venue_id", $data->venue_id);

	$eventQuery->bindParam(":id", $data->id);
	$eventQuery->execute();
	return getAllEventsForScheduler();

}

?>