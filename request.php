<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<fieldset class="body">
<body>
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
	
	echo "<form method='post' action='request1.php'>";
	echo "<table border=''>";
	echo "<tr><td>Email:</td>";
	echo "<td><input type='text' name='email'/></td></tr>";
	echo "<tr><td>Request:</td>";
	echo "<td><textarea name='request'></textarea></td></tr>";
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
