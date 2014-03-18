<HTML>
<head>
<link rel="stylesheet" href="css/calendar.css" />
</head>
<body>
<?php
$events = array();
$events['2014-03-14'][] = 'Event11111112132131231231231231';
$events['2014-03-14'][] = 'Event2';
$events['2014-03-01'][] = 'Event3';

$month = (int) ($_GET['month'] ? $_GET['month'] : date('m'));
$year = (int)  ($_GET['year'] ? $_GET['year'] : date('Y'));

//$month = date('m');
//$year = date('Y');

// month
$selectMonth = '<select name="month" id="month">';
for($months = 1; $months <= 12; $months++) {
	$selectMonth.= '<option value="'.$months.'"'.($months != $month ? '' : ' selected="selected"').'>'.date('F',mktime(0,0,0,$months,1,$year)).'</option>';
}
$selectMonth.= '</select>';

// year
$yearRange = 7;
$selectYear = '<select name="year" id="year">';
for($x = ($year-floor($yearRange/2)); $x <= ($year+floor($yearRange/2)); $x++) {
	$selectYear.= '<option value="'.$x.'"'.($x != $year ? '' : ' selected="selected"').'>'.$x.'</option>';
}
$selectYear.= '</select>';

// next, previous
$nextMonth = '<a id="links" href="?page=calendar&month='.($month != 12 ? $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1).'" class="control">Next Month >></a>';

$previousMonth = '<a id="links" href="?page=calendar&month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'" class="control"><<	Previous Month</a>';

$page = '<select name="page" id="hidden"><option value="calendar"></option></select>';

$controls = '<form method="get">'.$page.$selectMonth.$selectYear.' <input type="submit" name="submit" value="Go" /></br>'.$previousMonth.'&nbsp&nbsp&nbsp'.$nextMonth.' </form>';

/* display */
$monthName = date("F", mktime(0, 0, 0, $month, 10));
echo "<center><h1><span>Calendar</span></h1>";
echo "<h2>" . $monthName . " " . $year . "</h2>";
echo $controls;
$temp;
if ($month < 10) { 
	$temp = '0'.(string)$month;
} else { $temp = (string)$month; }
echo $calendar->draw_calendar($temp,$year,$events)."</center>";
?>

</body>
</html>