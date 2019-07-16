<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 10-Jul-19
 * Time: 11:41 AM
 */
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");
include_once("head.php");
?>
<body>
<form method="post" action="" class="form-horizontal">
    <div class="form-group col-sm-12">
    <h3>GRN Details</h3>
    </div>
<div class="form-group col-sm-6">
        <label class="control-label col-sm-3">Date:</label>
        <div class="col-sm-9">
            <input type="date" name="date" class="form-control"  required>
        </div>
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label col-sm-3" >Ref No:</label>
        <div class="col-sm-9">
            <input type="text" name="ref_no" class="form-control" placeholder="e.g.:-00001234"  required>
        </div>
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label col-sm-3" >Supplier:</label>
        <div class="col-sm-9">
            <input type="text" name="supp_name" class="form-control" required>
        </div>
    </div>
    <div class="form-group col-sm-6">
    </div>
    <br/>
    <div class="form-group col-sm-12">
    <h3>Product Details</h3>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Drug Name:</label>
        <div class="col-sm-7">
            <input type="text" name="drug_name" class="form-control" required>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Pack Size:</label>
        <div class="col-sm-7">
            <input type="text" name="pak_size" class="form-control" required>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >No Of Packs:</label>
        <div class="col-sm-7">
            <input type="text" name="no_of_pak" class="form-control" required>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Unit Price:</label>
        <div class="col-sm-7">
            <input type="text" name="unit_price" class="form-control" placeholder="Rs.0.00" required>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Quantity:</label>
        <div class="col-sm-7">
            <input type="text" name="qty" class="form-control" required>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Selling Price:</label>
        <div class="col-sm-7">
            <input type="text" name="sell_price" class="form-control" placeholder="Rs.0.00" required><br/>
            <input type="button" value="ADD PRODUCT" class="btn">
        </div>
    </div>
    <table class="table" border="2">

        <tr><th>Drug Name</th><th>Pack Size</th><th>No of Packs</th><th>Unit Price</th><th>Quantity</th>
            <th>Selling Price</th><th>Remove</th><th>Edit</th></tr>
        <tr><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="button" class="btn" value="Remove"></td><td><input type="button" class="btn" value="Edit"></td></tr>
    </table>
        <div class="form-group col-sm-12">
            <div class="form-group col-sm-6">
            </div>

                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4">Total:</label>
                    <div class="col-sm-8">
                        <input type="text" name="total" class="form-control"  required>
                    </div>

                </div>
        </div>
        <div class="form-group col-sm-4">
        </div>
        <div class="form-group col-sm-4">
            <input type="button" class="btn" value="Complete GRN">
        </div>
        <div class="form-group col-sm-4">
            <input type="button" class="btn" value="Cancel">
        </div>
</form>
</body>
<?php
include_once("foot.php");
?>