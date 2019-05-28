<?php

if(isset($_POST["uname"])){
	echo "saving......";
	include_once("c_user.php");
	$u=new user();

	$u->usr_Name = $_POST["uname"];
	$u->usr_password = $_POST["upassword"];
	$u->usr_NIC = $_POST["unic"];
	$u->usr_address = $_POST["uaddress"];
	$u->usr_mobile = $_POST["umobile"];
	$u->usr_email = $_POST["uemail"];
	$u->register();
}
?>


<!DOCTYPE html>
<html>
<body>
	<form method="POST" action="#">
		<label>Name</label>
		<input type="text" name="uname"><br/>
		<label>Password</label>
		<input type="password" name="upassword"><br/>
		<label>NIC</label>
		<input type="text" name="unic"><br/>
		<label>Address</label>
		<input type="text" name="uaddress"><br/>
		<label>Mobile</label>
		<input type="text" name="umobile"><br/>
		<label>Email</label>
		<input type="text" name="uemail"><br/>
		<input type="submit">
	</form>
</body>
</html>	