<?php

include_once(__DIR__."/Model.php");

class Address extends Model {
	
	public $defaultTable = "ADDRESS";

	public function __construct($db, $id=null) {
		parent::__construct($db, $id);
	}

}

?>