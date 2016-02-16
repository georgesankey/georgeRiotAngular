<?php

/**
 * Requires $dbh and $_SESSION["user"] to be set
 */
function getEvent($id) {

	global $dbh;
	
	$authQuery = $dbh->prepare("
		SELECT * FROM EVENT e
		WHERE e.id = :id
	");

    $authQuery->bindParam(':id', $id);
    $authQuery->execute();
    $authRows = $authQuery->rowCount();

    if($authRows == 1) {
    	return $authQuery->fetch(PDO::FETCH_ASSOC);
    }

}


?>