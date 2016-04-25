<?php

include_once(__DIR__."/Model.php");

class Venue extends Model {
	
	public $defaultTable = "VENUE";

	public function __construct($db, $id=null) {
		parent::__construct($db, $id);
	}

}

?>