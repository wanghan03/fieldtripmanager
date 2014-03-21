<?php
class calendar{
	/* draws a calendar */
	function draw_calendar($month,$year,$events = array()){
		$dayofweek = array('<td class="calendar-header">Sunday</td>',
		'<td class="calendar-header">Monday</td>',
		'<td class="calendar-header">Tuesday</td>',
		'<td class="calendar-header">Wednesday</td>',
		'<td class="calendar-header">Thursday</td>',
		'<td class="calendar-header">Friday</td>',
		'<td class="calendar-header">Saturday</td>');
		
		/* draw table
			- fill top row with array using implode */
		$calendar = '<table class="calendar"><tr class="calendar-row">'.implode($dayofweek).'</tr>';
		
		// mktime(hour,minute,second,month,day,year);
		// figures out the which day of the week 1st is based on provided $month and $year
		$startDay = date('w',mktime(0,0,0,$month,1,$year)); // return days of the week
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$daysFilled;
		$counter = 0;
	
		/* row 2 */
		$calendar.= '<tr class="calendar-row">';
	
		/* print "blank" days until the first of the month */
		for($i = 0; $i < $startDay; $i++){
			$calendar.= '<td class="calendar-empty"> </td>';
			$daysFilled++;
		}
	
		/* for loop to add days */
		for($i = 1; $i <= $days; $i++):
			$calendar.= '<td class="calendar-day"><div style="position:relative;height:100px;"><div class="date">'.$i.'</div>';
			
			if ($i < 10){
				$i = "0".$i;
			}
			
			// input event into calendar
			$eventDay = $year.'-'.$month.'-'.$i;
				if(isset($events[$eventDay])) { // if there are events on $eventDay
					foreach($events[$eventDay] as $event) { // for each event, add to calendar
						$calendar.= '<div class="event">'.$event.'</div>';
					}
					$calendar.='</td>';
				}
				
				else {
					$calendar.= '<p> </p><p> </p></div></td>';
				}

			if($startDay == 6){ // if the month starts on Saturday, end current row
				$calendar.= '</tr>';
				if(($counter+1) != $days){ // if there are still days left to fill, new row
					$calendar.= '<tr class="calendar-row">';
				}
				$startDay = -1;
				$daysFilled = 0;
			}
			$daysFilled++;
			$startDay++;
			$counter++;
		endfor;
	
		// finish filling in the rest of the days with blanks
		if($daysFilled < 8 && $daysFilled !=1):
			for($x = 1; $x <= (8 - $daysFilled); $x++):
				$calendar.= '<td class="calendar-empty"> </td>';
			endfor;
		endif;
	
		// end row, table
		$calendar.= '</tr></table>';
		
		
		// return HTML code for calendar
		return $calendar;
	}
}
?>