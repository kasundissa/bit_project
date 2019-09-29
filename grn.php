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

include_once("c_grn.php");
if (isset($_POST["ref_no"]))
{
    $g2 = new grn();
    $g2->ref_no = $_POST["ref_no"];
    $g2->supplier = $_POST["category"];
    $g2->total_cost = $_POST["tot_cost"];

    $g2->drug_name = $_POST["dn"];
    $g2->pack_size = $_POST["ps"];
    $g2->no_of_packs = $_POST["np"];
    $g2->batch_no = $_POST["b_no"];
    $g2->weight = $_POST["wgt"];
    $g2->manufacture_date = $_POST["mdate"];
    $g2->expire_date = $_POST["e_date"];
    $g2->unit_price = $_POST["up"];
    $g2->selling_price = $_POST["sp"];
    $g2->cost = $_POST["total"];

        $g2->register();

}

include_once("head.php");
?>
<body>
<form method="post" action="" class="form-horizontal">
    <div class="form-group col-sm-12">
    <h3>GRN Details</h3>
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
            <input type="text" name="pak_size" id="pack_size"  placeholder="e.g.:-30" class="form-control">
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >No Of Packs:</label>
        <div class="col-sm-7">
            <input type="text" name="no_of_pak" id="no_pack" placeholder="e.g.:-50" class="form-control">
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Batch No:</label>
        <div class="col-sm-7">
            <input type="text" name="batch_no" id="bno" class="form-control" placeholder="e.g.:-FK70K802"><br/>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Weight:</label>
        <div class="col-sm-7">
            <input type="text" name="weight" id="weight" class="form-control" placeholder="e.g.:-50mg"><br/>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Manufacture Date:</label>
        <div class="col-sm-7">
            <input type="date" name="manu_date" id="m_date" class="form-control"><br/>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Expire Date:</label>
        <div class="col-sm-7">
            <input type="date" name="expire_date" id="ex_date" class="form-control"><br/>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Pack Price:</label>
        <div class="col-sm-7">
            <input type="text" name="pak_price" id="pk_price" class="form-control" placeholder="Rs.0.00">
        </div>
    </div>
    <div class="form-group col-sm-4">
        <label class="control-label col-sm-5" >Selling Price of Unit:</label>
        <div class="col-sm-7">
            <input type="text" name="sell_price" id="sl_price" class="form-control" placeholder="Rs.0.00"><br/>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <input type="button" onclick="add()" value="ADD PRODUCT" class="btn">
    </div>
    <table class="table table-responsive" border="2">

        <tr><th>Drug Name</th><th>Pack Size</th><th>No of Packs</th><th>Batch No</th><th>Weight</th><th>Manufacture Date</th><th>Expire Date</th><th>Pack Price</th><th>Selling Price</th>
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
                        <input type="text" readonly="readonly" id="t_cost" name="tot_cost" class="form-control"  required>
                    </div>

                </div>
        </div>
        <div class="form-group col-sm-4">
        </div>
        <div class="form-group col-sm-4">
            <input type="submit" class="btn" value="Complete GRN">
        </div>
        <div class="form-group col-sm-4">
            <a href="grn.php"> <input type="button" class="btn" value="Cancel"></a>
        </div>
</form>
</body>

<?php
include_once("foot.php");
?>


<script>


    function add() {

        var d_name = jQuery("#drg_name").val();
        var d_name2 = jQuery("#drg_name option:selected").text();
        var pk_size = jQuery("#pack_size").val();
        var no_pk = jQuery("#no_pack").val();
        var b_no = jQuery("#bno").val();
        var weight = jQuery("#weight").val();
        var manufacture_date = jQuery("#m_date").val();
        var expire_date = jQuery("#ex_date").val();
        var u_price = jQuery("#pk_price").val();
        var tot = u_price*no_pk;
        var s_price = jQuery("#sl_price").val();


        if(pk_size.length<1)
            return;
        if (no_pk.length<1)
            return;
        if (b_no.length<1)
            return;
        if (weight.length<1)
            return;
        if (manufacture_date.length<1)
            return;
        if (expire_date.length<1)
            return;
        if(u_price.length<1)
            return;
        if(s_price.length<1)
            return;

        var tbcont="<tr><td><input type='text' id='dn2' value='"+d_name2+"'><input type='hidden' id='dn' readonly='readonly' value='"+d_name+"' name='dn[]' ></td><td><input size='8' type='text' id='ps' readonly='readonly' value='"+pk_size+"' name='ps[]'></td><td><input  size='8' type='text' id='np' readonly='readonly' value='"+no_pk+"' name='np[]'></td><td><input size='8' type='text' id='b_no' readonly='readonly' value='"+b_no+"' name='b_no[]'></td><td><input  size='8' type='text' id='wgt' readonly='readonly' value='"+weight+"' name='wgt[]'></td><td><input size='11' type='text' id='mdate' readonly='readonly' value='"+manufacture_date+"' name='mdate[]'></td><td><input  size='11' type='text' id='e_date' readonly='readonly' value='"+expire_date+"' name='e_date[]'></td><td><input size='8' type='text' id='up' readonly='readonly' value='"+u_price+"' name='up[]'></td><td><input size='8' type='text' id='sp' readonly='readonly' value='"+s_price+"' name='sp[]'></td><td><input size='8' type='text' class='total' readonly='readonly' value='"+tot+"' name='total[]'></td><td><input type='button' class='btn' onclick='remove(this)' value='Remove'></td></tr>";
        jQuery("#tb1").append(tbcont);

        jQuery("#drg_name").val("");
        jQuery("#pack_size").val("");
        jQuery("#no_pack").val("");
        jQuery("#bno").val("");
        jQuery("#weight").val("");
        jQuery("#m_date").val("");
        jQuery("#ex_date").val("");
        jQuery("#pk_price").val("");
        jQuery("#sl_price").val("");

        var total = 0;
        jQuery('.total').each(function (index,element) {
            total = total + parseFloat(jQuery(element).val());
        });
        jQuery("#t_cost").val(total);

    }
    function remove(aa) {
        jQuery(aa).parent().parent().remove();
        var total = 0;
        jQuery('.total').each(function (index,element) {
            total = total + parseFloat(jQuery(element).val());
        });
        jQuery("#t_cost").val(total);
    }

</script>