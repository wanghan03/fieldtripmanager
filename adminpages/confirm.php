<head>
<script>
function validateForm(){
	var x = document.forms["requestform"];
	if(x["feedback"].value==null || x["feedback"].value==""){
		alert("\"Feedback\" is a required field");
		x["feedback"].focus();
		return false;
	}
	if(x["feedback"].value.length>500){
		alert("Too many characters detected, please limit response to 500 characters or less");
		x["feedback"].focus();
		return false;
	}
	else{
		//alert("Validated");
		return true;
	}
}
</script>
</head>
<?php
// get trip info, get it ready to be display on confirmation page
$tripdetail = $mysql->get_specifictrip($_GET['trip']);
$fundedby = $tripdetail[fund];
if ($tripdetail[fund] == null || $tripdetail[fund] == "") { $fundedby = "Students"; }

$display = '<h4>'.$tripdetail[date].'</h4><p>'.$tripdetail[destination].' ('.$tripdetail[startTime].' - '.$tripdetail[endTime].')<br>Class/Hour: <i>'.$tripdetail[classhour].'</i><br>Number of students going: <i>'.$tripdetail[numstudent].'</i><br>Cost: $<i>'.$tripdetail[cost].'</i>, Funded by: <i>'.$fundedby.'</i><br><br>Trip Objective: <i>'.$tripdetail[objective].'</i><br><br>In-class Preparation: <i>'.$tripdetail[classactivities].'</i><br><br>Why: <i>'.$tripdetail[why].'</i><br><br>Why: <i>'.$tripdetail[why].'</i><br><br>Follow-up Activities: <i>'.$tripdetail[followup].'</i></p>';

?>
<center><h1><span>Waiting List</span></h1></center>
<div id="list">
<h4 style="color:#FF6666">Are you sure you want to reject this trip?:<h4>

<?php echo $display; ?>
<form name="requestform" method=post onsubmit="return validateForm()" action="?page=reject&trip=<?php echo $tripdetail[eventid]?>">
	<p>
		<label>Please Provide a Feedback: </label>
		<textarea rows=3 cols=75 title="Reject Feedback" name="feedback"></textarea>
	</p>
	<center><input type=submit value="Reject"></center>	
</form>
</div>