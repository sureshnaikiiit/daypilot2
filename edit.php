<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<fieldset class="body">
<center>

<link rel="stylesheet" href="calender/jquery-ui.css">
<script src="calender/jquery-1.10.2.js"></script>
<script src="calender/jquery-ui.js"></script>
<!--<link rel="stylesheet" href="/resources/demos/style.css">-->
<script>
$(function() {
$( "#datepicker" ).datepicker({
showOtherMonths: true,
selectOtherMonths: true
});
});
</script>

<?php
include("connect.php");
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	echo "</center>";
	include("session.php");
	echo "<center>";
	include("links.php");
	echo "<form action='change.php' method='post'>";
	echo "<table border=''>";
	echo "<tr><td>Event name</td>
	<td><input type='text' name='new_event_name' value='".$_REQUEST['event_names']."'></td></tr>";
	echo "<tr><td>Date</td>
	<td><input type='text' name='new_date' id='datepicker' value='".$_REQUEST['dates']."'></td></tr>";
	echo "<tr><td>Time:</td>";
	echo "<td><select name='new_time'>
	<option>".$_REQUEST['times']."</option>
	<option>1:00</option>
	<option>2:00</option>
	<option>3:00</option>
	<option>4:00</option>
	<option>5:00</option>
	<option>6:00</option>
	<option>7:00</option>
	<option>8:00</option>
	<option>9:00</option>
	<option>10:00</option>
	<option>12:00</option>
	</select><select name='new_time1'>
	<<option>AM</option>
	<option>PM</option></select></td></td></tr>";
	echo "<tr><td>Place</td>
	<td><input type='text' name='new_place' value='".$_REQUEST['places']."'></td></tr>";
	echo "<tr><td>Description</td>
	<td><textarea name='new_description' value='".$_REQUEST['descriptions']."'></textarea></td></tr>";
	echo "</table>";
	echo "<input type='submit' value='submit'/>";
	echo "<input type='hidden' name='id' value='".$_REQUEST['event_ids']."'/>";
	echo"</form>";
	echo "<a href='update.php'>Back</a>";
}else{
	echo "Error:404, Page not found!";
	header("Refresh:1,url=home.php");
	
	}
?>
</center>
</fieldset>
</html>
