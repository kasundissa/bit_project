<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 03-Jan-20
 * Time: 9:32 AM
 */
include_once("c_pos.php");
$p = new pos();
$y = $p->demand_items();

include_once ("head.php");
?>
<table class="table">
     <h3>Latest Total Sales</h3>
    <tr><th>Item Name</th></tr>
    <?php
    foreach($y as $item){
        echo "<tr><td>".$item->i_name->drug_name."</td></tr>";

    }
    ?>
</table>
<?php
include_once("foot.php");
?>