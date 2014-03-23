<?php
// get trip info, get it ready to be display on confirmation page
$tripdetail = $mysql->get_specifictrip($_GET['trip']);
$display = '<h4>'.$tripdetail[date].'</h4><p>'.$tripdetail[destination].' ('.$tripdetail[startTime].' - '.$tripdetail[endTime].')<br>Class/Hour: '.$tripdetail[classhour].'</p>';
// delete the trip
$mysql->delete_trip($_GET['trip']);

?>
<center><h1><span>My Field Trips</span></h1></center>
<div id="list">
<h4 style="color:#FF6666">The following trip has been successfully deleted: <h4>
<?php echo $display ?>
<br>
<form method=post action="?page=fieldtrip"><center><input type=submit value="Back to &quot;My Field Trips&quot;"></center></form>
</div>