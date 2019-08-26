<?php
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");
include_once ("c_customer.php");

if (isset($_POST["cname"]))
{
    $c2 = new customer();
    $c2->cus_Name = $_POST["cname"];
    $c2->cus_NIC = $_POST["cnic"];
    $c2->loyalty_no = $_POST["l_no"];
    $c2->dob = $_POST["dob"];
    $c2->cus_address = $_POST["caddress"];
    $c2->cus_mobile = $_POST["cmobile"];
    $c2->cus_email = $_POST["cemail"];

    if(isset($_POST["uid"])){
        $c2->update($_POST["uid"]);

    }else{

        $c2->register();
    }

}
$c = new customer();
if(isset($_GET['ed'])){
    $c= $c->getbyid($_GET['ed']);
}

include_once("head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
<form method="post" action="add_customer.php" class="form-horizontal">

    <?php
    if(isset($_GET['ed'])){
        $id=$_GET['ed'];
        echo "<input name ='uid' type='hidden' value='$id'>";
    }


    ?>
    <div class="form-group">
        <label class="control-label col-sm-2">Loyalty Card No:</label>
        <div class="col-sm-10">
            <input type="text" name="l_no" class="form-control"  placeholder="e.g.:-0011223344" value="<?=$c->loyalty_no?>" required>
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
            <input type="text" name="cnic" class="form-control" placeholder="e.g.:-123456789V" value="<?=$c->cus_NIC?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Date of Birth:</label>
        <div class="col-sm-10">
            <input type="date" name="dob" class="form-control" value="<?=$c->dob?>" required>
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
            <input type="text" name="cmobile" class="form-control"  placeholder="e.g.:-0777712345" value="<?=$c->cus_mobile?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Email:</label>
        <div class="col-sm-10">
            <input type="email" name="cemail" class="form-control" placeholder="e.g.:-john@gmail.com" value="<?=$c->cus_email?>" required>
        </div>
    </div>


    <input type="submit" class="btn">
</form>
</body>
</html>
<?php
include_once("foot.php");
?>