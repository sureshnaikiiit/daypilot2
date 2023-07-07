<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<fieldset class="body">
<center>
<?php
session_start();
session_destroy();

echo "Successfully Logout!";
header("Refresh:2;url=home.php");


?>
</center>
</fieldset>
</html>
