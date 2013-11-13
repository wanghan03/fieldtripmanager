<?php
require_once 'classes/validate.php';
$validate = New validate();
$validate->confirm_login();
?>

<html>
<head>
<link rel="stylesheet" href="css/default.css" />
<title>Title Here</title>
</head>

<body>

<div id="container">
	<p>
    	Hi
    </p>
    <a href="login.php?status=logout">Log Out</a>
</div><!--end container-->

</body>
</html>
