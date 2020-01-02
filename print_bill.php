<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 21-Dec-19
 * Time: 11:40 AM
 */
include_once("c_pos.php");
$p = new pos();
$n = $p->get_all_for_print($_GET["sid"]);
include_once("head.php");
?>
<table class="table">
    <?php
   echo" <tr><td><b>Bill No</b></td><td>".$n[0]->pos_id."</td><td><b>Date/Time</b></td><td>".$n[0]->datetime."</td></tr>
    <tr><td><b>Item Name</b></td><td><b>Price</b></td><td><b>Quantity</b></td><td><b>Amount</b></td><td><b>Discount</b></td></tr>";
    foreach ($n as $item){
   echo

    "<tr><td>".$item->i_name->drug_name."</td><td>$item->price</td><td>$item->qty</td><td>$item->amt</td><td>$item->discount</td></tr>";
   }
   echo
    "<tr><td><b>Total Amount</b></td><td>".$n[0]->tot_amount."</td></tr>
    <tr><td><b>Total Discount</b></td><td>".$n[0]->tot_discount."</td></tr>
    <tr><td><b>Sub Total</b></td><td>".$n[0]->sub_tot."</td></tr>
    <tr><td><b>Net Total</b></td><td>".$n[0]->net_tot."</td></tr>";

    ?>
</table>
<?php
include_once("foot.php");
?>

