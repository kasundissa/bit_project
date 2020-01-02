<?php
session_start();
if ($_SESSION["utype"]=="admin" or $_SESSION["utype"]=="manager"){

}
else
{
    header("location:page-login.php");
}
include_once("c_drugs.php");
$d = new  drugs();
$cat = $d->getall();

include_once("c_grn.php");
$g = new grn();
$arr = $g->getall();
include_once("head.php");
?>

<title>GRN Report</title>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
<script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
<h1>GRN</h1>
<form method="post" action="grn_report.php">
    <div class="form-group">
        <label class="control-label col-sm-2">Start Date:</label>
        <div class="col-sm-10">
            <input type="date" name="st_date" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">End Date:</label>
        <div class="col-sm-10">
            <input type="date" name="end_date" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Product Category:</label>
        <div class="col-sm-10">
            <select name="category" class="form-control">
                <?php

                foreach ($cat as $item) {
                    echo "<option value='$item->drug_id'>$item->drug_name</option>";

                }

                ?>

            </select>
        </div>
    </div>
    <input type="submit" value="Search" class="btn">
    <table id="tbl" class="table display" data-export-title="test">
        <caption>GRN Report</caption>
        <thead>
        <tr><th>Drug Name</th><th>Pack Size</th><th>No of Packs</th><th>Batch No</th><th>Weight</th><th>Manufacture Date</th><th>Expire Date</th><th>Pack Price</th><th>Selling Price</th><th>Cost</th></tr>
        </thead>
        <tbody>
        <?php
        if (isset($_POST["st_date"])) {
            foreach ($arr as $item) {
                echo "<tr><td>" . $item->drug_name->drug_name. "</td><td>$item->pack_size</td><td>$item->no_of_packs</td><td>$item->batch_no</td><td>$item->weight</td><td>$item->manufacture_date</td><td>$item->expire_date</td><td>$item->unit_price</td><td>$item->selling_price</td><td>$item->cost</td></tr>";
            }
        }
        ?>
        </tbody>
    </table>
</form>

<?php
include_once("foot.php");
?>
<script>
    jQuery(document).ready( function () {
        jQuery('#tbl').DataTable( {

            dom: 'Bfrtip',
            title:'GRN report',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
</script>

