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
	
	$email=$_POST['email'];
	$request=$_POST['request'];
	if($email && $request){
		mysqli_select_db($con,"daypilot");
		mysqli_query($con,"INSERT INTO request(email,request) VALUES('$email','$request')");
		echo "Successfully submitted!";
		header("Refresh:3,url=request.php");
	}else{
		echo "Please fill the blanks!";
		header("Refresh:1,url=request.php");
		}
}else{
	echo "Error:404, Page not found!";
	header("Refresh:2,url=home.php");
	}
	
?>
</center>
</body>
</fieldset>
</html>
