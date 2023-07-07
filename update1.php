<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<fieldset class="body">
<center>
<?php
include("connect.php");
$con=mysqli_connect("localhost","root","");
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	if($_SESSION['username']=="admin"){
	echo "</center>";
	include("session.php");
	echo "<center>";
	include("links.php");
	mysqli_select_db($con,"daypilot");
	$query=mysqli_query($con,"SELECT * FROM events");
	$row=mysqli_num_rows($query);
	if($row!=0){
		echo "<center><b>Click on \"Event id\" to delete an event!</b></center>";
		echo "<table border='1' bgcolor='lightyellow' width='70%'> ";
		echo "<tr><td width='7%'>Event id</td><td>Username</td><td width='10%' >Event name</td>
		<td width='5%'colspan='1'>Time</td><td width='10%' >Date</td>
		<td width='10%' >Place</td><td width='10%' >Description</td>";
		$per_page=7;
		$pages_query=mysqli_query($con,"SELECT COUNT('id') FROM events ");
		#$pages=ceil(mysql_result($pages_query,0)/$per_page);
		$pages=ceil($row/$per_page);
		$page=(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$start=($page-1)*$per_page;
		$query=mysqli_query($con,"SELECT * FROM events ORDER BY date LIMIT $start,$per_page");
		
		while($row1=mysqli_fetch_assoc($query)){
			$event_id=$row1['event_id'];
			$event_name=$row1['event_name'];
			$time=$row1['time'];
			$date=$row1['date'];
			$place=$row1['place'];
			$description=$row1['description'];
			#$day=$row1['day'];
			$user=$row1['user'];
			
			echo "<tr><td width='7%'><a href='delete.php?event_ids=$event_id&event_names=$event_name
			&dates=$date&places=$place&descriptions=$description&users=&user'>$event_id</a></td>
			<td width='7%'>$user</td><td width='10%'>$event_name</td>
			<td width='5%'>$time</td><td width='10%'>$date</td>
			<td width='10%'>$place</td><td width='10%'>$description</td></tr>";
			}
			
			echo "</tr></table>";
			$prev=$page-1;	
			$next=$page+1;
			if($page!=1){
			echo "<a href='viewadmin.php?page=$prev'>Prev</a>";
			}
			if($pages>=1){
				for($x=1;$x<=$pages;$x++){
					echo($x==$page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ':'<a href="?page='.$x.'">'.$x.'</a> ';
					}
				
				}
			if(!($page>=$pages)){
			echo "<a href='viewadmin.php?page=$next'>Next</a>";
			}
			
		}else{
			echo "You don't have any event!";
			}
		}else{
			echo "Error:404, Page not found!";
			}
}else{
	echo "Error:404, Page not found!";
	header("Refresh:1,url=home.php");
}
?>
</center>
</fieldset>
</html>
