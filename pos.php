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
include_once("c_pos.php");
if (isset($_POST["total_amount"]))
{
    $ps = new pos();

    $ps->tot_amount = $_POST["total_amount"];
    $ps->tot_discount = $_POST["total_discount"];
    $ps->sub_tot = $_POST["sub_total"];
    $ps->net_tot = $_POST["net_total"];

    $ps->i_name=$_POST["in"];
    $ps->price=$_POST["prc"];
    $ps->qty=$_POST["qnty"];
    $ps->amt=$_POST["amt"];
    $ps->discount=$_POST["t_diss"];

    $ps->points = $_POST["points"];
    $ps->cus_id = $_POST["cid"];



       $xxx= $ps->register();
        header("location:print_bill.php?sid=$xxx");
}
include_once("c_drugs.php");
$dr= new drugs();
$drg_cat=$dr->getall();
if(isset($_POST["pts"])){
 $p = new pos();
   // if ($_POST["pts"]>$_POST["sub_total"]) {
      //  $ps->points = $_POST["balance"];
   // }
 $r = $p->reset_points($_POST["cid"],$_POST["pts"],$xxx);
}
include_once("head.php");
?>
<body>
<form method="post" action="pos.php" class="form-horizontal">
    <div class="form-group col-sm-12">
        <div class="form-group col-sm-6">
        </div>
     <div class="form-group col-sm-6">
         <label class="control-label col-sm-6" >Loyalty Code:</label>
         <div class="col-sm-6">
             <input type="text" name="loyalty_code" id="loyalty_no" class="form-control numonly" >
         </div>
     </div>
<input type="hidden" name="cid" id="cid">
        <div class="form-group col-sm-12">
            <h3>Product Details</h3>
        </div>
        <div class="form-group col-sm-4">
            <label class="control-label col-sm-6" >Item Name:</label>
            <div class="col-sm-6">
                <select name="drg_category" class="form-control" id="drg_name">
                    <?php
                    foreach ($drg_cat as $drg_item){
                        echo "<option value='$drg_item->drug_id'>$drg_item->drug_name</option>";
                    }

                    ?>
                </select>
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Price:</label>
            <div class="col-sm-6">
                <input type="text" name="price" id="price" class="form-control">
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Availability:</label>
            <div class="col-sm-6">
                Available
            </div>

        </div>
        <div class="form-group col-sm-4">

            <label class="control-label col-sm-6" >Discount (%):</label>
            <div class="col-sm-6">
                <input type="text" name="discount" id="discount" value="0" class="form-control numonly">
            </div>
        </div>
        <div class="form-group col-sm-4">
            <label class="control-label col-sm-6" >Quantity:</label>
            <div class="col-sm-6">
                <input type="text" name="qty" id="qty" class="form-control numonly">
            </div>
        <br/>
            <br/>
                <input type="button" class="btn" onclick="add()" value="ADD">
            </div>
        </div>
        <table class="table" border="2">
            <tr><th>Item Name</th><th>Price</th><th>Quantity</th><th>Amount</th>
                <th>Discount</th><th>Remove</th></tr>

            <tbody id="table1">

            </tbody>
        </table>
        <div class="form-group col-sm-6">
            <h4>Payments:</h4>
            <br/>
            <label class="control-label col-sm-6" >Payment Method:</label>
            <div class="col-sm-6">
                <select name="category" class="form-control">
                    <option>Cash</option>
                    <option>Card</option>
                </select>
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Cash:</label>
            <div class="col-sm-6">
                <input type="text" name="cash" id="cash" class="form-control numonly">
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Points:</label>
            <div class="col-sm-6">
                <input type="text" name="pts" id="pts" class="form-control">
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Balance:</label>
            <div class="col-sm-6">
                <input type="text" name="balance" id="balance" class="form-control">
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label col-sm-6" >Total Amount:</label>
            <div class="col-sm-6">
                <input type="text" readonly="readonly" id="total_amt" name="total_amount" class="form-control">
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Total Discount:</label>
            <div class="col-sm-6">
                <input type="text" readonly="readonly" id="total_diss" name="total_discount" class="form-control">
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Sub Total:</label>
            <div class="col-sm-6">
                <input type="text" readonly="readonly" id="sb_tot" name="sub_total" class="form-control">
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Net Total:</label>
            <div class="col-sm-6">
                <input type="text" readonly="readonly" id="nt_total" name="net_total" class="form-control">
            </div>
        </div>


     <!--   <input type="button" class="btn" value="Save and Print">-->
        <input type="submit" class="btn" value="Save">
        <a href="pos.php"> <input type="button" class="btn" value="Cancel"></a>
        <input type="button" class="btn" id="loadpoint" value="Load Points">
    <input type="hidden" id="points" name="points">
</form>
</body>
<?php
include_once("foot.php");
?>
<script>

    function add() {
        var d_name = jQuery("#drg_name").val();
        var d_name2 = jQuery("#drg_name option:selected").text();
        var quty = jQuery("#qty").val();
        var price = jQuery("#price").val();
        var amount = (price*quty).toFixed(2);
        var diss = jQuery("#discount").val();
        var tot_diss = ((amount*diss)/100).toFixed(2);


        if (quty.length<1)
            return;
        if (price.length<1)
            return;
        if (diss.length<1)
            return;

        var table_content = " <tr><td><input type='text' id='dn2' value='"+d_name2+"'><input type='hidden' readonly='readonly' id='in'  value='"+d_name+"' name='in[]' ></td><td><input size='6' type='text' id='prc' readonly='readonly' value='"+price+"' name='prc[]' ></td><td><input size='6' type='text' id='qnty' readonly='readonly' value='"+quty+"' name='qnty[]' ></td><td><input size='6' type='text' class='amt' readonly='readonly' value='"+amount+"' name='amt[]' ></td><td><input size='6' type='text' class='t_diss' readonly='readonly' value='"+tot_diss+"' name='t_diss[]' ></td><td><input type='button' class='btn' onclick='remove(this)' value='Remove'></td></tr>";
        jQuery("#table1").append(table_content);
        jQuery("#drg_name").val("");
        jQuery("#qty").val("");
        jQuery("#price").val("");
        jQuery("#discount").val("");

          var total = 0;
        jQuery('.amt').each(function (index,element) {
            total = total + parseFloat(jQuery(element).val());
        });
        jQuery("#total_amt").val(total);

        var total_discount = 0;
        jQuery('.t_diss').each(function (index,element) {
            total_discount = total_discount + parseFloat(jQuery(element).val());
        });
        jQuery("#total_diss").val(total_discount);


        var t_amount = jQuery("#total_amt").val();
        var t_discount = jQuery("#total_diss").val();
        var sub_total = t_amount-t_discount;
        jQuery("#sb_tot").val((sub_total).toFixed(2));
        var net_tt = (sub_total).toFixed(0);
        jQuery("#nt_total").val(net_tt);
        var points = (sub_total*5)/10000;
        jQuery("#points").val(points);

    }
    function remove(aa) {
        jQuery(aa).parent().parent().remove();

        var total = 0;
        jQuery('.amt').each(function (index,element) {
            total = total + parseFloat(jQuery(element).val());
        });
        jQuery("#total_amt").val(total);

        var total_discount = 0;
        jQuery('.t_diss').each(function (index,element) {
            total_discount = total_discount + parseFloat(jQuery(element).val());
        });
        jQuery("#total_diss").val(total_discount);


        var t_amount = jQuery("#total_amt").val();
        var t_discount = jQuery("#total_diss").val();
        var sub_total = t_amount-t_discount;
        jQuery("#sb_tot").val((sub_total).toFixed(2));
        var net_tt = (sub_total).toFixed(0);
        jQuery("#nt_total").val(net_tt);
        var points = (sub_total*5)/10000;
        jQuery("#points").val(points);

    }
jQuery("#loyalty_no").blur(function () {
    var d =jQuery("#loyalty_no").val();
    jQuery.get("ajax.php",{LCN:d},function(data){
       jQuery("#cid").val(data);
    });
});
jQuery("#loadpoint").click(function () {

    var e = jQuery("#cid").val();
    jQuery.get("ajax2.php", {PS: e},function(data){
        jQuery("#pts").val(data);
    });
});
jQuery("#cash").change(function () {
    var cash = jQuery("#cash").val();
    var points = jQuery("#pts").val();
    var net_ttl = jQuery("#nt_total").val();

    var p_amt = net_ttl-points;
    var bal =cash-p_amt;
    jQuery("#balance").val((bal).toFixed(2));
});

</script>
