<?php
session_start();
if ($_SESSION["utype"]=="admin" or $_SESSION["utype"]=="manager"){

}
else
{
    header("location:page-login.php");
}
include_once("c_supplier.php");
$sup = new supplier();
$comp = $sup->getall();
include_once("c_sup_payments.php");
if (isset($_POST["amt"]))
{
    $sp = new sup_payments();

    $sp->sup_id = $_POST["category"];
    $sp->ref_no = $_POST["ref_no"];
    $sp->amount = $_POST["amt"];
    $sp->p_method = $_POST["category1"];
    $sp->cheque_no = $_POST["chq_no"];
    $sp->cheque_date = $_POST["doc"];

        $sp->register();

}
include_once("head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1>Supplier Payments</h1>
<form method="post" action="sup_payments.php" class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-sm-2">Company Name:</label>
        <div class="col-sm-10">
            <select name="category" class="form-control">
                <?php
                foreach ($comp as $item){
                    echo "<option value='$item->supplier_id'>$item->company_name</option>";

                }
                ?>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Reference No:</label>
        <div class="col-sm-10">
            <input type="text" name="ref_no"  class="form-control numonly"  placeholder="Enter Reference No" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Amount:</label>
        <div class="col-sm-10">
            <input type="text" name="amt"  class="form-control numonly"  placeholder="e.g.:-Rs.0.00" required>
        </div>
    </div>
    <div class="form-group" >
        <label class="control-label col-sm-2">Payment Method</label>
        <div class="col-sm-10">
        <select name="category1" id="category" class="form-control" onchange="cheque()">
            <option value="cheque">Cheque</option>
            <option value="cash">Cash</option>

        </select>
        </div>
    </div>
    <div class="form-group" id="cheque_no">
        <label class="control-label col-sm-2">Cheque No:</label>
        <div class="col-sm-10">
            <input type="text" name="chq_no" class="form-control"  placeholder="e.g.:-0123456">
        </div>
    </div>
    <div class="form-group" id="date_of_cheque">
        <label class="control-label col-sm-2">Date of Cheque:</label>
        <div class="col-sm-10">
            <input type="date" name="doc" class="form-control" >
        </div>
    </div>

    <input type="submit" class="btn">

</form>
</body>
</html>
<?php
include_once("foot.php");
?>
<script>
    function cheque() {

        var category = jQuery("#category").val();
        var cq_no = jQuery("#cheque_no");
        var cq_date = jQuery("#date_of_cheque");
       // alert(category);
        if (category=="cash") {

            cq_no.hide();
            cq_date.hide();
        }
        else{
            cq_no.show();
            cq_date.show();
        }
    }
</script>

