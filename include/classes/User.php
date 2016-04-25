<?php

include_once(__DIR__."/Model.php");

class User extends Model {
	
	public $defaultTable = "USER";

	public function __construct($db, $id=null) {
		parent::__construct($db, $id);
	}

}

?>