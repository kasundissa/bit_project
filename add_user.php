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
include_once("head.php");
?>


<!DOCTYPE html>
<html>
<body>
	<form method="POST" action="#" class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-2">Name:</label>
            <div class="col-sm-10">
                <input type="text" name="uname" class="form-control"  placeholder="Enter User Name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Password:</label>
            <div class="col-sm-10">
                <input type="password" name="upassword" class="form-control"  placeholder="Enter Password">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >NIC:</label>
            <div class="col-sm-10">
                <input type="text" name="unic" class="form-control" placeholder="Enter NIC">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Address:</label>
            <div class="col-sm-10">
                <input type="text" name="uaddress" class="form-control"  placeholder="Enter Address">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Mobile:</label>
            <div class="col-sm-10">
                <input type="text" name="umobile" class="form-control"  placeholder="Enter Mobile Number">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Email:</label>
            <div class="col-sm-10">
                <input type="text" name="uemail" class="form-control" placeholder="Enter Email Address">
            </div>
        </div>
		<input type="submit" class="btn">
	</form>
</body>
</html>
<?php
include_once("foot.php");
?>