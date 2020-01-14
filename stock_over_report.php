<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 31-Dec-19
 * Time: 11:03 AM
 */
session_start();
if ($_SESSION["utype"]=="admin" or $_SESSION["utype"]=="storekeeper" or $_SESSION["utype"]=="manager"){

}
else
{
    header("location:page-login.php");
}
include_once("c_stock.php");
$s = new stock();
$arr = $s->get_over();
include_once("head.php");
?>

<link rel="stylesheet" type="text/css" href="DataTables/datatables.css">

<script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
<table id="tbl" class="table display" data-export-title="test">
    <caption>Stock details reports</caption>
    <thead>
    <tr><th>Item Name</th><th>Stock Balance</th></tr>
    </thead>
    <tbody>
    <?php
    foreach ($arr as $item)
    {
        echo "<tr><td>".$item->item_name->drug_name."</td><td>$item->st_bal</td></tr>";
    }
    ?>
    </tbody>
</table>
<script>
    jQuery(document).ready( function () {
        jQuery('#tbl').DataTable( {

            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
</script>
<?php
include_once("foot.php");
?>
