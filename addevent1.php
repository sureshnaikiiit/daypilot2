<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<fieldset class="body">
<center>
<?php
include("connect.php");
$con=mysqli_connect("localhost","root","");
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	echo "</center>";
	include("session.php");
	echo "<center>";
	include("links.php");
	$eventname=$_POST['eventname'];
	$date=$_POST['date'];
	$place=$_POST['place'];
	$description=$_POST['description'];
	$time=$_POST['time'];
	$time1=$_POST['time1'];

	if($eventname && $date && $place && $description){
		mysqli_select_db($con,"daypilot");
		mysqli_query($con,"INSERT INTO events(user,event_name,date,time,place,description) 
		VALUES('".$_SESSION['username']."','$eventname','$date','$time','$place','$description')") or die("Error:".mysqli_error($con));
		echo "You have successfully, added an event!";
		header("Refresh:3,url=user.php");
		}else{
			echo "Please fill all the blanks!";
			header("Refresh:1,url=user.php");
			}
}else{
	echo "Error:404, Page not found!";
	header("Refresh:2,url=home.php");
	}

?>
</fieldset>
</center>
</html>
