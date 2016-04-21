<?php

include_once(__DIR__."/PersistentObject.php");

class Model extends PersistentObject {

	public $defaultTable = null;
	public $schema = null;

	public function __construct($db, $id=null) {
		parent::__construct($db, $this->defaultTable, $id);
	}

	public function setData($data, $allMode=false) {
		// Do data set with dependencies
		if($allMode) {

		} else {
			if(is_null($this->schema)) {
				$this->data = $data;
			} else {
				$intersect = array_intersect_key($data, $this->schema);
				$this->data = array_replace($this->schema, $intersect);
			}
		}
	}

}

?>