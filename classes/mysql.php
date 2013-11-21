<?php

require_once 'includes/constants.php';

class mysql {
	private $conn;
	
	function __construct() {
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
					  die('There was a problem connecting to the database.');
	}
	
	function check_database($username, $pass) {
		$query = "SELECT *
				FROM USER
				WHERE username = ? AND password = ?
				LIMIT 1";
				
		if($statement = $this->conn->prepare($query)) { 
		// new variable statement, set it equal to conn.prepare(query), if it works, continue
			$statement->bind_param('ss', $username, $pass);
			$statement->execute();
			
			if($statement->fetch()) {
				$statement->close();
				// update login time
				$this->conn->query("UPDATE `USER` SET `lastLogin` = now() WHERE `username` = '$username'");
				return true;
			}
		}
	}
	function get_privilege($username){
		$result = $this->conn->query("SELECT * FROM USER WHERE username = '$username' LIMIT 1");
		if ($privilege = mysqli_fetch_array($result)){
			return $privilege['privilege'];
		} return 0;
	}
}