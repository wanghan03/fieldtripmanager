<?php
require 'mysql.php';

class validate {
	
	function login($username, $pass) {
		$mysql = new mysql();
		$valid = $mysql->check_database($username, sha1($pass));
		
		if($valid) {
			if ($mysql->get_privilege($username) == 1) {
				$_SESSION['status'] = 'authorizedstudent';
				header("location: student.php");
			}
			if ($mysql->get_privilege($username) == 2) {
				$_SESSION['status'] = 'authorizedattendance';
				header("location: attendance.php");
			}
			if ($mysql->get_privilege($username) == 3) {
				$_SESSION['status'] = 'authorizedteacher';
				header("location: teacher.php");
			}
			if ($mysql->get_privilege($username) == 4) {
				$_SESSION['status'] = 'authorizedadmin';
				header("location: admin.php");
			}
		} else //return $mysql->get_privilege($username);//
		return "Please enter a valid username or password";
		
	} 
	
	function logout() {
		if(isset($_SESSION['status'])) {
			unset($_SESSION['status']);
			if(isset($_COOKIE[session_name()])) 
				setcookie(session_name(), '', time() - 1000);
				session_destroy();
		}
		header("location: login.php");
	}
	function confirm_student() {
		session_start();
		if($_SESSION['status'] !='authorizedstudent') {
		header("location: login.php");
		}
	}
	function confirm_attendance() {
		session_start();
		if($_SESSION['status'] !='authorizedattendance') {
		header("location: login.php");
		}
	}
	function confirm_teacher() {
		session_start();
		if($_SESSION['status'] !='authorizedteacher') {
		header("location: login.php");
		}
	}
	function confirm_admin() {
		session_start();
		if($_SESSION['status'] !='authorizedadmin') {
		header("location: login.php");
		}
	}
}