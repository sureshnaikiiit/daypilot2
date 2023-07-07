<html>
<body>
<center>
<?php
include("connect.php");
$con=mysqli_connect("localhost","root","");
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	//include("session.php");

$name=$_POST['name'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$phone=$_POST['phone'];
if($name){
	if($username){
		if($email){
			if($password){
				if($cpassword){
					if($password==$cpassword){
						$passwordmd5=md5($password);
						if($phone){
mysqli_select_db($con,"daypilot") or die("Error: ".mysqli_error($con));
$query=mysqli_query($con,"SELECT username FROM details WHERE username='$username'");
$rows=mysqli_num_rows($query);
if($rows==0){
	mysqli_query($con,"INSERT INTO details(name,username,email,password,phone)
	VALUES('$name','$username','$email','$passwordmd5','$phone')") or die("Error: ".mysqli_error($con));
	echo "Successfully Registered!";
	header("Refresh:2,url=home.php");
					}else{
						echo "Username already exists...Please try again!";
						header("Refresh:1,url=registration.php");
						}
							}else{
								echo "Please Enter your Phone number!";
								header("Refresh:1,url=registration.php");
								}
						}else{
							echo "Password doesn't match!";
							header("Refresh:1,url=registration.php");
							}
					}else{
						echo "Please enter confirm password!";
						header("Refresh:1,url=registration.php");
						}
				}else{
					echo "Please enter password!";
					header("Refresh:1,url=registration.php");
					}
			}else{
				echo "Please enter an email!";
				header("Refresh:1,url=registration.php");
				}
		}else{
			echo "Please enter an username!";
			header("Refresh:1,url=registration.php");
			}
	}else{
		echo "Please enter a name!";
		header("Refresh:1,url=registration.php");
		}
}else{
	echo "Error:404, Page not found!";
	header("Refresh:2,url=home.php");
	}


?>




</center>
</body>
</html>
