<?php
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");
include_once("c_user.php");


if(isset($_POST["uname"])){
    $u2=new user();

    $u2->usr_Name = $_POST["uname"];
	$u2->usr_password = $_POST["upassword"];
	$u2->usr_NIC = $_POST["unic"];
	$u2->dob = $_POST["dob"];
	$u2->usr_address = $_POST["uaddress"];
	$u2->usr_mobile = $_POST["umobile"];
	$u2->usr_email = $_POST["uemail"];

	if(isset($_POST["uid"])){
        $u2->update($_POST["uid"]);

    }else{

        $u2->register();
    }
}

$u=new user();
if(isset($_GET['ed'])){
    $u= $u->getbyid($_GET['ed']);
}


include_once("head.php");
?>


<!DOCTYPE html>
<html>
<body>
	<form method="POST" action="add_user.php" class="form-horizontal" id="f1">

<?php
        if(isset($_GET['ed'])){
            $id=$_GET['ed'];
            echo "<input name ='uid' type='hidden' value='$id'>";
        }


?>

        <div class="form-group">
            <label class="control-label col-sm-2">Name:</label>
            <div class="col-sm-10">
                <input type="text" name="uname" class="form-control"  placeholder="e.g.:-John" value="<?=$u->usr_Name?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Password:</label>
            <div class="col-sm-10">
                <input type="password" name="upassword" class="form-control"  placeholder="e.g.:-1234" value="<?=$u->usr_password?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >NIC:</label>
            <div class="col-sm-10">
                <input type="text" name="unic" class="form-control" placeholder="e.g.:-123456789V" value="<?=$u->usr_NIC?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Date of Birth:</label>
            <div class="col-sm-10">
                <input type="date" name="dob" class="form-control" value="<?=$u->dob?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Address:</label>
            <div class="col-sm-10">
                <input type="text" name="uaddress" class="form-control"  placeholder="e.g.:-Kandy" value="<?=$u->usr_address?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Mobile:</label>
            <div class="col-sm-10">
                <input type="text" name="umobile" class="form-control"  placeholder="e.g.:-0777712345" value="<?=$u->usr_mobile?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Email:</label>
            <div class="col-sm-10">
                <input type="email" name="uemail" class="form-control" placeholder="e.g.:-john@gmail.com" value="<?=$u->usr_email?>" required>
            </div>
        </div>
		<input type="submit" class="btn">
	</form>
</body>
</html>
<?php
include_once("foot.php");
?>
