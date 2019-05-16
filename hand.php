<?php
include_once("c_user.php");
$u=new user();

$u->usr_Name = $_POST["uname"];
$u->usr_password = $_POST["upassword"];
$u->usr_NIC = $_POST["unic"];
$u->usr_address = $_POST["uaddress"];
$u->usr_mobile = $_POST["umobile"];
$u->usr_email = $_POST["uemail"];
$u->register();

?>