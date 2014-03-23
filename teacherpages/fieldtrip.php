<center><h1><span>My Field Trips</span></h1></center>
<?php
$today = date(Y).'-'.date(m).'-'.date(d);
$array = $mysql->get_fieldtrips($userid);
$display = '<div id="list">';
$count = 0;

if ($array != 0){
	for($row = 0; $row < count($array); $row++){
		if ($array[$row][date]>=$today){
			$display .= '<h4>'.$array[$row][date].'</h4>';
			$display .= '<p';
			if ($array[$row][approval]==0){
				$display .= ' style=color:#FF6666;';
			}
			if ($array[$row][approval]==-1){
				$display .= ' style="color:#6666E0; text-decoration:line-through;"';
			}
			$display .= '>'.$array[$row][destination];
			$display .= ' ('.$array[$row][startTime].' -';
			$display .= ' '.$array[$row][endTime].')';
			$display .= '<br>Class/Hour: '.$array[$row][classhour];
			$display .= '<br>Number of students going: '.$array[$row][numstudent];
			$display .= '<center><form style="display:inline-block;" method=post action="?page=detail&trip='.$array[$row][eventid].'"><input type=submit value="Trip Detail"></form>';
			if ($array[$row][approval]!=1){
				$display .= '<form style="display:inline-block;" method=post action="?page=deleted&trip='.$array[$row][eventid].'"><input type=submit value="Delete this Trip"></form>';
			}
			$display .= '</center>';
			$display .='</p>';
			$count++;
		}
	}
}
// if nothing is being added to $display
if ($count==0){
	$display .= 'no upcoming field trips to display';
}
$display .= '</div>';
echo $display;
?>
<center><p>Note: events displayed in <a style=color:#FF6666;>red</a> are pending approval, and events displayed in <a style=color:#6666E0;>blue</a> are rejected.</p></center>