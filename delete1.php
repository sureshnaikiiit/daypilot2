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
	mysqli_select_db($con,"daypilot");
	mysqli_query($con,"DELETE FROM events WHERE event_id='".$_REQUEST['event_id']."'");
	echo "Successfully deleted!";
	header("Refresh:3,url=update1.php");
	
}else{
	echo "Error:404, Page not found!";
	header("Refresh:1,url=home.php");
}
?>
</center>
</fieldset>
</html>
