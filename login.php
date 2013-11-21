<?php
session_start();
require_once 'classes/validate.php';
$validate = new validate();
global $user;

if($_POST && !empty($_POST['username']) && !empty($_POST['pass'])) {
	$response = $validate->login($_POST['username'], $_POST['pass']);
}

if(isset($_GET['status']) && $_GET['status'] == 'logout') {
	$validate->logout();
}

if ($_POST && !empty($_POST['username'])) {	$user = $_POST['username']; }

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<!link rel="stylesheet" type="text/css" href="css/default.css" />
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
    <?php if(isset($response)) echo $response . "<br>"; 
	    date_default_timezone_set('America/New_York');
		echo date("Y-m-d H:i:s");
    ?>
</div><!--end login-->
</body>
</html>