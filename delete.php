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
	$query=mysqli_query($con,"SELECT * FROM events WHERE event_id='".$_REQUEST['event_ids']."'");
	$row=mysqli_num_rows($query);
	if($row!=0){
		echo "<table border='1' bgcolor='lightyellow' width='70%'> ";
		echo "<tr><td width='7%'>Event id</td><td>Username</td><td width='10%' >Event name</td>
		<td width='5%'colspan='1'>Time</td><td width='10%' >Date</td>
		<td width='10%' >Place</td><td width='10%' >Description</td>";
		while($row=mysqli_fetch_assoc($query)){
			$event_id=$row['event_id'];
			$event_name=$row['event_name'];
			$time=$row['time'];
			$date=$row['date'];
			$place=$row['place'];
			$description=$row['description'];
			$user=$row['user'];
			#$day=$row['day'];
			
			echo "<tr><td width='7%'>$event_id</a></td>
			<td width='7%'>$user</td><td width='10%'>$event_name</td>
			<td width='5%'>$time</td><td width='10%'>$date</td>
			<td width='10%'>$place</td><td width='10%'>$description</td></tr>";
			}
			echo "</tr></table>";
			echo "<form method='post' action='delete1.php'>";
			echo "Are you sure to want to delete?<br/>";
			echo "<a href='update1.php'><input type='button' value='Cancel'/></a>&nbsp&nbsp&nbsp&nbsp&nbsp";
			echo "<input type='submit' value='OK'/>";
			echo "<input type='hidden' name='event_id' value='".$_REQUEST['event_ids']."'/>";
			echo "</form>";
}else{
	echo "No records!";
	}
}else{
	echo "Error:404, Page not found!";
	header("Refresh:1,url=home.php");
}
?>
</center>
</fieldset>
</html>
