<html>
<center>
<?php
$con=mysqli_connect("localhost","root","");
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	header("Refresh:1,url=user.php");
	}
else{
include("connect.php");
$username=$_POST['username'];
$passwordmd5=md5($_POST['password']);
if(($_POST['username']) && ($_POST['password'])){
	mysqli_select_db($con,"daypilot");
	$query=mysqli_query($con,"SELECT * FROM details WHERE username='$username'");
	$rows=mysqli_num_rows($query);
	if($rows!=0){
		while($rows=mysqli_fetch_assoc($query)){
			$dbusername=$rows['username'];
			$dbpassword=$rows['password'];
			}
		if($username==$dbusername){
			if($passwordmd5==$dbpassword){
				$_SESSION['username']=$username;
				$_SESSION['password']=$passwordmd5;
				//echo "'".$_SESSION['password']."'";
				header("Refresh:0, url=user.php");
				}else{
					echo "Password doesn't match!";
					header("Refresh:1, url=home.php");
					}
			}else{
				echo "Username doesn't match!";
				header("Refresh:1, url=home.php");
				}
		}
		else{
			echo "Username/Password wrong!";
			header("Refresh:1, url=home.php");
			}
}else{
	echo "Please fill all the blanks!";
	header("Refresh:1, url=home.php");
	}
}

?>
</center>
</html>
