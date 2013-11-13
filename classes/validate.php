<?php
require 'mysql.php';

class validate {
	
	function validate_user($user, $pass) {
		$mysql = new mysql();
		$valid = $mysql->check_database($user, sha1($pass));
		
		if($valid) {
			$_SESSION['status'] = 'authorized';
			header("location: index.php");
		} else return "Please enter a valid username or password";
		
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
	
	function confirm_login() {
		session_start();
		if($_SESSION['status'] !='authorized') header("location: login.php");
	}
	
}