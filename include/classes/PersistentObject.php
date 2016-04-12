<?php

class PersistentObject {
	private $db; // db pdo
	private $table;
	public $id;
	public $data;
	public $error;

	function __construct($db, $table=null, $id=null) {
		// Base class
		$this->db = $db;
		$this->table = $table;
		$this->id = $id;
	}

	/* Requires $id set */
	function load() {
		if(!$this->check()) {return false;}

		if(is_null($this->id)) {
			return false;
		}

		$query = $this->db->prepare("
			SELECT * FROM ".$this->table." x
			WHERE x.id = :id
		");

		$query->bindParam(':id', $this->id);
    	$query->execute();

    	if($query->rowCount() == 0) {
    		$this->error = "No data";
	    	return false;
    	}

    	$this->data = $query->fetch(PDO::FETCH_ASSOC);
    	if(empty($this->data)) {
	    	$this->error = $query->errorInfo();
	    	return false;
	    }
	    return $this->data;
	}

	/* Create new insert into DB */
	function create() {
		if(!$this->check()) {return false;}
		if(!is_null($this->id)) {
			return false;
		}

		$query = $this->db->prepare($this->buildInsert($this->data));
		if(count($this->data) > 0) {
			$i = 1;
			foreach($this->data as $val) {
				$query->bindValue($i++, $val);
			}
		}
		$query->execute();

		// Check row is inserted
		$rows = $query->rowCount();
		if($rows == 1) {
			$this->id = $this->db->lastInsertId();
			return $this->id;
		}

		// An error occurred
		$this->error = $query->errorInfo();
		return false;
	}

	/* Persists the object */
	function save() {
		if(!$this->check()) {return false;}
		if(is_null($this->id)) {
			return $this->create();
		}

		if(count($this->data) == 0) {
			$this->error = "Missing data field";
			return false;
		}

		$query = $this->db->prepare($this->buildUpdate($this->data));
		$i = 1;
		foreach($this->data as $val) {
			$query->bindValue(":".$i++, $val);
		}
		$query->bindValue(":id", $this->id);
		$query->execute();

		// Check row is inserted
		$rows = $query->rowCount();
		if($rows == 1) {
			return true;
		}

		// An error occurred
		$this->error = $query->errorInfo();
		return false;
	}

	/* Getters and setters */
	function getTable() {
		return $this->table;
	}

	function setTable($table) {
		$this->table=$table;
	}

	/* Builds query from data input */
	private function buildInsert($data) {
		$queryString = "INSERT INTO ".$this->table." (";

		$columnString = "";
		$valueString = "";
		if(count($data) > 0) {
			foreach($data as $key => $val) {
				$columnString .= ",".$key;
				$valueString .= ",?";
			}
		}

		$queryString .= substr($columnString, 1) . ") VALUES (" .
			substr($valueString, 1) . ")";
	
		return $queryString;
	}

	/* Builds query from data input */
	private function buildUpdate($data) {
		$queryString = "UPDATE ".$this->table." SET ";

		$updateString = "";
		$i=1;
		foreach($data as $key => $val) {
			$updateString .= ",".$key."=:".$i++;
		}

		$queryString .= substr($updateString, 1) . " WHERE id=:id";
	
		return $queryString;
	}

	/* Does some error checking first */
	private function check() {
		if(empty($this->db)) {
			$this->error = "Missing DB";
			return false;
		}
		if(empty($this->table)) {
			$this->error = "Missing table";
			return false;
		}
		return true;
	}
}

?>