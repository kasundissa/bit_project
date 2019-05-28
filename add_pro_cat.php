<?php
if(isset($_POST["pcode"])){
	echo "saving......";
	include_once("c_pro_cat.php");

	$p=new product_category();

	$p->cat_code=$_POST["pcode"];
	$p->cat_name=$_POST["pcategory"];
	$p->register();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
<form method="post" action="#">
    <label>Product Code</label>
    <input type="text" name="pcode"><br/>
    <label>Product Category</label>
    <input type="text" name="pcategory"><br/>
    <input type="submit">
</form>
</body>
</html>