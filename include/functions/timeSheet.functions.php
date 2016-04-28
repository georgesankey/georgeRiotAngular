<?php
include_once(__DIR__."/../classes/PersistentObject.php");

function getAllUsers() {

	global $dbh;

		
			$retrieveUserQuery = $dbh->prepare("
				SELECT email, c.first_name, c.last_name, role_name, cell_number, home_number FROM USER u
				LEFT JOIN ROLE r ON u.role_id=r.role_id
				LEFT JOIN CONTACT c ON u.id=c.user_id
				WHERE u.active=1 and (r.role_name NOT LIKE 'Administrator')
			");
	    	$retrieveUserQuery->execute();	    	
	    	$numberOfUserRows = $retrieveUserQuery->rowCount();
	    	return ($numberOfUserRows > 0)? $retrieveUserQuery->fetchAll() : null;
		}

function getAllTimeSheetEntries() {

	global $dbh;

		
			$retrieveUserQuery = $dbh->prepare("
				SELECT c.first_name as firstName, c.last_name as lastName , v.name as site, t.hourlyRate, t.workShop, t.travel, t.driver, t.suitcase, t.watchShow, t.rehersalHours, t.meetingHours, t.hospitalCompliance, t.total, t.comments, t.submitDate  FROM TIMESHEET t
				JOIN CONTACT c on c.user_id = t.userId
                JOIN USER u on t.userId = u.id
                JOIN VENUE v on v.id = t.venueId
				WHERE u.active=1 
			");
	    	$retrieveUserQuery->execute();	    	
	    	$numberOfUserRows = $retrieveUserQuery->rowCount();
	    	return ($numberOfUserRows > 0)? $retrieveUserQuery->fetchAll() : null;
		}
/*
	function submitEntry($entry) {
	global $dbh;

	if(isset($entry["id"]) && !is_null($entry["id"])) {
		
		// Update data
		//First Name Last Name SiteID = venueid userid =userid
		$authQuery = $dbh->prepare("
			UPDATE TIMESHEET SET 
				name = :name,
				hourlyRate = :hourlyRate,
				travel = :travel,
				driver = :driver,
				suitcase = :suitcase,
				watchShow = :watchShow,
				rehersalHours = :rehersalHours,
				meetingHours = :meetingHours,
				hospitalCompliance = :hospitalCompliance,
				total = :total,
				comments = :comments
			WHERE
				id = :id
		");

		$authQuery->bindParam(':name', $venue["name"]);
		$authQuery->bindParam(':hourlyRate', $venue["hourlyRate"]);
	    $authQuery->bindParam(':travel', $venue["travel"]);
	    $authQuery->bindParam(':driver', $venue["driver"]);
	    $authQuery->bindParam(':suitcase', $venue["suitcase"]);
		$authQuery->bindParam(':watchShow', $venue["watchShow"]);
	    $authQuery->bindParam(':rehersalHours', $venue["rehersalHours"]);
	    $authQuery->bindParam(':meetingHours', $venue["meetingHours"]);
		$authQuery->bindParam(':hospitalCompliance', $venue["hospitalCompliance"]);
		$authQuery->bindParam(':total', $venue["total"]);
		$authQuery->bindParam(':comments', $venue["comments"]);

	    if(!$authQuery->execute()) {
	    	return "Failed: ".$authQuery->errorInfo();
	    }
	    return "Success";

	} else {

		// New data
		$authQuery = $dbh->prepare("
			INSERT INTO VENUE (
				name ,
				hourlyRate ,
				travel ,
				driver ,
				watchShow ,
				rehersalHours ,
				meetingHours ,
				hospitalCompliance ,
				total ,
				comments 
			)
			VALUES (
				:name,
				:hourlyRate,
				:travel,
				:driver,
				:watchShow,
				:rehersalHours,
				:meetingHours,
				:hospitalCompliance,
				:total,
				:comments
			)
		");

		$authQuery->bindParam(':name', $venue["name"]);
		$authQuery->bindParam(':hourlyRate', $venue["hourlyRate"]);
	    $authQuery->bindParam(':travel', $venue["travel"]);
	    $authQuery->bindParam(':suitcase', $venue["suitcase"]);
		$authQuery->bindParam(':watchShow', $venue["watchShow"]);
	    $authQuery->bindParam(':rehersalHours', $venue["rehersalHours"]);
	    $authQuery->bindParam(':meetingHours', $venue["meetingHours"]);
		$authQuery->bindParam(':hospitalCompliance', $venue["hospitalCompliance"]);
		$authQuery->bindParam(':total', $venue["total"]);
		$authQuery->bindParam(':comments', $venue["comments"]);

	    if(!$authQuery->execute()) {
	    	return "Failed: ".$authQuery->errorInfo();
	    }

	    $vid = $dbh->lastInsertId();

	  
	    return "Success";
	}

} 
*/

/**
 * Requires $dbh to be set
 */
function editEntry($data) {

	global $dbh;

	$data = json_decode($data, true);
	$address = new PersistentObject($dbh, "TIMESHEET", isset($data["id"]) ? $data["id"] : null);
	$address->data = $data;
	return var_dump($address);
	if(!$address->save()) return "Failed: ";
	return $address->load();
}			


?>