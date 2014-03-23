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
	
	function get_userinfo($username, $column){
		$result = $this->conn->query("SELECT * FROM USER WHERE username = '$username' LIMIT 1");
		if ($data = mysqli_fetch_array($result)){
			return $data[$column];
		}
		return 0;
	}
	
	// get all field trip by specified user
	function get_fieldtrips($userid){
		$result = $this->conn->query("SELECT * FROM FIELD_TRIP WHERE userid = '$userid'");
		$array = array();
		if ($data = mysqli_fetch_array($result)){
			$array[] = $data; //2D array
			while ($data = mysqli_fetch_array($result)){
				$array[] = $data;
			}
			return $array;
		}
		return 0;
	}
	
	// get single trip by event id
	function get_specifictrip($eventid){
		$result = $this->conn->query("SELECT * FROM FIELD_TRIP WHERE eventid = '$eventid' LIMIT 1");
		if ($data = mysqli_fetch_array($result)){
			return $data;
		}
		return 0;
	}
	
	// get every single field trip
	function get_alltrips(){
		$result = $this->conn->query("SELECT * FROM FIELD_TRIP");
		$array = array();
		if ($data = mysqli_fetch_array($result)){
			$array[] = $data; //2D array
			while ($data = mysqli_fetch_array($result)){
				$array[] = $data;
			}
			return $array;
		}
		return 0;
	}
	
	// creating trip
	function new_trip($userid,$date,$startTime,$endTime,$destination,$classhour,$numstudent,$cost,$fund,$objective,$classactivities,$why,$followup){
		$this->conn->query("INSERT INTO FIELD_TRIP (userid, date, startTime, endTime, destination, classhour, numstudent, cost, fund, objective, classactivities, why, followup) VALUES ('$userid','$date','$startTime','$endTime','$destination','$classhour','$numstudent','$cost','$fund','$objective','$classactivities','$why','$followup')");
	}
	
	// deleting trip
	function delete_trip($eventid){
		$this->conn->query("DELETE FROM FIELD_TRIP WHERE eventid='$eventid' LIMIT 1");
	}
	
	// approve trip
	function approve_trip($eventid){
		$this->conn->query("UPDATE FIELD_TRIP SET approval = 1 WHERE eventid = '$eventid'");
		$this->conn->query("UPDATE FIELD_TRIP SET approvalDate = now() WHERE eventid = '$eventid'");
	}
	
	// reject trip
	function reject_trip($eventid, $comments){
		$this->conn->query("UPDATE FIELD_TRIP SET approval = -1 WHERE eventid = '$eventid'");
		$this->conn->query("UPDATE FIELD_TRIP SET approvalDate = now() WHERE eventid = '$eventid'");
		$this->conn->query("UPDATE FIELD_TRIP SET comments = '$comments' WHERE eventid = '$eventid'");
	}
}