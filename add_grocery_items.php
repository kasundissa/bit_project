<?php
session_start();
if ($_SESSION["utype"]=="admin"){

}
else
{
    header("location:page-login.php");
}
include_once("c_grocery_items.php");  //import the grocery items class file
if (isset($_POST["iname"]))
{
    $g2 = new grocery_items(); //create a new object
    $g2->it_name = $_POST["iname"];  //match the variables with user interface
    $g2->brand_name = $_POST["br_name"];
    $g2->manufacturer_name = $_POST["manu_name"];
    $g2->marketer_name = $_POST["mktr_name"];
    $g2->description = $_POST["description"];
    $g2->price = $_POST["price"];

    if(isset($_POST["uid"])){
        $g2->update($_POST["uid"]);   //update existing grocery items details

    }else{

        $g2->register();  // insert a new grocery item
    }

}
$g=new grocery_items();  //create a new object
if(isset($_GET['ed'])){
    $g= $g->getbyid($_GET['ed']);  //call the getbyid function to get grocery item id
}
include_once("head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<form enctype="multipart/form-data" method="post" action="add_grocery_items.php" class="form-horizontal">
    <?php
    if(isset($_GET['ed'])){
        $id=$_GET['ed'];
        echo "<input name ='uid' type='hidden' value='$id'>";  //put grocery item id into the hidden text box
    }


    ?>

    <div class="form-group">
        <label class="control-label col-sm-3">Item Name:</label>
        <div class="col-sm-9">
            <input type="text" name="iname" class="form-control"  placeholder="e.g.:-Plaster" value="<?=$g->it_name?>" required> <!-- create a text box-->
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Item Logo:</label>
        <div class="col-sm-9">
            <input type="file" name="item_logo" class="form-control" required> <!--create a file box to insert the logo fo the item-->
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Brand Name:</label>
        <div class="col-sm-9">
            <input type="text" name="br_name" class="form-control"  placeholder="e.g.:-Dettol" value="<?=$g->brand_name?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Manufacturer Name:</label>
        <div class="col-sm-9">
            <input type="text" name="manu_name" class="form-control"  placeholder="e.g.:-Varun Medimpex Inc" value="<?=$g->manufacturer_name?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Marketer Name:</label>
        <div class="col-sm-9">
            <input type="text" name="mktr_name" class="form-control"  placeholder="e.g.:-Reckitt Benckiser (Lanka) Ltd" value="<?=$g->marketer_name?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Description:</label>
        <div class="col-sm-9">
            <input type="text" name="description" class="form-control"  placeholder="e.g.:-Antibacterial Plaster" value="<?=$g->description?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Price:</label>
        <div class="col-sm-9">
            <input type="text" name="price" class="form-control" pattern="[0-9]{*}[.][0-9]{2}" placeholder="e.g.:-Rs.0.00" value="<?=$g->price?>" required>
        </div>
    </div>
    <input type="submit" class="btn">
</form>
</body>
</html>
<?php
include_once("foot.php");
?>