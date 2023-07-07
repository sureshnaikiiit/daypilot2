<html>

<?php
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	$today=date('/ D, M d, Y');
	date_default_timezone_set('Asia/Calcutta');
	echo "Last Refreshed At: ".date('h:i:s A')." ";
	echo "$today";
	echo "<p style='color:black;text-align:right'>Hi, <b>".$_SESSION['username']."!&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<a href='account.php'>My Account</a> |
	<a href='logout.php'>Logout</a><br/></p><hr/>";
}elseif($_SESSION['username']=="admin"){
	echo "<p style='color:black;'>Hi, <b>".$_SESSION['username']."!</p>";
	echo "<a href='logout.php'>Logout</a><br/><hr/>";
	echo "<p style='color:black;'>Test</p>";
	}
	else{
		
		}

?>
</html>
