<?php

$cfg = array(
	"DEBUG" => false,

	// Web based authentication
	"webAuth" => false,

	"users" => array(
		// Username => password
		"admin" => "admin",
		"user" => "theHulk",
		"tameem" => "test",
	),

	"oauth" => "hybridauth",

);

session_start();

class OMBAuth {

	var $config;
	var $db;
	var $error;
	var $errorMessage;

	public function __construct($cfg, $db=null) {
		$this->config = $cfg;
		$this->db = $db;
		$this->error = null;
		$this->errorMessage = "";

		if($this->config["DEBUG"]) {
			print("Created new OMBAuth with config:<br>");
			print_r($cfg);
		}
	}

	/**
     * Checks credentials and logs in the user
     * @param: $email
	 * @param: $password
	 * @param: $type - type of login
     * @return boolean    TRUE on success and FALSE on failure
     */
	public function login($email, $password, $type="normal") {

		if($type=="normal") {

			// Use web authentication for dev
			if($this->config["webAuth"]) {
				if($this->__webLogin($email, $password)) {
					$_SESSION["user"]=$email;
					$_SESSION["loggedIn"]=TRUE;


					return true;
				}
				$this->error = 2;
				$this->errorMessage = "Invalid Credentails";
				return false;
			}

			// This section for DB login. Create a new function for this.
			else {

				if($this->__dbLogin($email, $password)) {
					$_SESSION["user"]=$email;
					$_SESSION["loggedIn"]=TRUE;

					$_SESSION["role"] = "Administrator";
					return true;
				}
				return false;

			}
		}

		// This section for OAuth Login 
		// Looks like we won't be using this.
		else {
			$this->error = 404;
			$this->errorMessage = "Login Scheme Not Supported";
			return false;
		}

	}

	/** 
	 * Logs the user out by deleting session tokens
	 */
	public function logout() {
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy(); 
	}

	/**
	 * Checks if the user is logged in
	 * @param: $user default null, check if this user is logged in
	 * @return boolean   TRUE if logged in, FALSE if not
	 */
	public function loggedIn($user=null) {
		if(is_null($user)) {
			return isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"];
		} else {
			return isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]
				&& isset($_SESSION["user"]) && $_SESSION["user"] == $user;
		}
	}

	/**
	 * Register the user with the service
	 * Currently uses lots of $_POST stuff, but should only use a few fields in the future
	 * 
	 * @return $this->login()
	 */
	public function register() {

		// Check the PDO
		if(is_null($this->db)) {
			if($this->config["DEBUG"]) {
				print("Database not assigned.<br />");
			}
			$this->error = 1;
			$this->errorMessage = "Database Not Assigned";
			return false;
		}
		// Check for existing email
		if($this->__emailExists($_POST["email"])) {
			$this->error = 6;
			$this->errorMessage = "Email already exists";
			return false;
		}

		$roleQuery = $this->db->prepare("SELECT role_id FROM ROLE WHERE role_name = :role_name");
		$roleQuery->bindParam(':role_name', $_POST["useraccess"]);
		$roleQuery->execute();
		$roleRow = $roleQuery->fetch();

		$insertQuery = $this->db->prepare("INSERT INTO USER (username, password, first_name, last_name, role_id, email, address_1, city, state, zipcode, phone_number) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		$insertQuery->bindParam(1, $_POST["username"]); 
		$insertQuery->bindParam(2, $this->__hashPassword($_POST["password"])); 
		$insertQuery->bindParam(3, $_POST["firstname"]); 
		$insertQuery->bindParam(4, $_POST["lastname"]); 
		$insertQuery->bindParam(5, $roleRow["role_id"]); 
		$insertQuery->bindParam(6, $_POST["email"]); 
		$insertQuery->bindParam(7, $_POST["address"]); 
		$insertQuery->bindParam(8, $_POST["city"]); 
		$insertQuery->bindParam(9, $_POST["state"]); 
		$insertQuery->bindParam(10, $_POST["zipcode"]); 
		$insertQuery->bindParam(11, $_POST["phonenumber"]); 
 
		$insertQuery->execute();

		return $this->login($_POST["email"], $_POST["password"]);
	}

	//------------------------------------------------
	// Private functions
	//------------------------------------------------

	/**
	 * Checks if the email is in the system
	 * @param: $email
	 * @return boolean
	 */
	private function __emailExists($email) {
	
		// Check the PDO
		if(is_null($this->db)) {
			if($this->config["DEBUG"]) {
				print("Database not assigned.<br />");
			}
			$this->error = 1;
			$this->errorMessage = "Database Not Assigned";
			return false;
		}

		$regQuery = $this->db->prepare("SELECT * FROM USER WHERE email = :email");
		$regQuery->bindParam(':email', $email);
		$regQuery->execute();

		$regRows = $regQuery->rowCount();
		return $regRows > 0;
	}

	/**
     * Bypass normal authentication when no database
     * @param: $username
	 * @param: $password
     * @return boolean    TRUE on success and FALSE on failure
     */
	private function __webLogin($email, $password) {
		$users = $this->config["users"];
 
 		// Emulate normal login
 		if($this->config["DEBUG"]) {
 			print("Using web authentication:<br>");
 
 			$pw = $this->__hashPassword($password);
 
 			print("Stored password is: ".$pw);
 
 			if($this->__validatePassword($password, $pw)) {
 				print("Successfully authenticated.");
 				return true;
 			} else {
 				print("Attempt failed.");
 				return false;
 			}
 		}
 
 		return isset($users[$email]) && $users[$email] == $password;
	}

	/**
     * Authenticate using data from database
     * @param: $username
	 * @param: $password
     * @return boolean    TRUE on success and FALSE on failure
     */
	private function __dbLogin($email, $password) {
		
		// Check for working PDO 
		if(is_null($this->db)) {
			if($this->config["DEBUG"]) {
				print("Database not assigned.<br />");
			}
			$this->error = 1;
			$this->errorMessage= "Database Not Assigned";
			return false;
		}
        
		// Make database call 
        $authQuery = $this->db->prepare("SELECT * FROM USER WHERE (email = :email) AND active = '1'");
	    $authQuery->bindParam(':email', $email);

	    if($this->config["DEBUG"]) {
			print("<br />Query: ");
			print_r($authQuery);
		}

        $authQuery-> execute();
        $authRows = $authQuery->rowCount();

        if($authRows == 1) {
        	$authRow = $authQuery->fetch();

        	if($this->config["DEBUG"]) {
				print("<br /><b>Data: </b>");
				print_r($authRow);
			}

        	if($this->__validatePassword($password, $authRow["password"])) {
        		return true;
        	}
        }

    	$this->error = 2;
		$this->errorMessage = "Invalid Credentials";
		return false;
	}

	/**
	 * Takes a password and returns a salted hash
	 * @param: $password - the password to hash
	 * @return: salt prepended to the hashed password
	 */
	private function __hashPassword($password) {
		$salt = bin2hex(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)); // Generate random salt
		$hash = hash("sha256", $salt . $password); // hash the password with the salt in front
		
		// Return the final with the salt in front, 32 + 128 (= 160) characters long
		return $salt . $hash;
	}

	/**
	 * Checks to see if the given password matches the correct password
	 * @param: $password - the password provided (unhashed)
	 * @param: $correctHash - the correct hash from the database
	 * @return: boolean - whether or not they match
	 */
	private function __validatePassword($password, $correctHash) {
		$salt = substr($correctHash, 0, 32); // get the salt from the front of the hash
		$validHash = substr($correctHash, 32, 128); //the SHA256

		$testHash = hash("sha256", $salt . $password); //hash the password being tested
		
		//if the hashes are exactly the same, the password is valid
		return $testHash === $validHash;
	}

}

?>