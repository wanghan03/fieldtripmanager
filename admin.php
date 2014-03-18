<?php
require_once 'classes/validate.php';
require_once 'classes/mysql.php';
require_once 'classes/calendar.php';

// confirm that user's login is valid
$validate = new validate();
$validate->confirm_admin();

// getting userid
$mysql = new mysql();
$userid = $mysql->get_userinfo($_SESSION['user'], 'userid');
$name = $mysql->get_userinfo($_SESSION['user'], 'name');

// calendar 
$calendar = new calendar();

// header
include("adminpages/header.php");

$getpage = isset($_GET['page']) ? $_GET['page'] : "";

	switch($getpage){
		case NULL:
			include("adminpages/home.php");
			break;
		case "home":
			include("adminpages/home.php");
			break;
		case "index":
			include("adminpages/home.php");
			break;
		case "calendar":
			include("adminpages/calendar.php");
			break;
		case "agenda":
			include("adminpages/agenda.php");
			break;
		case "waiting":
			include("adminpages/waiting.php");
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
<!--FOOTER-->
<?php
include("adminpages/footer.php");
?>
</body>

</html>

