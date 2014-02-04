<?php
require_once 'classes/validate.php';
require_once 'classes/mysql.php';

// confirm that user's login is valid
$validate = new validate();
$validate->confirm_admin();

// getting userid
$mysql = new mysql();
$userid = $mysql->get_userinfo($_SESSION['user'], 'userid');
$name = $mysql->get_userinfo($_SESSION['user'], 'name');
?>

<html>
<head>
<link rel="stylesheet" href="css/user.css" />
<title></title>
</head>
<body>
<!--NAVAGATION BAR-->
<div id="navigation">
<ul>
      	<li><a id="calendar" href="#calendar" onclick="editMaain(this.id);">Calendar View</a></li>
        <li><a id="list" href="#list" onclick="editMain(this.id);">List View</a></li>
        <li><a id="waiting" href="#waiting" onclick="editMain(this.id);">Waiting Approvals</a></li>
</ul>
</div>

<!--MAIN-->
<script type="text/javascript">
function editMain(id){
	var main = document.getElementById("main");
	
	if (id == "calendar"){
	main.innerHTML="Calendar";
	}
	if (id == "list"){
		main.innerHTML="List View";
	}
	if (id == "waiting"){
		main.innerHTML="Waiting Approvals";
	}
}
</script>

<div id="header">
<?php echo "Hello, $name";?>
</div>

<div id="main">
placeholder
</div>

<!--REMINDER-->
<div id="reminder">

</div>

<!--FOOTER-->
<div id="footer">
    <a href="login?status=logout" class = "logout">Log Out</a>
</div>



</body>
</html>