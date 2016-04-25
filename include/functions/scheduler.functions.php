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

    $eventsArray = $eventQuery->fetchAll(PDO::FETCH_ASSOC);

	foreach($eventsArray as &$event){

		$event["show_name"] = stripslashes($event["show_name"]);

		if($event["show_status"] == "Cancelled"){
			continue;
		} 

		$colorStatusQuery = $dbh->prepare("
			SELECT * 
			FROM EVENT_ROLE_USER er
			WHERE er.event_id = :event_id AND er.status = 0
		");

		$colorStatusQuery->bindParam("event_id", $event["id"]);
		$colorStatusQuery->execute();
		$colorStatusArr = $colorStatusQuery->fetchAll(PDO::FETCH_ASSOC);

		if(count($colorStatusArr) === 0){
			$event["show_status"] = "Scheduled";
		} else {
			$event["show_status"] = "Deferred";
		}

	}


    $statusArray = array(
    	array(
            "id" => -3,
            "show_name" => "Scheduled",
            "comments" => "...",
            "show_status" => "Scheduled",
            "from_date" => "2011-03-16 17:00:00",
            "to_date" => "2011-03-16 17:00:00",
            "administrator" => 1,
            "venue_id" => 1
        ),
      	array(
            "id" => -2,
            "show_name" => "Deferred",
            "comments" => "...",
            "show_status" => "Deferred",
            "from_date" => "2011-03-16 18:00:00",
            "to_date" => "2011-03-16 18:00:00",
            "administrator" => 1,
            "venue_id" => 1
        ),    	
        array(
            "id" => -1,
            "show_name" => "Cancelled",
            "comments" => "...",
            "show_status" => "Cancelled",
            "from_date" => "2011-03-16 19:00:00",
            "to_date" => "2011-03-16 19:00:00",
            "administrator" => 1,
            "venue_id" => 1
        ) 	
    );

    return array_merge($statusArray, $eventsArray);  
}



function addEvent($data){

	global $dbh;	
	$repeatStatus = 1;
	$eventQuery = "INSERT INTO EVENT(administrator, show_name, show_status, from_date, to_date, repeat_status, venue_id, comments, created_time)
		VALUES (" 
		. "'" . $data->administrator . "',"
		. "'" . addslashes($data->show_name) . "',"
		. "'" . $data->show_status . "',"
		. "'" . $data->from_date . "',"
	    . "'" . $data->to_date . "',"
		. "'" . $repeatStatus . "',"
		. "'" . $data->venue_id . "',"
		. "'" . addslashes($data->comments) . "',"
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

	$eventQuery = $dbh->prepare("DELETE FROM EVENT_ROLE_USER WHERE event_id = :event_id");
	$eventQuery->bindParam(":event_id", $data->id);
	$eventQuery->execute();	

	return getAllEventsForScheduler();

}


function changeEvent($data){

	global $dbh;	
	$eventQuery = $dbh->prepare("UPDATE EVENT 
		SET show_name = :show_name, comments = :comments, show_status = :show_status, from_date = :from_date, to_date = :to_date" . (is_null($data->venue_id) ? 
		"" : ", venue_id = :venue_id") . " WHERE id= :id");
	$showName = addslashes($data->show_name);
	$showComments = addslashes($data->comments);
	$eventQuery->bindParam(":show_name", $showName);
	$eventQuery->bindParam(":show_status", $data->show_status);
	$eventQuery->bindParam(":comments", $showComments);
	$eventQuery->bindParam(":from_date", $data->from_date);
	$eventQuery->bindParam(":to_date", $data->to_date);
	if(isset($data->venue_id)) $eventQuery->bindParam(":venue_id", $data->venue_id);

	$eventQuery->bindParam(":id", $data->id);
	$eventQuery->execute();
	return getAllEventsForScheduler();

}

?>