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

    return $authQuery->fetch(PDO::FETCH_ASSOC);

}

/**
 * Requires $dbh and contact data
 */
function setContact() {

	global $dbh;

	
}

?>