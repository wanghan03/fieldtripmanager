<?php
// get trip info, get it ready to be display on confirmation page
$tripdetail = $mysql->get_specifictrip($_GET['trip']);
$fundedby = $tripdetail[fund];
if ($tripdetail[fund] == null || $tripdetail[fund] == "") { $fundedby = "Students"; }
if ($tripdetail[approval]==0) { $approval = "Pending"; }
if ($tripdetail[approval]==1) { $approval = "Approved"; }
if ($tripdetail[approval]==-1) { $approval = "Rejected"; }

$display = '<h4>'.$tripdetail[date].'</h4><p>'.$tripdetail[destination].' ('.$tripdetail[startTime].' - '.$tripdetail[endTime].')<br>Class/Hour: <i>'.$tripdetail[classhour].'</i><br>Number of students going: <i>'.$tripdetail[numstudent].'</i><br>Cost: $<i>'.$tripdetail[cost].'</i>, Funded by: <i>'.$fundedby.'</i><br><br>Trip Objective: <i>'.$tripdetail[objective].'</i><br><br>In-class Preparation: <i>'.$tripdetail[classactivities].'</i><br><br>Why: <i>'.$tripdetail[why].'</i><br><br>Why: <i>'.$tripdetail[why].'</i><br><br>Follow-up Activities: <i>'.$tripdetail[followup].'</i><br><center>Approval Status: <i>'.$approval.'</i></center></p>';
if ($tripdetail[approval]==-1) { 
	$display .= '<p>Rejected reasons: <i>'.$tripdetail[comments].'</i></p>';
}

?>
<center><h1><span>My Field Trips</span></h1></center>
<div id="list">
<?php echo $display ?>
<form method=post action="?page=fieldtrip"><center><input type=submit value="Back to &quot;My Field Trips&quot;"></center></form>
</div>