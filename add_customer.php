<?php

if (isset($_POST["cname"]))
{
    echo "saving......";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
<form method="post" action="#">
    <label>Name</label>
    <input type="text" name="cname"><br/>
    <label>Password</label>
    <input type="password" name="cpassword"><br/>
    <label>NIC</label>
    <input type="text" name="cnic"><br/>
    <label>Address</label>
    <input type="text" name="caddress"><br/>
    <label>Mobile</label>
    <input type="text" name="cmobile"><br/>
    <label>Email</label>
    <input type="text" name="cemail"><br/>
    <input type="submit">
</form>
</body>
</html>