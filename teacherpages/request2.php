<?php
// checks if there's data
if(!isset($_POST['date'])) {
	header("location: teacher.php?page=request");
}

// process data, add to SQL
$date = $_POST['date'];
$startTime = $_POST['dtime'];
$endTime = $_POST['atime'];
$destination = $_POST['destination'];
$classhour = $_POST['class'];
$numstudent = $_POST['students'];
$cost = $_POST['cost'];
if($_POST['fund']=="" || $_POST['fund']==null) { $fund = null; }
else { $fund = $_POST['fund']; }
$objective = $_POST['objective'];
$classactivities = $_POST['activities'];
$why = $_POST['why'];
$followup = $_POST['follow-up'];

$mysql->new_trip($userid,$date,$startTime,$endTime,$destination,$classhour,$numstudent,$cost,$fund,$objective,$classactivities,$why,$followup);
?>

<center><h1><span>Request</span></h1></center>
<p>Thank you, your field trip request form has been submitted for approval. Please check <a id="hyperlink" href="?page=fieldtrip">My Field Trips</a> to confirm</p> 
<p>Note: Sponsoring teacher(s) must provide the attendance office with a list of students participating before departing. District Field Trip Bus form and map to destination must be submitted as well.</p> 