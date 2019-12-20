<?php
session_start();
if(!isset($_SESSION["uid"]))//if user didn't log in system will redirect to login page
    header("location:page-login.php");
include_once("c_drugs.php");//to include the drugs class
if (isset($_POST["dname"]))
{


    $d2 = new drugs();//to create a object

    $d2->drug_name = $_POST["dname"];  //match the variables with user interface
    $d2->brand_name = $_POST["br_name"];
    $d2->manufacturer_name = $_POST["manu_name"];
    $d2->marketer_name = $_POST["marktr_name"];
    $d2->description = $_POST["description"];
    $d2->cat_id =$_POST["category"];

    if(isset($_POST["uid"])){
        $d2->update($_POST["uid"]); //to call the update function

    }else{

        $d2->register();//to call the register function
    }

}
$d = new drugs();  //to create a object
if(isset($_GET['ed'])){
    $d= $d->getbyid($_GET['ed']);  //call the getbyid function to get drug id
}
include_once("c_drugs_category.php");   //import the drugs category class file
$p = new drugs_category();
$cat=$p->getall();


include_once("head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
<form method="post" action="add_drugs.php" class="form-horizontal">
    <?php
    if(isset($_GET['ed'])){
        $id=$_GET['ed'];
        echo "<input name ='uid' type='hidden' value='$id'>";  //put drug id into the hidden text box
    }


    ?>
    <div class="form-group">
        <label class="control-label col-sm-2">Drug Category:</label>
        <div class="col-sm-10">
            <select name="category" class="form-control"><!-- to create a dropdown menu -->
                <?php
                foreach ($cat as $item){
                    echo "<option value='$item->cat_id'>$item->cat_name</option>";
                }
                ?>



            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2">Drug Name:</label>
        <div class="col-sm-10">
            <input type="text" name="dname" class="form-control"  placeholder="e.g.:-Paracetamol" value="<?=$d->drug_name?>" required> <!-- create a text box-->
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Brand Name:</label>
        <div class="col-sm-10">
            <input type="text" name="br_name" class="form-control"  placeholder="e.g.:-Penadol" value="<?=$d->brand_name?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Manufacturer:</label>
        <div class="col-sm-10">
            <input type="text" name="manu_name" class="form-control"  placeholder="e.g.:-Cadila Healthcare Limited" value="<?=$d->manufacturer_name?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Marketer Name:</label>
        <div class="col-sm-10">
            <input type="text" name="marktr_name" class="form-control"  placeholder="e.g.:-CIC Holdings PLC" value="<?=$d->marketer_name?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Description:</label>
        <div class="col-sm-10">
            <input type="text" name="description" class="form-control"  placeholder="Enter Description" value="<?=$d->description?>">
        </div>
    </div>
    <input type="submit" class="btn">   <!--submit button to submit the form-->
</form>
</body>
</html>
<?php
include_once("foot.php");
?>