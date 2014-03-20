<?php unset($_POST); ?>
<head>
<script>
function validateButton (button){
	for (i=0; i<button.length; ++i){
		if (button[i].checked) { return true; }
	}
	return false;
}

function validateFormb(){
	return true;
}

function validateForm(){
	var x = document.forms["requestform"];
	var dateformat = /^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/;
	var timeformat = /([0-1][0-9]|[2-2][0-3]):[0-5][0-9]/;

	if (x["date"].value==null || x["date"].value==""){
		alert("\"Date of Trip\" is a required field");
		x["date"].focus();
		return false;
	}
	var date = x["date"].value;
	if(!date.match(dateformat)){
		alert("Invalid date format (yyyy-mm-dd)");
		x["date"].focus();
		return false;
	}
	if(x["class"].value==null || x["class"].value==""){
		alert("\"Class & Hour\" is a required field");
		x["class"].focus();
		return false;
	}
	if(x["destination"].value==null || x["destination"].value==""){
		alert("\"Destination\" is a required field");
		x["destination"].focus();
		return false;
	}
	if(x["dtime"].value==null || x["dtime"].value==""){
		alert("\"Departure Time\" is a required field");
		x["dtime"].focus();
		return false;
	}
	var time = x["dtime"].value;
	if(!time.match(timeformat)){
		alert("Invalid time format (HH:MM e.g. 01:00)");
		x["dtime"].focus();
		return false;
	}
	if(x["students"].value==null || x["students"].value==""){
		alert("\"Number of students going\" is a required field");
		x["students"].focus();
		return false;
	}
	if(x["atime"].value==null || x["atime"].value==""){
		alert("\"Approximate time returning to school\" is a required field");
		x["atime"].focus();
		return false;
	}
	var time = x["atime"].value;
	if(!time.match(timeformat)){
		alert("Invalid time format (HH:MM e.g. 01:00)");
		x["atime"].focus();
		return false;
	}
	if(!validateButton(x["sub"])){
		alert("\"Sub arrangement made?\" is a required field");
		return false;
	}
	if(!validateButton(x["guest"])){
		alert("\"Guest teacher needed for\" is a required field");
		return false;
	}
	if(x["cost"].value==null || x["cost"].value==""){
		alert("\"Cost per student\" is a required field (note: please exclude the '$' sign)");
		x["cost"].focus();
		return false;
	}
	if(x["cost"].value==0){
		if(x["fund"].value==null || x["fund"].value==""){
			alert("Please explain who is funding the trip");
			x["fund"].focus();
			return false;
		}
	}
	if(x["busConfName"].value==null || x["busConfName"].value=="" || x["busConfDate"].value==null || x["busConfDate"].value==""){
		alert("\"Bus confirmation\" is a required field");
		x["busConfName"].focus();
		return false;
	}
	var date = x["busConfDate"].value;
	if(!date.match(dateformat)){
		alert("Invalid date format (yyyy-mm-dd)");
		x["busConfDate"].focus();
		return false;
	}
	if(x["objective"].value=="" || x["activities"].value=="" || x["why"].value=="" || x["follow-up"].value==""){
		alert("Please answer the last 4 questions.");
		if(x["objective"].value==""){ x["objective"].focus(); }
		else if(x["activities"].value==""){ x["activities"].focus(); }
		else if(x["why"].value==""){ x["why"].focus(); }
		else if(x["follow-up"].value==""){ x["follow-up"].focus(); }
		return false;
	}
	else{
		alert("Validated");
		return true;
	}

}
</script>
</head>

<center><h1><span>Request</span></h1></center>
<div id="form">
	<form name="requestform" action="teacher.php?page=request2" onsubmit="return validateForm()" method="post">
	<center><h4 style="color:#6cd81e">Field Trip Request</h4></center>
		<p>
			<label>Date of Trip: </label>
			<input type=date placeholder="yyyy-mm-dd" title="yyyy-mm-dd" name="date">
		</p>
		<!--
		<p>
			<label>Other Sponsors: </label>
			<input type=text title="other sponsors" name="sponsors">
		</p>
		-->
		<p>
			<label>Class & Hour: </label>
			<input type=text title="class & hours" name="class">
		</p>
		
		<p>
			<label>Destination: </label>
			<input type=text title="destination" name="destination">
		</p>
		
		<p>
			<label>Departure Time: </label>
			<input type=time placeholder="24-hour clock (e.g. 13:00)" title="departure time" name="dtime">
		</p>
		
		<p>
			<label>Number of students going: </label>
			<input type=number title="number of students" min="1" name="students">
		</p>
		
		<p>
			<label>Approximate time returning to school: </label>
			<input type="time" placeholder="24-hour clock (e.g. 13:00)" title="arrival time" name="atime">
		</p>
		<!--
		<p>
			<label>Sub arrangements made? </label><br>
			<input type=radio value="yes" name="sub">Yes 
			<input type="radio" value="no" name="sub">No
		</p>
		
		<p>
			<label>Guest teacher needed for? </label><br>
			<input type=checkbox value="1" name="guest">1st 
			<input type=checkbox value="2" name="guest">2nd 
			<input type=checkbox value="3" name="guest">3rd 
			<input type=checkbox value="0" name="guest">AA  
			<input type=checkbox value="4" name="guest">4th 
			<input type=checkbox value="5" name="guest">5th 
			<input type=checkbox value="6" name="guest">6th
		</p>
		-->
		<p>
			<label>Cost per student: </label>
			<input type=number title="cost" min="0" name="cost">
		</p>
		
		<p>
			<label>If not being paid by the student, who is funding the trip? </label>
			<input type=text title="who is funding the trip?" name="fund">
		</p>
		<!--
		<p id="inline">
			<label>Tentative school bus confirmation made by </label>
			<input type=text title="name" placeholder="name" name="busConfName"> on 
			<input type=date title="date" placeholder="date (yyyy-mm-dd)" name="busConfDate">
		</p>
		-->
		<p>
			<label>What are the class objectives that tie into the proposed trip?</label>
			<textarea rows=3 cols=75 title="What are the class objectives that tie into the proposed trip?" name="objective"></textarea>
		</p>
		
		<p>
			<label>Describe the class activities prior to the field trip that will integrate the field trip with the curriculum</label>
			<textarea rows=3 cols=75 title="Describe the class activities prior to the field trip that will integrate the field trip with the curriculum" name="activities"></textarea>
		</p>
		
		<p>
			<label>Why is the field trip the best way to achieve/reinforce the class objective?</label>
			<textarea rows=3 cols=75 title="Why is the field trip the best way to achieve/reinforce the class objective?" name="why"></textarea>
		</p>
		
		<p>
			<label>What follow-up activities will be used in the classroom/curriculum to assist the students in applying the experience they learned on this field trip?</label>
			<textarea rows=3 cols=75 title="What follow-up activities will be used in the classroom/curriculum to assist the students in applying the experience they learned on this field trip?" name="follow-up"></textarea>
		</p><br>
<!--		<center><h4 style="color:#6cd81e">District Field Trip Bus form</h4></center>
		<p>
			<label></label>
			<input type="">
		</p>
		
		
-->		
		<center><input type="submit" value="Submit Request"></center>
	</form>
</div>

