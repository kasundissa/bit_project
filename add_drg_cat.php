<?php
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");
include_once("c_drugs_category.php");
if(isset($_POST["drg_category"])) {


    $p2 = new drugs_category();

    $p2->cat_name = $_POST["drg_category"];

    if (isset($_POST["uid"])) {
        $p2->update($_POST["uid"]);
    } else {
        $p2->register();
    }
}
$p = new drugs_category();
if(isset($_GET['ed'])){
    $p= $p->getbyid($_GET['ed']);
}
include_once("head.php");
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
<form method="post" action="add_drg_cat.php" class="form-horizontal">

    <?php
    if(isset($_GET['ed'])){
        $id=$_GET['ed'];
        echo "<input name ='uid' type='hidden' value='$id'>";
    }


    ?>
    <div class="form-group">
        <label class="control-label col-sm-2">Drug Category:</label>
        <div class="col-sm-10">
            <input type="text" name="drg_category" class="form-control"  placeholder="e.g.:-Pain killers" value="<?=$p->cat_name?>" required>
        </div>
    </div>
    <input type="submit" class="btn">
</form>
</body>
</html>
<?php
include_once("foot.php");
?>