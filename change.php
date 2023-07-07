<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<fieldset class="body">
<center>
<?php
include("connect.php");
$con=mysqli_connect("localhost","root","");
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	include("session.php");
	include("links.php");
	$new_event_name=$_REQUEST['new_event_name'];
	$new_date=$_REQUEST['new_date'];
	$new_place=$_REQUEST['new_place'];
	$new_description=$_REQUEST['new_description'];
	$new_time=$_REQUEST['new_time'];
	$new_time1=$_REQUEST['new_time1'];
	if( $new_event_name && $new_date && $new_place && $new_description){
	mysqli_select_db($con,"daypilot");
	mysqli_query($con,"UPDATE events SET event_name='$new_event_name', date='$new_date',
	place='$new_place', description='$new_description', time='$new_time' WHERE event_id='".$_REQUEST['id']."'");
	echo "You are successfully updated!";
	header("Refresh:1,url=update.php");
}else{
	echo "Please fill all the blanks!";
	}
}else{
	echo "Error:404, Page not found!";
	header("Refresh:1,url=home.php");
	
	}
?>
</center>
</fieldset>
</html>
