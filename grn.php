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
include_once("c_supplier.php");
$p = new supplier();
$cat=$p->getall();
include_once("c_drugs.php");
$dr= new drugs();
$drg_cat=$dr->getall();
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
            <input type="text" name="date" value="<?php echo date('Y-m-d')?>" readonly="readonly" class="form-control"  required>
        </div>
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label col-sm-3" >Ref No:</label>
        <div class="col-sm-9">
            <input type="text" name="ref_no" class="form-control" placeholder="e.g.:-0000012345"  required>
        </div>
    </div>
    <div class="form-group col-sm-6">
        <label class="control-label col-sm-3" >Supplier:</label>
        <div class="col-sm-9">
            <select name="category" class="form-control">
                <?php
                    foreach ($cat as $item){
                        echo "<option value='$item->supplier_id'>$item->company_name</option>";

                    }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group col-sm-12">
    <h3>Product Details</h3>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Drug Name:</label>
        <div class="col-sm-7">
            <select name="drg_category" class="form-control" id="drg_name">
                <?php
                    foreach ($drg_cat as $drg_item){
                        echo "<option value='$drg_item->drug_id'>$drg_item->drug_name</option>";
                    }

                ?>
            </select>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Pack Size:</label>
        <div class="col-sm-7">
            <input type="text" name="pak_size" id="pack_size" class="form-control" required>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >No Of Packs:</label>
        <div class="col-sm-7">
            <input type="text" name="no_of_pak" id="no_pack" class="form-control" required>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Unit Price:</label>
        <div class="col-sm-7">
            <input type="text" name="unit_price" id="un_price" class="form-control" placeholder="Rs.0.00" required>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Selling Price:</label>
        <div class="col-sm-7">
            <input type="text" name="sell_price" id="sl_price" class="form-control" placeholder="Rs.0.00" required><br/>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <input type="button" onclick="add()" value="ADD PRODUCT" class="btn">
    </div>
    <table class="table" border="2">

        <tr><th>Item No</th><th>Drug Name</th><th>Pack Size</th><th>No of Packs</th><th>Unit Price</th><th>Selling Price</th>
            <th>Cost</th><th>Remove</th></tr>
        <tbody id="tb1">

        </tbody>
    </table>
        <div class="form-group col-sm-12">
            <div class="form-group col-sm-6">
            </div>

                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4">Total Cost:</label>
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


<script>
    function add() {

        var d_name = jQuery("#drg_name").val();
        var pk_size = jQuery("#pack_size").val();
        var no_pk = jQuery("#no_pack").val();
        var u_price = jQuery("#un_price").val();
        var tot = u_price*no_pk*pk_size;
        var s_price = jQuery("#sl_price").val();

        var tbcont="<tr><td></td><td><input type='text' id='dn' readonly='readonly' value='"+d_name+"' name='dn' ></td><td><input type='text' id='ps' readonly='readonly' value='"+pk_size+"' name='ps'></td><td><input type='text' id='np' readonly='readonly' value='"+no_pk+"' name='np'></td><td><input type='text' id='up' readonly='readonly' value='"+u_price+"' name='up'></td><td><input type='text' id='sp' readonly='readonly' value='"+s_price+"' name='sp'></td><td><input type='text' id='total' readonly='readonly' value='"+tot+"' name='total'></td><td><input type='button' class='btn' onclick='remove(this)' value='Remove'></td></tr>";
        jQuery("#tb1").append(tbcont);

        jQuery("#drg_name").val("");
        jQuery("#pack_size").val("");
        jQuery("#no_pack").val("");
        jQuery("#un_price").val("");
        jQuery("#sl_price").val("");


    }
    function remove(aa) {
        jQuery(aa).parent().parent().remove();
    }

</script>