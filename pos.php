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
        15/07/2019
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-6">Time:</label>
        <div class="col-sm-6">
            14.38
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
        <hr>
        <div class="form-group col-sm-12">
            <h3>Product Details</h3>
        </div>
        <div class="form-group col-sm-4">
            <label class="control-label col-sm-6" >Item Code:</label>
            <div class="col-sm-6">
                <input type="text" name="item_code" class="form-control" required>
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Quantity:</label>
            <div class="col-sm-6">
                <input type="text" name="qty" class="form-control" required>
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
                <input type="text" name="item_name" class="form-control" required>
            </div>
            <br/>
            <br/>
            <label class="control-label col-sm-6" >Discount:</label>
            <div class="col-sm-6">
                <input type="text" name="discount" class="form-control" required>
            </div>
        </div>
        <div class="form-group col-sm-4">
            <label class="control-label col-sm-6" >Price:</label>
            <div class="col-sm-6">
                <input type="text" name="price" class="form-control">
            </div>
        <br/>
            <br/>
            <label class="control-label col-sm-6" >Amount:</label>
            <div class="col-sm-6">
                Rs:0.00 <br/> <br/>
                <input type="button" class="btn" value="ADD">
            </div>
        </div>
        <table class="table" border="2">
            <tr><th>Item No</th><th>Item Name</th><th>Price</th><th>Discount</th><th>Quantity</th>
                <th>Amount</th><th>Remove</th><th>Edit</th></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td>
                <td><input type="button" class="btn" value="Remove"></td>
                <td><input type="button" class="btn" value="Edit"></td></tr>
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
        <input type="button" class="btn" value="Save">
        <input type="button" class="btn" value="Print Bill">
</form>
</body>
<?php
include_once("foot.php");
?>