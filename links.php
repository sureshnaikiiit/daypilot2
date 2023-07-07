<html>
<center>
<?php
//session_start();
if((isset($_SESSION['username']) && isset($_SESSION['password'])) && ($_SESSION['username']!="admin")){
	echo "<a href='user.php'>Home</a>&nbsp&nbsp";
	echo "<a href='addevent.php'>Add Event</a>&nbsp&nbsp";
	echo "<a href='viewevent.php'>View Event</a>&nbsp&nbsp";
	echo "<a href='request.php'>Request</a>&nbsp&nbsp";
	echo "<a href='aboutus.php'>About Us</a>&nbsp&nbsp";
	echo "<a href='contactus.php'>Contact Us</a>&nbsp&nbsp<hr/>";
}elseif((isset($_SESSION['username']) && isset($_SESSION['password'])) && ($_SESSION['username']=="admin")){
	echo "<a href='user.php'>Home</a>&nbsp&nbsp";
	echo "<a href='addevent.php'>Add Event</a>&nbsp&nbsp";
	echo "<a href='viewevent.php'>View Admin Events</a>&nbsp&nbsp";
	echo "<a href='viewadmin.php'>View All Events</a>&nbsp&nbsp";
	echo "<a href='update.php'>Update an Event</a>&nbsp&nbsp";
	echo "<a href='update1.php'>Delete an Event</a>&nbsp&nbsp";
	echo "<a href='aboutus.php'>About Us</a>&nbsp&nbsp";
	echo "<a href='contactus.php'>Contact Us</a><hr/>";
	
	}
	else{
		echo "<a href='home.php'>Home</a>&nbsp&nbsp";
		echo "<a href='contactus.php'>Contact Us</a>&nbsp&nbsp";
		echo "<a href='aboutus.php'>About Us</a><br/><hr/>";
		
		
		}
?>

</center>
</html>
