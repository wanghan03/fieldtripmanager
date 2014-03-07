<?php
require_once 'classes/validate.php';
require_once 'classes/mysql.php';

// confirm that user's login is valid
$validate = new validate();
$validate->confirm_teacher();

// getting userid
$mysql = new mysql();
$userid = $mysql->get_userinfo($_SESSION['user'], 'userid');
$name = $mysql->get_userinfo($_SESSION['user'], 'name');
?>

<html>
<head>
<link rel="stylesheet" href="css/user.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans|Raleway:300' rel='stylesheet' type='text/css'>
<title></title>
</head>

<body>

<div id="header">
<?php echo "Welcome $name&nbsp&nbsp|&nbsp&nbsp";?>
<a href="login?status=logout" class = "logout">Log Out</a>
</div>

</body>
</html>