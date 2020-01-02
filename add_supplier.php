<?php
session_start();
if ($_SESSION["utype"]=="admin"){

}
else
{
    header("location:page-login.php");
}
include_once ("c_supplier.php");
if (isset($_POST["supp_name"]))
{
    $s2=new supplier();
    $s2->supplier_name=$_POST["supp_name"];
    $s2->company_name=$_POST["comp_name"];
    $s2->contact_no=$_POST["contact_no"];

    if(isset($_POST["uid"])){
        $s2->update($_POST["uid"]);

    }else{

        $s2->register();
    }

}
$s = new supplier();
if(isset($_GET['ed'])){
    $s = $s->getbyid($_GET['ed']);
}
include_once("head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
<form method="post" action="add_supplier.php" class="form-horizontal">

    <?php
    if(isset($_GET['ed'])){
        $id=$_GET['ed'];
        echo "<input name ='uid' type='hidden' value='$id'>";
    }

    ?>
   <div class="form-group">
        <label class="control-label col-sm-2">Supplier Name:</label>
        <div class="col-sm-10">
            <input type="text" name="supp_name" class="form-control"  placeholder="e.g.:-John" value="<?=$s->supplier_name?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Company Name:</label>
        <div class="col-sm-10">
            <input type="text" name="comp_name" class="form-control"  placeholder="e.g.:-ABC" value="<?=$s->company_name?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Contact No:</label>
        <div class="col-sm-10">
            <input type="text" name="contact_no" class="form-control"  pattern="[0][0-9]{9}"  placeholder="e.g.:-0777712345" value="<?=$s->contact_no?>" required>
        </div>
    </div>
    <input type="submit" class="btn">
</form>
</body>
</html>
<?php
include_once("foot.php");
?>