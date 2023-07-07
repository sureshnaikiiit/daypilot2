<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<fieldset class="body">
<center>
<?php
$con=mysqli_connect("localhost","root","");
include("connect.php");
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	echo "</center>";
	include("session.php");
	echo "<center>";
	include("links.php");
	mysqli_select_db($con,"daypilot");
	$query=mysqli_query($con,"SELECT * FROM events WHERE user='".$_SESSION['username']."'");
	$row=mysqli_num_rows($query);
	if($row!=0){
		echo "<table border='1' bgcolor='lightyellow' width='70%'> ";
		echo "<tr>
		<td width='7%'>Event id</td>
		<td>Username</td>
		<td width='10%'>Event name</td>
		<td width='5%'>Time</td>
		<td width='10%'>Date</td>
		<td width='10%'>Place</td>
		<td width='10%'>Description</td>";
		$per_page=5;
		$pages_query=mysqli_query($con,"SELECT COUNT('id') FROM events WHERE user='".$_SESSION['username']."'");
		#echo $row;
		#$pages=ceil(mysql_result($pages_query,0)/$per_page);
		$pages=ceil($row/$per_page);
		$page=(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$start=($page-1)*$per_page;
		$query=mysqli_query($con,"SELECT * FROM events WHERE user='".$_SESSION['username']."' ORDER BY date DESC  LIMIT $start,$per_page");
		
		while($row1=mysqli_fetch_assoc($query)){
			$event_id=$row1['event_id'];
			$event_name=$row1['event_name'];
			$time=$row1['time'];
			$date=$row1['date'];
			$place=$row1['place'];
			$description1=$row1['description'];
			#$day=$row1['day'];
			$user=$row1['user'];
			
			echo "<tr><td width='7%'>$event_id</td>
			<td width='7%'>$user</td><td width='10%'>$event_name</td>
			<td width='5%'>$time</td><td width='10%'>$date</td>
			<td width='10%'>$place</td>
			<td width='10%'>$description1</td></tr>";
		
			}
			echo "</tr></table>";
		$prev=$page-1;	
		$next=$page+1;
		if($page!=1){
		echo "<a href='viewevent.php?page=$prev'>Prev</a>";
		}
		if($pages>=1){
			for($x=1;$x<=$pages;$x++){
				echo($x==$page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ':'<a href="?page='.$x.'">'.$x.'</a> ';
				}
			
			}
		if(!($page>=$pages)){
		echo "<a href='viewevent.php?page=$next'>Next</a>";
		}
		}else{
			echo "You don't have any event!";
			}
}else{
	echo "Please Login!";
	header("Refresh:1,url=home.php");
	}


?>
</center>
</fieldset>
</html>
