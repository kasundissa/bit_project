<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 15-Jul-19
 * Time: 5:09 PM
 */

session_start();
if ($_SESSION["utype"]=="admin" or $_SESSION["utype"]=="cashier"){

}
else
{
    header("location:page-login.php");
}
$k=array();

if(isset($_POST["bill_no"])){
include_once("c_pos.php");
 $p = new pos();
 $k = $p->get_by_id_for_return($_POST["bill_no"]);

}

include_once("c_items_return.php");

    if (isset($_POST["sp_id"])) {

        $r = new items_return();


        $r->pos_id = $_POST["bl_no"];

        $r->it_name = $_POST["sp_id"];
        $r->price = $_POST["price"];
        $r->qty = $_POST["qty"];
        $r->amount = $_POST["amount"];

        $r->points = $_POST["return_amt"];
        $r->cus_id = $_POST["cid"];

        $r->register();

    }


include_once("head.php");
?>
<body>
<form method="post" action="return.php" class="form-horizontal">

        <div class="form-group col-sm-6">
            <label class="control-label col-sm-3" >Bill No:</label>
            <div class="col-sm-9">
                <input type="text" name="bill_no" class="form-control numonly" required>
            </div>
        </div>

    <div class="form-group col-sm-2">
        <input type="submit" value="Search" class="btn">
    </div>
</form>
<form method="post" action="return.php" class="form-horizontal">
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-6" >Loyalty Card No:</label>
        <div class="col-sm-6">
            <input type="text"  name="l_no" id="loyalty_no" class="form-control numonly">
        </div>
    </div>

    <table class="table" border="2">
            <tr><th>Item Name</th><th>Price</th><th>Quantity</th><th>Amount</th><th>Discount</th><th>Return</th></tr>
            <?php
            if (isset($_POST["bill_no"])){
            $y= $_POST["bill_no"];
            echo "<input type='hidden' name='bl_no' value='$y'>";
            }
            foreach($k as $item){
                if ($item->discount>0)
                $cb="disabled"; //to disable the check box discount given items
                else
                    $cb="";
                echo "<tr><td><input type='hidden' value='$item->sold_product_id' name='sp_id[]'><input type='text' value='".$item->i_name->drug_name."'></td><td><input type='text' value='$item->price' name='price[]'></td><td><input type='text' value='$item->qty' name='qty[]'></td><td><input type='text' class='abox' value='$item->amt' id='amt' name='amount[]'></td><td><input type='text' value='$item->discount' id='diss' name='discount[]'></td><td><input name='chk[$item->sold_product_id]' type='checkbox' class='cbox' $cb></td></tr>";

            }
            ?>


            <tbody id="table1">

            </tbody>
        </table>
    <div class="form-group col-sm-6">
    </div>
        <div class="form-group col-sm-6">
            <label class="control-label col-sm-6" >Returnable Amount:</label>
            <div class="col-sm-6">
                <input type="text" id="return_amt" name="return_amt" class="form-control">
            </div>
        </div>
    <div class="form-group col-sm-6">
    </div>
    <div class="form-group col-sm-6">
        <input type="submit" class="btn" value="Complete Return">
    </div>
    <input type="hidden" id="cid" name="cid">
</form>
</body>
<?php
include_once("foot.php");
?>
<script>
   var tot=0;
    jQuery(".cbox").change(function () { //to change returnable amount when you tick the check box
        if (jQuery(this).is(':checked')){
            var v = jQuery(this).parent().parent().find(".abox").val();
            tot += parseFloat(v);
            jQuery("#return_amt").val(tot);
        }
        else{

            var v = jQuery(this).parent().parent().find(".abox").val();
            tot -= parseFloat(v);
            jQuery("#return_amt").val(tot);
        }

    })
   jQuery("#loyalty_no").blur(function () { //to get customer id by entering the loyalty card no
       var d =jQuery("#loyalty_no").val();
       jQuery.get("ajax.php",{LCN:d},function(data){
           jQuery("#cid").val(data);
       });
   });
</script>

