<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 04-Nov-19
 * Time: 12:16 PM
 */

include_once("c_offers.php");
$o = new offers();
$arr = $o->getall();

include_once("head.php");
?>
<table class="table">
    <tr><th>Item Name</th><th>Discount</th><th>Start Date</th><th>End Date</th></tr>
    <?php
    foreach ($arr as $item)
    {
        echo "<tr><td>".$item->item_name->it_name."</td><td>$item->discount</td><td>$item->start_date</td><td>$item->end_date</td></tr>";
    }
    ?>
</table>
<?php
include_once("foot.php");
?>