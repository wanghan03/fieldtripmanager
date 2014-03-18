<?php
require_once 'classes/validate.php';
require_once 'classes/mysql.php';

// confirm that user's login is valid
$validate = new validate();
$validate->confirm_student();

// getting userid
$mysql = new mysql();
$userid = $mysql->get_userinfo($_SESSION['user'], 'userid');
$name = $mysql->get_userinfo($_SESSION['user'], 'name');

// header
include("studentpages/header.php");

$getpage = isset($_GET['page']) ? $_GET['page'] : "";

	switch($getpage){
		case NULL:
			include("studentpages/home.php");
			break;
		case "home":
			include("studentpages/home.php");
			break;
		case "index":
			include("studentpages/home.php");
			break;
		case "fieldtrip":
			include("studentpages/fieldtrip.php");
			break;
		case "request":
			include("studentpages/request.php");
			break;
		case "about":
			include("studentpages/about.php");
		break;
		}
?>

<html>
<head>
<link rel="stylesheet" href="css/user.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans|Raleway:300' rel='stylesheet' type='text/css'>
<title></title>
</head>

<body>


</body>
</html>