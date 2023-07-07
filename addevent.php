<!doctype html>
<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<fieldset class="body">
<body>
<center>
	
<link rel="stylesheet" href="calender/jquery-ui.css">
<script src="calender/jquery-1.10.2.js"></script>
<script src="calender/jquery-ui.js"></script>
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
	echo "<form method='post' action='addevent1.php'>";
	echo "<table border='1'>";
	echo "<tr><td>Event Name:</td>";
	echo "<td><input type='text' name='eventname'/></td></tr>";
	echo "<tr><td>Date:</td>";
	echo "<td><input type='text' name='date' id='datepicker' /></td></tr>";
	echo "<tr><td>Time:</td>";
	echo "<td><select name='time'>
	<option></option>
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
	</select><select name='time1'>
	<option></option>
	<<option>AM</option>
	<option>PM</option></select></td></td></tr>";
	echo "<tr><td>Place:</td>";
	echo "<td><input type='text' name='place'/></td></tr>";
	echo "<tr><td>Description:</td>";
	echo "<td><textarea name='description' ></textarea></td>";
	echo "</tr>";
	echo "</table>";
	echo "<input type='submit' value='submit'>";
	echo "</form>";
	echo "<a href='user.php'>Back</a>";
	
	
}else{
	echo "Please Login!";
	header("Refresh:1,url=home.php");
	}
?>

</center>
</body>
</fieldset>
</html>
