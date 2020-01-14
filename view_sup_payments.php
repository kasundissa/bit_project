<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 02-Jan-20
 * Time: 2:00 PM
 */
session_start();
if ($_SESSION["utype"]=="admin" or $_SESSION["utype"]=="manager"){

}
else
{
    header("location:page-login.php");
}


include_once("c_sup_payments.php");
    $s=new sup_payments();

    $arr=$s->getall();
include_once("head.php");
?>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
    <table id="tbl" class="table display" data-export-title="test">
        <caption>Payments for Suppliers</caption>
        <thead>
        <tr><th>Payment ID</th><th>Reference No</th><th>Amount</th><th>Date/Time</th><th>Payment Method</th><th>Cheque No</th><th>Cheque Date</th><th>Supplier</th></tr>
        </thead>
        <tbody>
        <?php
        foreach($arr as $item){
            echo "<tr><td>$item->pay_id</td><td>$item->ref_no</td><td>$item->amount</td><td>$item->date</td><td>$item->p_method</td><td>$item->cheque_no</td><td>$item->cheque_date</td><td>".$item->sup_id->company_name."</td></tr>";

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