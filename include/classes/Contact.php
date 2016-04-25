<?php

include_once(__DIR__."/Model.php");

class Contact extends Model {
	
	public $defaultTable = "CONTACT";

	public function __construct($db, $id=null) {
		parent::__construct($db, $id);
	}

}

?>