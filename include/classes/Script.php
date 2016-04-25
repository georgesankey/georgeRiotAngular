<?php

include_once(__DIR__."/Model.php");

class Script extends Model {
	
	public $defaultTable = "SCRIPTS";

	public function __construct($db, $id=null) {
		parent::__construct($db, $id);
	}

}

?>