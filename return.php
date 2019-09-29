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

        <div class="form-group col-sm-6">
            <label class="control-label col-sm-3" >Bill No:</label>
            <div class="col-sm-9">
                <input type="text" name="bill_no" class="form-control" required>
            </div>
        </div>
    <div class="form-group col-sm-6">
        <label class="control-label col-sm-6" >Loyalty Card No:</label>
        <div class="col-sm-6">
            <input type="text"  name="l_no" class="form-control">
        </div>
    </div>

        <table class="table" border="2">
            <tr><th>Item Name</th><th>Price</th><th>Quantity</th><th>Amount</th><th>Return</th></tr>

            <tbody id="table1">

            </tbody>
        </table>
    <div class="form-group col-sm-6">
    </div>
        <div class="form-group col-sm-6">
            <label class="control-label col-sm-6" >Returnable Amount:</label>
            <div class="col-sm-6">
                <input type="text" readonly="readonly" id="return_amt" name="return_amt" class="form-control">
            </div>
        </div>
    <div class="form-group col-sm-6">
    </div>
    <div class="form-group col-sm-6">
        <input type="button" class="btn" value="Buy Items">
        <input type="button" class="btn" value="Add to Loyalty card">
    </div>

</form>
</body>
<?php
include_once("foot.php");
?>