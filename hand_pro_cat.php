<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 20-May-19
 * Time: 12:24 PM
 */
include_once("c_pro_cat.php");
$p=new product_category();

$p->cat_code=$_POST["pcode"];
$p->cat_name=$_POST["pcategory"];
$p->register();
?>