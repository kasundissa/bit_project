<?php
session_start();
if ($_SESSION["utype"]=="admin"){

}
else
{
    header("location:page-login.php");
}
include_once ("c_supplier.php");   //import the supplier class file
if (isset($_POST["supp_name"]))
{
    $s2=new supplier(); //create a new object
    $s2->supplier_name=$_POST["supp_name"]; //match the variables with user interface
    $s2->company_name=$_POST["comp_name"];
    $s2->contact_no=$_POST["contact_no"];

    if(isset($_POST["uid"])){
        $s2->update($_POST["uid"]); //to call the update function

    }else{

        $s2->register(); //to call the register function
    }

}
$s = new supplier(); //to create a object
if(isset($_GET['ed'])){
    $s = $s->getbyid($_GET['ed']); // call the getbyid function to get supplier id
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
        echo "<input name ='uid' type='hidden' value='$id'>"; //put supplier id into the hidden text box
    }

    ?>
   <div class="form-group">
        <label class="control-label col-sm-2">Supplier Name:</label>
        <div class="col-sm-10">
            <input type="text" name="supp_name" class="form-control"  placeholder="e.g.:-John" value="<?=$s->supplier_name?>" required> <!-- create a text box-->
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
    <input type="submit" class="btn"> <!--submit button to submit the form-->
</form>
</body>
</html>
<?php
include_once("foot.php");
?>