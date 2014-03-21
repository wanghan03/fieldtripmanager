<HTML>
<![if !IE]>
<p>Hi</p>
<![endif]>

<head>
<script>
function validateForm(){
	var x = document.forms["requestform"];
	var time = x["time"].value;
	var timeformat = /([0-1][0-9]|[2-2][0-3]):[0-5][0-9]/;
	if(x["time"].value==null || x["time"].value==""){
		alert("\"Departure Time\" is a required field");
		x["time"].focus();
		return false;
	}
	if(!time.match(timeformat)){
		alert("Invalid time format (HH:MM)");
		return false;
	}

	return true;
}
</script>
</head>

<body>

<form name="requestform" action="" onsubmit="return validateForm()" method="get">
Departure Time: <input type="time" placeholder="24:00" title="departure time" name="time"><br>
<input type="submit">
</form>


</body>
</HTML>