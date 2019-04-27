<?php 

/**
 * Class : Login
 */
class logIn {
	public $db;
	public $url;
	public $username;
	public $password;

	function in() {
		// Check if an user is found out in database
		if($this->queryLogIn() == 1) {
			$_SESSION['username'] = $this->username;
			$_SESSION['password'] = $this->password;
		} else {
			$this->logOut();
			$error_message = "Invalid User, please check your input";
			return $error_message;
		}
	}

	function queryLogIn() {
		$query = sprintf("SELECT * FROM `users` WHERE `username` = '%s' AND `password` = '%s'", $this->db->real_escape_string($this->username), md5($this->db->real_escape_string($this->password)));
		$result = $this->db->query($query);
		
		return ($result->num_rows == 0) ? 0 : 1;
	}

	function logOut() {
		unset($_SESSION['username']);
		unset($_SESSION['password']);
	}
}

/**
 * Class : Register
 */
class register {
	public $db;
	public $id;
	public $username;
	public $nama;
	public $alamat;
	public $ttl;
	public $provinsi;
	public $password;

	function process() {
		$arr = $this->validate_values(); // Must be stored in a variable before executing an empty condition
		if(empty($arr)) { // If there is no error message then execute the query;
			$this->query();
			// Return (int) 1 if everything was validated
			$x = 1;
		} else { // If there is an error message
			foreach($arr as $err) {
				return notificationBox('transparent', $LNG['error'], $LNG["$err"], 1); // Return the error value for translation file
			}
		}
		return $x;		
	}

	function validate_values() {
		// Create the array which contains the Language variable
		$error = array();
		
		// Define the Language variable for each type of error
		if($this->verify_if_user_exist() !== 0) {
			$error[] .= 'user_exists';
		}
		if(empty($this->username) && empty($this->password)) {
			$error[] .= 'all_fields';
		}
		if(strlen($this->password) <= 6) {
			$error[] .= 'password_too_short';
		}
		
		return $error;
	}

	function verify_if_user_exist() {
		$query = sprintf("SELECT `username` FROM `users` WHERE `username` = '%s'", $this->db->real_escape_string(strtolower($this->username)));
		$result = $this->db->query($query);
		
		return ($result->num_rows == 0) ? 0 : 1;
	}

	function query() {
		$query = sprintf("INSERT into `users` (`id`, `username`, `nama`, `alamat`, `ttl`, `provinsi`, `password`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s');", $this->db->real_escape_string(strtolower($this->username)), $this->db->real_escape_string($this->nama), $this->db->real_escape_string($this->alamat), date("Y-m-d H:i:s"), $this->db->real_escape_string($this->provinsi), md5($this->db->real_escape_string($this->password)));
		$this->db->query($query);
		// return ($this->db->query($query)) ? 0 : 1;
	}
}
?>