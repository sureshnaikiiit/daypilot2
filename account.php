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
	$query=mysqli_query($con,"SELECT * FROM details WHERE username='".$_SESSION['username']."'");
	$row=mysqli_num_rows($query);
	if($row!=0){
		echo "Account Details!";
		echo "<table border='0' bgcolor='' width='70%'> ";
		while($row1=mysqli_fetch_assoc($query)){
			$name=$row1['name'];
			$username=$row1['username'];
			$email=$row1['email'];
			$phone=$row1['phone'];
			}
			echo "<tr><td width='15%'>Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $name</td></tr>
			<tr><td width='15%'>Username:&nbsp&nbsp&nbsp&nbsp $username</td></tr>
			<tr><td width='15%'>Email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$email</td></tr>
			<tr><td width='15%'>Phone: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$phone</td></tr>";
			echo "</table>";
			
			
		}else{
			echo "Oops!";
			}
}else{
	echo "Error:404, Page not found!";
	header("Refresh:1,url=home.php");
}
?>
</center>
</fieldset>
</html>
