<html>
<link rel="stylesheet" type="text/css" href="style1.css"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
<fieldset class="body">
<body>
<center>
<?php
include("connect.php");
$con=mysqli_connect("localhost","root","");
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	//echo "<h3>Welcome!</h3>";
	echo "</center>";
	include("session.php");
	include("links.php");
	//include("date.php");
	echo "<center>";
	include("cal.php");
	
}else{
	echo "Please Login!";
	header("Refresh:1,url=home.php");
	}
?>



</center>
</body>
</fieldset>
</html>
