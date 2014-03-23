<?php
// get trip info, get it ready to be display on confirmation page
$tripdetail = $mysql->get_specifictrip($_GET['trip']);
$fundedby = $tripdetail[fund];
if ($tripdetail[fund] == null || $tripdetail[fund] == "") { $fundedby = "Students"; }

$display = '<h4>'.$tripdetail[date].'</h4><p>'.$tripdetail[destination].' ('.$tripdetail[startTime].' - '.$tripdetail[endTime].')<br>Class/Hour: <i>'.$tripdetail[classhour].'</i><br>Number of students going: <i>'.$tripdetail[numstudent].'</i><br>Cost: $<i>'.$tripdetail[cost].'</i>, Funded by: <i>'.$fundedby.'</i><br><br>Trip Objective: <i>'.$tripdetail[objective].'</i><br><br>In-class Preparation: <i>'.$tripdetail[classactivities].'</i><br><br>Why: <i>'.$tripdetail[why].'</i><br><br>Why: <i>'.$tripdetail[why].'</i><br><br>Follow-up Activities: <i>'.$tripdetail[followup].'</i></p>';
$mysql->reject_trip($_GET['trip'],$_POST['feedback']);

?>
<center><h1><span>Waiting List</span></h1></center>
<div id="list">
<h4 style="color:#FF6666">The following trip has been successfully rejected:<h4>

<?php echo $display ?>
<form method=post action="?page=waiting"><center><input type=submit value="Back to &quot;Waiting Approval&quot;"></center></form>
</div>