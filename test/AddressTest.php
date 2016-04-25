<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("../include/db/dbconfig.php");
include_once("../include/classes/Address.php");

$po = new Address($dbh, 6);

print($po->getTable());

print_r($po->load());


?>