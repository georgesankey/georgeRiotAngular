<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("../include/db/dbconfig.php");
include_once("../include/classes/PersistentObject.php");

$po = new PersistentObject($dbh, "ADDRESS");

print($po->getTable());

echo "<br>";

$po->id = 1;

// Select Passed
print_r($po->load());

print_r($po->error);

echo "<br>";
echo "<br>";

// Insert passed.
$po = new PersistentObject($dbh, "VENUE");
$po->data = array(
	"name"=>"POTEST",
	"comments"=>"Testing"
);
print($po->save());

echo "<br>";

// Testing delete
if($po->delete()) {
	print("deleted");
} else {
	print("Delete failed: ");
	print_r($po->error);
}

/* Update Passed
$po = new PersistentObject($dbh, "VENUE", 5);
$po->data = array(
	"name"=>"POTEST",
	"comments"=>"Testing2"
);
print($po->save());
*/
?>