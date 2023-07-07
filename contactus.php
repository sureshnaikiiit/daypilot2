<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<fieldset class="body">
<body>
<center>

<?php
include("connect.php");
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password']) ){
	echo "</center>";
	include("session.php");
	echo "<center>";
	include("links.php");
	echo "<h3>Contact Us</h3>";
	echo "patrisolutions,<br/>"; 
	echo "Gyan Acrade complex,<br/>";
	echo "Ameerpet, Hyderabad-515751<br/>"; 
	
}else{
	echo "<h2>Welcome to Event Management System!</h2>";
	echo "<a href='home.php'>Home</a>&nbsp&nbsp&nbsp";
	echo "<a href='aboutus.php'>About Us</a>&nbsp&nbsp&nbsp";
	echo "<a href='contactus.php'>Contact Us</a><hr/";
	//echo "<h3>Contact Us</h3>";
	echo "<br/><p>Patrisolutions,<br/>"; 
	echo "Gyan Arcade complex,<br/>";
	echo "Ameerpet, Hyderabad-515751<p><br/>"; 
	//header("Refresh:1,url=home.php");
	}
?>

</center>
</body>
</fieldset>
</html>
