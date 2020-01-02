<?php
session_start();
if ($_SESSION["utype"]=="admin"){

}
else
{
    header("location:page-login.php");
}
include_once("c_drugs_category.php"); //import the drugs category class file
if(isset($_POST["drg_category"])) {


    $p2 = new drugs_category();  //create a new object

    $p2->cat_name = $_POST["drg_category"];  //match the variables with user interface

    if (isset($_POST["uid"])) {
        $p2->update($_POST["uid"]);  //update existing details
    } else {
        $p2->register();  // insert a new drug category
    }
}
$p = new drugs_category(); // create a new object
if(isset($_GET['ed'])){
    $p= $p->getbyid($_GET['ed']); //call the getbyid function to get drug category id
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
        echo "<input name ='uid' type='hidden' value='$id'>";  //put drug category id into the hidden text box
    }


    ?>
    <div class="form-group">
        <label class="control-label col-sm-2">Drug Category:</label>
        <div class="col-sm-10">
            <input type="text" name="drg_category" class="form-control"  placeholder="e.g.:-Pain killers" value="<?=$p->cat_name?>" required>  <!-- create a text box-->
        </div>
    </div>
    <input type="submit" class="btn">  <!--submit button to submit the form-->
</form>
</body>
</html>
<?php
include_once("foot.php");
?>