<html>
<head>
<style type="text/css">
/* calendar */
table.calendar{ border-left:1px solid #999; }
tr.calendar-row	{  }
td.calendar-day	{ min-height:80px; font-size:11px; position:relative; } * html div.calendar-day { height:80px; }
td.calendar-day:hover	{ background:#eceff5; }
td.calendar-day-np	{ background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }
td.calendar-day-head { background:#ccc; font-weight:bold; text-align:center; width:120px; padding:5px; border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999; }
div.day-number		{ background:#999; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; }
/* shared */
td.calendar-day, td.calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; }
</style>
</head>

<?php
$con=mysqli_connect("localhost","root","");
include("connect.php");
mysqli_select_db($con,"daypilot");
$query=mysqli_query($con,"SELECT date FROM events WHERE user='".$_SESSION['username']."'");
$row=mysqli_num_rows($query);
if($row!=0){
	while($row=mysqli_fetch_assoc($query)){
		$date=$row['date'];
		$date = explode('/', $date);
		$_SESSION['month1'] = $date[0];
		$_SESSION['day1']= $date[1];
		$_SESSION['year1']= $date[2];
		//echo "'".$_SESSION['month1']."', '".$_SESSION['year1']."', ";
		}
		$today=date('m/d/Y');
		//echo "Today's date is ".$today;
		date_default_timezone_set('Asia/Calcutta');
		//echo "<br/>Time: ".date('h:i:s A');
		$date1=explode('/',$today);
		$_SESSION['cmonth']=$date1[0];
		$_SESSION['cdate']=$date1[1];
		$_SESSION['cyear']=$date1[2];
		
		/* date settings */
		$month1=$_SESSION['cmonth'];
		$year1=$_SESSION['cyear'];
		$date1=$_SESSION['cdate'];
		//echo "<br/>Month: $month1";
		//echo "<br/>Year: $year1";
		//echo "<br/>Date: $date1";
/* draws a calendar */
function draw_calendar($month,$year){

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();
	
	//echo "Running day:$running_day<br/>";
	//echo "days_in_month:$days_in_month <br/>";
	//echo "days_in_this_week:$days_in_this_week<br/>";
	//echo "dates_array:$dates_array";

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}

/* sample usages */
//echo "<h2>$month1, $year1</h2>";
echo draw_calendar($month1,$year1);
	
	
//$month = (int) ($_GET["$month1"] ? $_GET["$month1"] : date('m'));
//$year = (int)  ($_GET["$year1"] ? $_GET["$year1"] : date('Y'));
$month=$month1;
$year=$year1;



/* select month control */
$select_month_control = '<select name="month" id="month">';
for($x = 1; $x <= 12; $x++) {
	$select_month_control.= '<option value="'.$x.'"'.($x != $month ? '' : ' selected="selected"').'>'.date('F',mktime(0,0,0,$x,1,$year)).'</option>';
}
$select_month_control.= '</select>';

/* select year control */
$year_range = 7;
$select_year_control = '<select name="year" id="year">';
for($x = ($year-floor($year_range/2)); $x <= ($year+floor($year_range/2)); $x++) {
	$select_year_control.= '<option value="'.$x.'"'.($x != $year ? '' : ' selected="selected"').'>'.$x.'</option>';
}
$select_year_control.= '</select>';

/* "next month" control */
$next_month_link = '<a href="?month='.($month != 12 ? $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1).'" class="control">Next Month >></a>';

/* "previous month" control */
$previous_month_link = '<a href="?month='.($month != 1 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'" class="control"><< 	Previous Month</a>';

/* bringing the controls together */
$controls = '<form method="get">'.$select_month_control.$select_year_control.' <input type="submit" name="submit" value="Go" />      '.$previous_month_link.'     '.$next_month_link.' </form>';

echo $controls;

	}
	else{
		echo "You don't have any event!";
		}







?>



</html>
