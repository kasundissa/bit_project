<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 15-Jul-19
 * Time: 5:09 PM
 */
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");
include_once("c_pos.php");
if (isset($_POST["bill_no"]))
{
    $ps = new pos();

    $ps->bill_no = $_POST["bill_no"];
    $ps->tot_amount = $_POST["total_amount"];
    $ps->tot_discount = $_POST["total_discount"];
    $ps->sub_tot = $_POST["sub_total"];


    $ps->i_name=$_POST["in"];
    $ps->price=$_POST["prc"];
    $ps->qty=$_POST["qnty"];
    $ps->amt=$_POST["amt"];
    $ps->discount=$_POST["t_diss"];


        $ps->register();

}

include_once("head.php");
?>
<body>
<form method="post" action="" class="form-horizontal">
    <div class="form-group col-sm-12">
        <div class="form-group col-sm-6">
            <label class="control-label col-sm-3" >Bill No:</label>
            <div class="col-sm-9">
                <input type="text" name="bill_no" class="form-control" placeholder="e.g.:-0123456789"  required>
            </div>
        </div>
     <div class="form-group col-sm-6">
         <label class="control-label col-sm-6" >Loyalty Code:</label>
         <div class="col-sm-6">
             <input type="text" name="loyalty_code" class="form-control" >
         </div>
     </div>

        <div class="form-group col-sm-12">
            <h3>Product Details</h3>
        </div>
        <div class="form-group col-sm-4">
            <label class="control-label col-sm-6" >Item Type:</label>
            <div class="col-sm-6">
                <select name="category" class="form-control">
                    <option>Drugs</option>
                    <option>Grocery Items</option>
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
            <label class="control-label col-sm-6" >Item Name:</label>
            <div class="col-sm-6">
                <input type="text" name="item_name" id="i_name" class="form-control">
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Discount (%):</label>
            <div class="col-sm-6">
                <input type="text" name="discount" id="discount" class="form-control">
            </div>
        </div>
        <div class="form-group col-sm-4">
            <label class="control-label col-sm-6" >Quantity:</label>
            <div class="col-sm-6">
                <input type="text" name="qty" id="qty" class="form-control">
            </div>
        <br/>
            <br/>
                <input type="button" class="btn" onclick="add()" value="ADD">
            </div>
        </div>
        <table class="table" border="2">
            <tr><th>Item No</th><th>Item Name</th><th>Price</th><th>Quantity</th><th>Amount</th>
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
                <input type="text" name="cash" class="form-control">
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Points:</label>
            <div class="col-sm-6">
                <input type="text" name="points" class="form-control">
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Balance:</label>
            <div class="col-sm-6">
                <input type="text" name="balance" class="form-control">
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

        <input type="button" class="btn" value="Save and Print">
        <input type="submit" class="btn" value="Save">
        <a href="pos.php"> <input type="button" class="btn" value="Cancel"></a>
        <input type="button" class="btn" value="Load Points">
</form>
</body>
<?php
include_once("foot.php");
?>
<script>
    var count = 0;
    function add() {
        var it_name = jQuery("#i_name").val();
        var quty = jQuery("#qty").val();
        var price = jQuery("#price").val();
        var amount = (price*quty).toFixed(2);
        var diss = jQuery("#discount").val();
        var tot_diss = ((amount*diss)/100).toFixed(2);

        if (it_name.length<1)
            return;
        if (quty.length<1)
            return;
        if (price.length<1)
            return;
        if (diss.length<1)
            return;

        var table_content = " <tr><td>"+(count+1) +"</td><td><input type='text' id='in' readonly='readonly' value='"+it_name+"' name='in[]' ></td><td><input size='6' type='text' id='prc' readonly='readonly' value='"+price+"' name='prc[]' ></td><td><input size='6' type='text' id='qnty' readonly='readonly' value='"+quty+"' name='qnty[]' ></td><td><input size='6' type='text' class='amt' readonly='readonly' value='"+amount+"' name='amt[]' ></td><td><input size='6' type='text' class='t_diss' readonly='readonly' value='"+tot_diss+"' name='t_diss[]' ></td><td><input type='button' class='btn' onclick='remove(this)' value='Remove'></td></tr>";
        jQuery("#table1").append(table_content);
        jQuery("#i_name").val("");
        jQuery("#qty").val("");
        jQuery("#price").val("");
        jQuery("#discount").val("");

          var total = 0;
        jQuery('.amt').each(function (index,element) {
            total = total + parseFloat(jQuery(element).val());
        });
        jQuery("#total_amt").val(total)

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

        count++;
    }
    function remove(aa) {
        jQuery(aa).parent().parent().remove();

        var total = 0;
        jQuery('.amt').each(function (index,element) {
            total = total + parseFloat(jQuery(element).val());
        });
        jQuery("#total_amt").val(total)

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


    }



</script>
