<?php
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");
include_once("c_offers.php");
if (isset($_POST["discount"])) {
    $o = new offers();

    $o->item_name=$_POST["category"];
    $o->discount=$_POST["discount"];
    $o->start_date=$_POST["st_date"];
    $o->end_date=$_POST["end_date"];

    $o->register();

}
include_once("c_grocery_items.php");
$g = new grocery_items();
$cat = $g->getall();
include_once("head.php");
?>

<h1>Offers</h1>
<form method="post" action="add_offers.php" class="form-horizontal">
    <div class="form-group">
     <label class="control-label col-sm-2">Item Name:</label>
        <div class="col-sm-10">
         <select name="category" class="form-control">
            <?php
            foreach ($cat as $item){
                echo "<option value='$item->it_id'>$item->it_name</option>";

            }
            ?>
        </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Discount:</label>
        <div class="col-sm-10">
            <input type="text" name="discount"  class="form-control numonly"  placeholder="e.g.:-100.00" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >Start Date:</label>
        <div class="col-sm-10">
            <input type="date" name="st_date" class="form-control"  required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" >End Date:</label>
        <div class="col-sm-10">
            <input type="date" name="end_date" class="form-control" required>
        </div>
    </div>
    <input type="submit" class="btn">
</form>

<?php
include_once("foot.php");
?>