<?php
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");

    include_once("c_customer.php");
    $c=new  customer();

    if (isset($_GET['dc']))
    {
        $c->remove($_GET['dc']);
    }

    $arr=$c->getall();

    include_once("head.php");
?>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
<table id="tbl" class="table display" data-export-title="test">
    <caption>Customers details reports</caption>
    <thead>
    <tr><th>Customer ID</th><th>Customer Name</th><th>NIC</th><th>Loyalty Card No</th><th>Points</th><th>Date of Birth</th><th>Address</th><th>Mobile</th><th>Email</th></tr>
    </thead>
    <tbody>
    <?php
        foreach ($arr as $item)
        {
            echo "<tr><td>$item->cus_ID</td><td>$item->cus_Name</td><td>$item->cus_NIC</td><td>$item->loyalty_no</td><td>$item->total_points</td><td>$item->dob</td><td>$item->cus_address</td><td>$item->cus_mobile</td><td>$item->cus_email</td></tr>";
        }
    ?>
    </tbody>
</table>
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
<?php
include_once("foot.php");
?>