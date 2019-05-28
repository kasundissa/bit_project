<?php
if (isset($_POST["dname"]))
{
    echo "Saving......";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
<form method="post" action="#">
    <label>Drug Name</label>
    <input type="text" name="dname"><br/>
    <label>Company Name</label>
    <input type="text" name="compname"><br/>
    <label>Description</label>
    <input type="text" name="descrip"><br/>
    <label>Batch No</label>
    <input type="text" name="batch_no"><br/>
    <label>Weight</label>
    <input type="text" name="weight"><br/>
    <label>Manufactured Date</label>
    <input type="date" name="manu_date"><br/>
    <label>Expire Date</label>
    <input type="date" name="exp_date"><br/>
    <label>Price</label>
    <input type="text" name="price"><br/>
    <input type="submit">
</form>
</body>
</html>