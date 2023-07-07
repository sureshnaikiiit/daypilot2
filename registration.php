<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<fieldset class="body">
<h2>Welcome to Event Management System!</h2>
<body>
<center>
<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	include("session.php");
	include("links.php");
}else{
	echo "<a href='home.php'>Home</a>&nbsp&nbsp&nbsp";
	echo "<a href='contactus.php'>Contact Us</a>&nbsp&nbsp&nbsp";
	echo "<a href='aboutus.php'>About Us</a>&nbsp&nbsp&nbsp<hr/>";	
	echo "<h4>Registration!</h4>";
	echo "<form method='post' action='register.php'>";
	echo "<table border=''>";
	echo "<tr><td>Name:</td>";
	echo "<td><input type='text' name='name'/></td></tr>";
	echo "<tr><td>Username:</td>";
	echo "<td><input type='text' name='username'/></td></tr>";
	echo "<tr><td>Email:</td>";
	echo "<td><input type='text' name='email' /></td></tr>";
	echo "<tr><td>Password:</td>";
	echo "<td><input type='password' name='password' /></td></tr>";
	echo "<tr><td>Confirm Password:</td>";
	echo "<td><input type='password' name='cpassword' /></td></tr>";
	echo "<tr><td>Phone:</td>";
	echo "<td><input type='text' name='phone'/></td></tr>";
	echo "</table>";
	echo "<input type='submit' value='submit'>";
	echo "</form>";
}




?>
</center>
</body>
</fieldset>
</html>
