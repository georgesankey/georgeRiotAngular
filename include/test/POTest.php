<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("../db/dbconfig.php");
include_once("../classes/PersistentObject.php");

$po = new PersistentObject($dbh, "ADDRESS");

print($po->getTable());

echo "<br>";

$po->id = 1;

// Select Passed
print_r($po->load());

print_r($po->error);

echo "<br>";
echo "<br>";

/* Insert passed.
$po = new PersistentObject($dbh, "VENUE");
$po->data = array(
	"name"=>"POTEST",
	"comments"=>"Testing"
);
print($po->save());
*/

/* Update Passed
$po = new PersistentObject($dbh, "VENUE", 5);
$po->data = array(
	"name"=>"POTEST",
	"comments"=>"Testing2"
);
print($po->save());
*/
?>