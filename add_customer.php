<?php
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php"); //if user not logged in redirect to the login page
include_once ("c_customer.php"); //import the customer class file

if (isset($_POST["cname"]))
{
    $c2 = new customer(); //create a new object
    $c2->cus_Name = $_POST["cname"]; //match the variables with user interface
    $c2->cus_NIC = $_POST["cnic"];
    $c2->loyalty_no = $_POST["l_no"];
    $c2->dob = $_POST["dob"];
    $c2->cus_address = $_POST["caddress"];
    $c2->cus_mobile = $_POST["cmobile"];
    $c2->cus_email = $_POST["cemail"];

    if(isset($_POST["uid"])){
        $c2->update($_POST["uid"]); //update existing customer details

    }else{

        $c2->register(); //register a new customer
    }

}
$c = new customer(); //create a new object
if(isset($_GET['ed'])){
    $c= $c->getbyid($_GET['ed']); //call the getbyid function to get customer id
}

include_once("head.php");
?>

<form method="post" action="add_customer.php" class="form-horizontal">

    <?php
    if(isset($_GET['ed'])){
        $id=$_GET['ed'];
        echo "<input name ='uid' type='hidden' value='$id'>"; //put customer id into the hidden text box
    }
    ?>

    <div class="form-group">
        <label class="control-label col-sm-2">Loyalty Card No:</label>
        <div class="col-sm-10">
            <input type="text" name="l_no" class="form-control" readonly="readonly" value="<?=$c->loyalty_no?>"><!-- create a text box-->
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2">Name:</label>
        <div class="col-sm-10">
            <input type="text" name="cname" class="form-control"  placeholder="e.g.:-John" value="<?=$c->cus_Name?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >NIC:</label>
        <div class="col-sm-10">
            <input type="text" name="cnic" class="form-control" pattern="[0-9]{9}[X/V]|[0-9]{12}" placeholder="e.g.:-123456789V or 200034506789" value="<?=$c->cus_NIC?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Date of Birth:</label>
        <div class="col-sm-10">
            <input type="date" name="dob" class="form-control" value="<?=$c->dob?>" required> <!--create a date picker to select a date of birth-->
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Address:</label>
        <div class="col-sm-10">
            <input type="text" name="caddress" class="form-control"  placeholder="e.g.:-Kandy" value="<?=$c->cus_address?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Mobile:</label>
        <div class="col-sm-10">
            <input type="text" name="cmobile" class="form-control" pattern="[0][0-9]{9}"  placeholder="e.g.:-0777712345" value="<?=$c->cus_mobile?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Email:</label>
        <div class="col-sm-10">
            <input type="email" name="cemail" class="form-control" placeholder="e.g.:-john@gmail.com" value="<?=$c->cus_email?>" required> <!-- create a email box-->
        </div>
    </div>


    <input type="submit" class="btn"> <!--submit button to submit the form-->
</form>
<?php
include_once("foot.php");
?>