<?php

$cfg = array(
	"DEBUG" => false,

	// Web based authentication
	"webAuth" => true,
	"users" => array(
		// Username => password
		"admin" => "admin",
		"user" => "theHulk",
	),

	"oauth" => "hybridauth",

);

session_start();

class OMBAuth {

	var $config;

	public function __construct($cfg) {
		$this->config = $cfg;

		if($this->config["DEBUG"]) {
			print("Created new OMBAuth with config:<br>");
			print_r($cfg);
		}
	}

	/**
     * Checks credentials and logs in the user
     * @param: $username
	 * @param: $password
	 * @param: $type - type of login
     * @return boolean    TRUE on success and FALSE on failure
     */
	public function login($username, $password, $type="normal") {

		if($type=="normal") {

			// Use web authentication for dev
			if($this->config["webAuth"]) {
				if($this->__webLogin($username, $password)) {
					$_SESSION["user"]=$username;
					$_SESSION["loggedIn"]=TRUE;
					return true;
				}
				return false;
			}
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
     * Bypass normal authentication when no database
     * @param: $username
	 * @param: $password
     * @return boolean    TRUE on success and FALSE on failure
     */
	private function __webLogin($username, $password) {
		
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

		return isset($users[$username]) && $users[$username] == $password;
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