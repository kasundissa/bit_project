<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 19-May-19
 * Time: 1:26 PM
 */
include_once ("c_drugs.php");
$d=new drugs();

$d->drug_name=$_POST["dname"];
$d->comp_name=$_POST["compname"];
$d->description=$_POST["descrip"];
$d->batch_no=$_POST["batch_no"];
$d->weight=$_POST["weight"];
$d->manu_date=$_POST["manu_date"];
$d->exp_date=$_POST["exp_date"];
$d->price=$_POST["price"];

$d->register();
?>