<?php

include_once(__DIR__."/Model.php");

class Event extends Model {
	
	public $defaultTable = "EVENT";

	public function __construct($db, $id=null) {
		parent::__construct($db, $id);
	}

}

?>