<center><h1><span>Waiting List</span></h1></center>
<?php
$today = date(Y).'-'.date(m).'-'.date(d);
$array = $mysql->get_alltrips();
$display = '';
$count = 0;
if ($array != 0){
	for($row = 0; $row < count($array); $row++){
		if ($array[$row][date]>=$today && $array[$row][approval]==0){
			$fundedby = $array[$row][fund];
			if ($array[$row][fund] == null || $array[$row][fund] == "") { $fundedby = "Students"; }
			$display .= '<div id="list">';
			$display .= '<h4>'.$array[$row][date].'</h4>';
			$display .= '<p>'.$array[$row][destination];
			$display .= ' ('.$array[$row][startTime].' -';
			$display .= ' '.$array[$row][endTime].')';
			$display .= '<br>Class/Hour: <i>'.$array[$row][classhour].'</i>';
			$display .= '<br>Cost: $<i>'.$array[$row][cost].'</i>, Funded by: <i>'.$fundedby.'</i>';
			$display .= '<br>Number of students going: $<i>'.$array[$row][numstudent].'</i>';
			$display .= '<br><br>Trip Objective: <i>'.$array[$row][objective].'</i>';
			$display .= '<br><br>In-class Preparation: <i>'.$array[$row][classactivities].'</i>';
			$display .= '<br><br>Why: <i>'.$array[$row][why].'</i>';
			$display .= '<br><br>Follow-up Activities: <i>'.$array[$row][followup].'</i>';
			$display .= '<center><form style="display:inline-block;" method=post action="?page=approve&trip='.$array[$row][eventid].'"><input type=submit value="Approve this Trip"></form>';
			$display .= '<form style="display:inline-block;" method=post action="?page=confirm&trip='.$array[$row][eventid].'"><input type=submit value="Reject this Trip"></form>';
			$display .='</p></div><br>';
			$count++;
		}
	}
}
// if nothing is being added to $display
if ($count==0){
	$display .= '<div id="list">no trips awaiting to be approved.</div>';
}
echo $display;
?>
