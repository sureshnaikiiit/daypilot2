<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<title>Welcome to daypilot</title>
<fieldset class="body">
<body>
	
<h2>Welcome to Event Management System!</h2>

<?php
include("connect.php");
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	include("session.php");
	include("links.php");
}else{

	echo "<center>";
	echo "<a href='home.php'>Home</a>&nbsp&nbsp&nbsp";
	echo "<a href='aboutus.php'>About Us</a>&nbsp&nbsp&nbsp";
	echo "<a href='contactus.php'>Contact Us</a>&nbsp&nbsp<br/><hr/>";
	echo "<fieldset style='margin-left:39%;margin-right:39%;';>";
	echo "<legend style='margin-right:70%'>Login</legend>";
	echo "<form method='post' action='login.php'>";
	echo "<table border='1'>";
	echo "<tr><td width='37%' >Username:</td>";
	echo "<td><input type='text' name='username' size='20'/></td></tr>";
	echo "<tr><td >Password:</td>";
	echo "<td><input type='password' name='password' /></td></tr>";
	echo "</table>";
	echo "<input type='submit' value='submit'>";
	echo "</form>";
	echo "<a href='forgot.php'>Forgot Password</a> | ";
	echo "<a href='registration.php'>Registration</a>";
	echo "</fieldset>";
	echo "</center>";

	}
?>
</body>
</fieldset>
</html>
