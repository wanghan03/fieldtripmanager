<center><h1><span>Agenda</span></h1></center>
<?php
$today = date(Y).'-'.date(m).'-'.date(d);
$array = $mysql->get_alltrips();
$display = '<div id="list">';
$count = 0;
if ($array != 0){
	for($row = 0; $row < count($array); $row++){
		if ($array[$row][date]>=$today){
			$display .= '<h4>'.$array[$row][date].'</h4>';
			$display .= '<p>';
			if ($array[$row][approval]==0){
				$display .= '<a id="hyperlinkred" href="?page=waiting#'.$array[$row][destination].'">';
			}
			$display .= $array[$row][destination];
			$display .= ' ('.$array[$row][startTime].' -';
			$display .= ' '.$array[$row][endTime].')';
			$display .='</a></p>';
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
<center><p>Note: events displayed in <a style=color:red;>red</a> are not yet approved.</p></center>