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
?>

<html>
<head>
<link rel="stylesheet" href="css/user.css" />
<!link rel="stylesheet" href="css/calendar.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans|Raleway:300' rel='stylesheet' type='text/css'>
<title></title>
</head>

<body>
<!--NAVAGATION BAR-->
<div id="navigation">
<ul>
      	<li><a id="calendar" style="cursor:pointer" onclick="editMain(this.id);">Calendar View</a></li>
        <li><a id="list" style="cursor:pointer" onclick="editMain(this.id);">List View</a></li>
        <li><a id="waiting" style="cursor:pointer" onclick="editMain(this.id);">Waiting Approvals</a></li>
</ul>
</div>

<!--MAIN-->
<script type="text/javascript">
function editMain(id){
	var main = document.getElementById("main");
	
	if (id == "calendar"){
	main.innerHTML='<h2>February 2014</h2> ' +
'<?php 
$events = array();
$events['2014-02-14'][] = 'Event11111112132131231231231231';
$events['2014-02-14'][] = 'Event2';
$events['2014-02-01'][] = 'Saturday';

$month = date(m);
$year = date(Y);


//echo $calendar->draw_calendar(date(m), date(Y), $events);


$month = (int) ($_GET['month'] ? $_GET['month'] : date('m'));
$year = (int)  ($_GET['year'] ? $_GET['year'] : date('Y'));

// month
$select_month_control = '<select name="month" id="month">';
for($x = 1; $x <= 12; $x++) {
	$select_month_control.= '<option value="'.$x.'"'.($x != $month ? '' : ' selected="selected"').'>'.date('F',mktime(0,0,0,$x,1,$year)).'</option>';
}
$select_month_control.= '</select>';

// year
$year_range = 7;
$select_year_control = '<select name="year" id="year">';
for($x = ($year-floor($year_range/2)); $x <= ($year+floor($year_range/2)); $x++) {
	$select_year_control.= '<option value="'.$x.'"'.($x != $year ? '' : ' selected="selected"').'>'.$x.'</option>';
}
$select_year_control.= '</select>';

// next, previous
$nextMonth = '<a href="?month='.($month != 12 ? $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1).'" class="control">Next Month >></a>';

$previousMonth = '<a href="?month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'" class="control"><< 	Previous Month</a>';

$controls = '<form method="get">'.$select_month_control.$select_year_control.' <input type="submit" name="submit" value="Go" />      '.$previousMonth.'     '.$nextMonth.' </form>';

echo $controls;

/* display */
$monthName = date("F", mktime(0, 0, 0, $month, 10));
echo "<h2>" . $monthName . " " . $year . "</h2>";
echo $calendar->draw_calendar($month,$year,$events);

?>' +
	'';
	}
	if (id == "list"){
		main.innerHTML='Agenda';
	}
	if (id == "waiting"){
		main.innerHTML='Waiting Approvals';
	}
}
</script>

<div id="header">
<?php echo "Welcome $name&nbsp&nbsp|&nbsp&nbsp";?>
<a href="login?status=logout" class = "logout">Log Out</a>
</div>

<div id="main">
Select an item above to get started.
</div>

<!--REMINDER-->
<div id="reminder">

</div>

<!--FOOTER-->
<div id="footer">
    
</div>



</body>
</html>

