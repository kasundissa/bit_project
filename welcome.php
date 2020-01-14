<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 10-Jul-19
 * Time: 10:41 AM
 */
session_start();
if ($_SESSION["utype"]=="admin" or $_SESSION["utype"]=="cashier" or $_SESSION["utype"]=="storekeeper" or $_SESSION["utype"]=="manager"){

}
else
{
    header("location:page-login.php");
}
include_once ("c_pos.php");
 $p = new pos();
 $arr = $p->today_sales_amount();

 $x = $p->total_used_points_today();

 $y = $p->latest_sales();

 $w = $p->today_return_amount();

include_once("head.php");
?>
    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Sold Amount</div>
                        <div class="stat-digit"><?php echo $arr[0]->today_tot_amt;?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Return Amount</div>
                        <div class="stat-digit"><?php echo $w[0]->today_returned_amount;?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Points Used</div>
                        <div class="stat-digit"><?php echo $x[0]->used_points;?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">

<table class="table">
     <h3>Latest Total Sales</h3>
    <tr><th>Item Name</th><th>Quantity</th></tr>
    <?php
    foreach($y as $item){
        echo "<tr><td>".$item->today_items_name->drug_name."</td><td>$item->today_items_qty</td></tr>";

    }
    ?>
</table>
    </div>
<?php
include_once("foot.php");
?>