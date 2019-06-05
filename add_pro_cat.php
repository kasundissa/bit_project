<?php
if(isset($_POST["pcode"])){
	include_once("c_pro_cat.php");

	$p=new product_category();

	$p->cat_code=$_POST["pcode"];
	$p->cat_name=$_POST["pcategory"];
	$p->register();
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
        <label class="control-label col-sm-2">Product Code:</label>
        <div class="col-sm-10">
            <input type="text" name="pcode" class="form-control"  placeholder="Enter Product Code">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Product Category:</label>
        <div class="col-sm-10">
            <input type="text" name="pcategory" class="form-control"  placeholder="Enter Product Category">
        </div>
    </div>
    <input type="submit" class="btn">
</form>
</body>
</html>
<?php
include_once("foot.php");
?>