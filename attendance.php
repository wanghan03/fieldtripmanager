<?php
require_once 'classes/validate.php';
$validate = new validate();
$validate->confirm_attendance();
?>

<html>
<head>
<link rel="stylesheet" href="css/default.css" />
<title></title>
</head>

<body>

<div id="container">
	<p>
    	
    </p>
    <a href="login?status=logout">Log Out</a>
</div><!--end container-->

</body>
</html>