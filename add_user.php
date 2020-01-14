<?php
session_start();

if ($_SESSION["utype"]=="admin"){

}
else
{
    header("location:page-login.php");
}

include_once("c_user.php");  //import the user class file


if(isset($_POST["uaddress"])){
    $u2=new user(); //create a new object

    $u2->usr_Name = $_POST["uname"];  //match the variables with user interface
    if(isset($_POST["upassword"]))
	    $u2->usr_password = $_POST["upassword"];
	$u2->usr_NIC = $_POST["unic"];
	$u2->dob = $_POST["dob"];
	$u2->usr_address = $_POST["uaddress"];
	$u2->usr_mobile = $_POST["umobile"];
	$u2->usr_email = $_POST["uemail"];
	$u2->role = $_POST['category'];
    $u2->basic_salary = $_POST["b_salary"];

	if(isset($_POST["uid"])){
        $u2->update($_POST["uid"]); //to call the update function

    }else{

        $u2->register(); //to call the register function
    }
}

$u=new user(); //create a new object
if(isset($_GET['ed'])){
    $u= $u->getbyid($_GET['ed']); // call the getbyid function to get user id
}
//include_once("c_emp_salary.php");

include_once("head.php");
?>


<!DOCTYPE html>
<html>
<body>
	<form method="POST" action="add_user.php" class="form-horizontal" id="f1">

<?php
        if(isset($_GET['ed'])){
            $id=$_GET['ed'];
            echo "<input name ='uid' type='hidden' value='$id'>"; //put user id into the hidden text box
        }


?>

        <div class="form-group">
            <label class="control-label col-sm-2">Name:</label>
            <div class="col-sm-10">
                <input type="text" name="uname" class="form-control"  placeholder="e.g.:-John" value="<?=$u->usr_Name?>" required> <!-- create a text box-->
            </div>
        </div>
        <?php
        if (!isset($_GET['ed']))
        echo('<div class="form-group">
            <label class="control-label col-sm-2">Password:</label>
            <div class="col-sm-10">
                <input type="password" name="upassword" class="form-control"  placeholder="e.g.:-1234" required>
            </div>
        </div>');
        ?>
        <div class="form-group">
            <label class="control-label col-sm-2" >NIC:</label>
            <div class="col-sm-10">
                <input type="text" name="unic" class="form-control" pattern="[0-9]{9}[X/V]|[0-9]{12}" placeholder="e.g.:-123456789V or 200034506789" value="<?=$u->usr_NIC?>" required>
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
                <input type="text" name="umobile" pattern="[0][0-9]{9}" class="form-control"  placeholder="e.g.:-0777712345" value="<?=$u->usr_mobile?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Email:</label>
            <div class="col-sm-10">
                <input type="email" name="uemail" class="form-control" placeholder="e.g.:-john@gmail.com" value="<?=$u->usr_email?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Basic Salary:</label>
            <div class="col-sm-10">
                <input type="text" name="b_salary" class="form-control" pattern="[0-9]{*}" placeholder="e.g.:-10000" value="<?=$u->basic_salary?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Role:</label>
            <div class="col-sm-10">
                <select name="category" class="form-control"><!-- to create a dropdown menu -->
                   <option value='admin'>Admin</option>
                    <option value='cashier'>Cashier</option>
                    <option value='storekeeper'>Store Keeper</option>
                    <option value='manager'>Manager</option>
                </select>
            </div>
        </div>
		<input type="submit" class="btn"> <!--submit button to submit the form-->
	</form>
</body>
</html>
<?php
include_once("foot.php");
?>