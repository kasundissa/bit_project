<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 19-Dec-19
 * Time: 11:35 AM
 */
session_start();
if ($_SESSION["utype"]=="admin" or $_SESSION["utype"]=="storekeeper"){

}
else
{
    header("location:page-login.php");
}
$k=array();

if(isset($_POST["ref_no"])){
    include_once("c_grn.php");
    $p = new grn();
    $k = $p->get_by_id($_POST["ref_no"]);

}
include_once("head.php");
?>
<form action="grn_view.php" method="post">
<div class="form-group col-sm-6">
    <label class="control-label col-sm-3" >Ref No:</label>
    <div class="col-sm-9">
        <input type="text" name="ref_no" class="form-control numonly" required>
    </div>
</div>
<div class="form-group col-sm-2">
    <input type="submit" value="Search" class="btn">
</div>
</form>
<table class="table" border="2">
    <tr><th>Drug Name</th><th>Pack Size</th><th>No of Packs</th><th>Batch No</th><th>Weight</th><th>Manufacture Date</th>
        <th>Expire Date</th><th>Pack Price</th><th>Selling Price</th><th>Cost</th></tr>
    <?php
    foreach($k as $item){
        echo "<tr><td>".$item->drug_name->drug_name."</td><td>$item->pack_size</td><td>$item->no_of_packs</td><td>$item->batch_no</td>
              <td>$item->weight</td><td>$item->manufacture_date</td><td>$item->expire_date</td><td>$item->unit_price</td>
              <td>$item->selling_price</td><td>$item->cost</td></tr>";
    }
    ?>
</table>
<?php
include_once("foot.php");
?>
