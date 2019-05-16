<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 16-May-19
 * Time: 5:02 PM
 */
include_once("c_customer.php");
$c=new customer();

$c->cus_Name=$_POST["cname"];
$c->cus_password=$_POST["cpassword"];
$c->cus_NIC=$_POST["cnic"];
$c->cus_address=$_POST["caddress"];
$c->cus_mobile=$_POST["cmobile"];
$c->cus_email=$_POST["cemail"];

$c->register();
?>