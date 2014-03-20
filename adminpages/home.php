<center><h1><span>News</span></h1></center>

<?php
$x = 7; //how new? (ex. 7 = display events happened within the last 7 days)
$past = time() - $x*24*60*60;
$past_date = date('Y-m-d H:m:s', $past);
$array = $mysql->get_alltrips();
$display = '<div id="list">';
$count = 0;
if ($array != 0){
	$display .= '<center><h3>New Field Trips</h3></center>';
	for($row = 0; $row < count($array); $row++){
		if ($array[$row][created]>=$past_date){
			$display .= '<h4>'.$array[$row][date].'</h4>';
			$display .= '<p>';
			$display .= $array[$row][destination];
			$display .= ' ('.$array[$row][startTime].' -';
			$display .= ' '.$array[$row][endTime].')';
			$display .='</a></p>';
			$count++;
		}
	}
	$display .= '<center><h3>Just Approved</h3></center>';
	for($row = 0; $row < count($array); $row++){
		if ($array[$row][approvalDate]>=$past_date){
			$display .= '<h4>'.$array[$row][date].'</h4>';
			$display .= '<p>';
			$display .= $array[$row][destination];
			$display .= ' ('.$array[$row][startTime].' -';
			$display .= ' '.$array[$row][endTime].')';
			$display .= '<br><i>Approved: '.$array[$row][approvalDate].'</i>';
			$display .='</a></p>';
			$count++;
		}
	}
}
// if nothing is being added to $display
if ($count==0){
	$display .= 'no news';
}
$display .= '</div>';
echo $display;
?>
