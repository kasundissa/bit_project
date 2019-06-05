<?php

if (isset($_POST["cname"]))
{

    include_once("c_customer.php");
    $c = new customer();

    $c->cus_Name = $_POST["cname"];
    $c->cus_password = $_POST["cpassword"];
    $c->cus_NIC = $_POST["cnic"];
    $c->cus_address = $_POST["caddress"];
    $c->cus_mobile = $_POST["cmobile"];
    $c->cus_email = $_POST["cemail"];

    $c->register();

}
include_once("head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
<form method="post" action="#" class="form-horizontal">

    <div class="form-group">
        <label class="control-label col-sm-2">Name:</label>
        <div class="col-sm-10">
            <input type="text" name="cname" class="form-control"  placeholder="Enter Customer Name">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" >Password:</label>
        <div class="col-sm-10">
            <input type="password" name="cpassword" class="form-control" placeholder="Enter password">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >NIC:</label>
        <div class="col-sm-10">
            <input type="text" name="cnic" class="form-control" placeholder="Enter NIC">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Address:</label>
        <div class="col-sm-10">
            <input type="text" name="caddress" class="form-control"  placeholder="Enter Address">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Mobile:</label>
        <div class="col-sm-10">
            <input type="text" name="cmobile" class="form-control"  placeholder="Enter Mobile Number">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Email:</label>
        <div class="col-sm-10">
            <input type="text" name="cemail" class="form-control" placeholder="Enter Email Address">
        </div>
    </div>


    <input type="submit" class="btn">
</form>
</body>
</html>
<?php
include_once("foot.php");
?>