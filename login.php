<?php
session_start();
require_once 'classes/validate.php';
$validate = new validate();

if($_POST && !empty($_POST['username']) && !empty($_POST['pass'])) {
	$response = $validate->validate_user($_POST['username'], $_POST['pass']);
}

if(isset($_GET['status']) && $_GET['status'] == 'logout') {
	$validate->logout();
}
														
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
    	<h2>Login <small>enter your credentials</small></h2>
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
    <?php if(isset($response)) echo "<h4 class='alert'>" . $response . "</h4>"; ?>
</div><!--end login-->
</body>
</html>