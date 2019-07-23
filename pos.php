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
include_once("head.php");
?>
<body>
<form method="post" action="" class="form-horizontal">
    <div class="form-group col-sm-12">
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-6">Date:</label>
        <div class="col-sm-6">
            <input type="text" name="date" value="<?php echo date('Y-m-d')?>" readonly="readonly" class="form-control"  required>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-6">Time:</label>
        <div class="col-sm-6">
            <input type="text" name="time" value="<?php echo '14.30.00' ?>" readonly="readonly" class="form-control"  required>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-6">Operator:</label>
        <div class="col-sm-6">
           Kasun
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
                <input type="text" name="item_name" id="i_name" class="form-control" required>
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Discount (%):</label>
            <div class="col-sm-6">
                <input type="text" name="discount" id="discount" class="form-control" required>
            </div>
        </div>
        <div class="form-group col-sm-4">
            <label class="control-label col-sm-6" >Quantity:</label>
            <div class="col-sm-6">
                <input type="text" name="qty" id="qty" class="form-control" required>
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
            <label class="control-label col-sm-6" >Balance:</label>
            <div class="col-sm-6">
                <input type="text" name="balance" class="form-control">
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label col-sm-6" >Total Amount:</label>
            <div class="col-sm-6">
                <input type="text" name="total_amount" class="form-control">
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Total Discount:</label>
            <div class="col-sm-6">
                <input type="text" name="total_discount" class="form-control">
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Sub Total:</label>
            <div class="col-sm-6">
                <input type="text" name="sub_total" class="form-control">
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Net Total:</label>
            <div class="col-sm-6">
                <input type="text" name="net_total" class="form-control">
            </div>
        </div>
        <input type="button" class="btn" value="Save and Print">
        <input type="button" class="btn" value="Save">
        <input type="button" class="btn" value="Cancel">
</form>
</body>
<?php
include_once("foot.php");
?>
<script>
    function add() {
        var it_name = jQuery("#i_name").val();
        var quty = jQuery("#qty").val();
        var price = jQuery("#price").val();
        var amount = price*quty;
        var diss = jQuery("#discount").val();
        var tot_diss = [(amount*diss)/100];

        var table_content = " <tr><td></td><td><input type='text' id='in' readonly='readonly' value='"+it_name+"' name='in' ></td><td><input type='text' id='prc' readonly='readonly' value='"+price+"' name='prc' ></td><td><input type='text' id='qnty' readonly='readonly' value='"+quty+"' name='qnty' ></td><td><input type='text' id='amt' readonly='readonly' value='"+amount+"' name='amt' ></td><td><input type='text' id='t_diss' readonly='readonly' value='"+tot_diss+"' name='t_diss' ></td><td><input type='button' class='btn' onclick='remove(this)' value='Remove'></td></tr>";
        jQuery("#table1").append(table_content);
        jQuery("#i_name").val("");
        jQuery("#qty").val("");
        jQuery("#price").val("");
        jQuery("#discount").val("");

    }
    function remove(aa) {
        jQuery(aa).parent().parent().remove();
    }
</script>
