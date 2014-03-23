<?php
session_start(); // start a session
require_once 'classes/validate.php';
$validate = new validate(); // instantiation

// if the the username and password field is not empty, validate the user
if($_POST && !empty($_POST['username']) && !empty($_POST['pass'])) {
	$_SESSION['user'] = $_POST['username'];
	$response = $validate->login($_POST['username'], $_POST['pass']);
}

// if the url ends in ?status=logout, log user out
if(isset($_GET['status']) && $_GET['status'] == 'logout') {
	$validate->logout();
}
?>

<html>
<head>
<title>Login | Field Trip Manager</title>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="login">
	<form method="post" action="">
    	<h2>Login Page<small>, please enter your credentials</small></h2>
        <p>
        	<label for="name">Username: </label>
            <input type="text" name="username" />
        </p>
        
        <p>
        	<label for="pwd">Password: </label>
            <input type="password" name="pass" />
        </p>
        
        <p>
        	<input type="submit" id="submit" value="Login" name="submit" />
        </p>
    </form>
    <?php if(isset($response)) echo "<h4>" . $response . "<br></h4>"; 
    else echo "<h4 id = \"placeholder\">Please enable CSS</h4>";
    //if the user is not redirected, a $response is given, print the $response
    	
    	// display current date and time
	    date_default_timezone_set('America/New_York');
		echo date("Y-m-d");//"Accessed: " . date("Y-m-d H:i:s");
		echo "<br>";
		echo "<br>Test Admin | username: admin, password: admin";
		echo "<br>Test Teacher | username: teacher, password: teacher";
		//echo "<br>Test Student | username: student, password: student";
    ?>
</div><!--end login-->
</body>

</html>