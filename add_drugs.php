<?php
if (isset($_POST["dname"]))
{

    include_once("c_drugs.php");
    $d = new drugs();

    $d->drug_name = $_POST["dname"];
    $d->comp_name = $_POST["compname"];
    $d->description = $_POST["descrip"];
    $d->batch_no = $_POST["batch_no"];
    $d->weight = $_POST["weight"];
    $d->manu_date = $_POST["manu_date"];
    $d->exp_date = $_POST["exp_date"];
    $d->price = $_POST["price"];

    $d->register();
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
        <label class="control-label col-sm-2">Drug Name:</label>
        <div class="col-sm-10">
            <input type="text" name="dname" class="form-control"  placeholder="Enter Drug Name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Company Name:</label>
        <div class="col-sm-10">
            <input type="text" name="compname" class="form-control"  placeholder="Enter Company Name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Description:</label>
        <div class="col-sm-10">
            <input type="text" name="descrip" class="form-control"  placeholder="Description">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Batch No:</label>
        <div class="col-sm-10">
            <input type="text" name="batch_no" class="form-control"  placeholder="Enter Batch No">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Weight:</label>
        <div class="col-sm-10">
            <input type="text" name="weight" class="form-control"  placeholder="Weight">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Manufactured Date:</label>
        <div class="col-sm-10">
            <input type="date" name="manu_date" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Expire Date:</label>
        <div class="col-sm-10">
            <input type="date" name="exp_date" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Price:</label>
        <div class="col-sm-10">
            <input type="text" name="price" class="form-control"  placeholder="Rs:0.00">
        </div>
    </div>
    <input type="submit" class="btn">
</form>
</body>
</html>
<?php
include_once("foot.php");
?>