<?php

include_once(__DIR__."/../classes/PersistentObject.php");

/**
 * Requires $dbh to be set
 */
function getAddress($id) {

	global $dbh;
	
	$address = new PersistentObject($dbh, "ADDRESS", $id);
	$data = $address->load();
	if(!$data) {
		return $address->error;
	}
	return $data;
}

/**
 * Requires $dbh to be set
 */
function editAddress($data) {

	global $dbh;

	$data = json_decode($data, true);
	$address = new PersistentObject($dbh, "ADDRESS", isset($data["id"]) ? $data["id"] : null);
	$address->data = $data;

	if(!$address->save()) return null;
	return $address->load();
}

?>