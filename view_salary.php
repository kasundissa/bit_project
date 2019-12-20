<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 26-Sep-19
 * Time: 11:27 AM
 */
include_once("c_emp_salary.php");
$s = new emp_salary();
$e = $s->getbyid($_POST['uid'],$_POST['category']);

include_once("c_user.php");
$k = new user();
$n = $k->getbyid($_POST['uid']);

include_once("head.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="post" class="form-horizontal" action="view_salary.php">
    <div class="form-group">
        <label class="control-label col-sm-2">User Name:</label>
        <div class="col-sm-10">
            <input type="text" readonly="readonly" name="u_name" class="form-control" value="<?=$n->usr_Name?>">
        </div>
    </div><br/>
    <div class="form-group">
        <label class="control-label col-sm-2">Address:</label>
        <div class="col-sm-10">
            <input type="text" readonly="readonly" name="u_address" class="form-control" value="<?=$n->usr_address?>">
        </div>
    </div><br/>
    <div class="form-group">
        <label class="control-label col-sm-2">Phone:</label>
        <div class="col-sm-10">
            <input type="text" readonly="readonly" name="u_phone" class="form-control" value="<?=$n->usr_mobile?>">
        </div>
    </div><br/>
    <hr>
    <div class="form-group">
        <label class="control-label col-sm-2">Basic Salary:</label>
        <div class="col-sm-10">
            <input type="text" readonly="readonly" name="b_salary" class="form-control" value="<?=$n->basic_salary?>">
        </div>
    </div> <br/>
    <div class="form-group">
        <label class="control-label col-sm-2">Bonus:</label>
        <div class="col-sm-10">
            <input type="text" readonly="readonly" name="bonus" class="form-control" value="<?=$e->bonus?>">
        </div>
    </div>  <br/>
    <div class="form-group">
        <label class="control-label col-sm-2">OT:</label>
        <div class="col-sm-10">
            <input type="text" readonly="readonly" name="ot" class="form-control" value="<?=$e->OT?>">
        </div>
    </div><br/>
    <hr>
    <div class="form-group">
        <label class="control-label col-sm-2">Deduction:</label>
        <div class="col-sm-10">
            <input type="text" readonly="readonly" name="deduction" class="form-control" value="<?=$e->deduction?>">
        </div>
    </div>  <br/>
    <div class="form-group">
        <label class="control-label col-sm-2">EPF:</label>
        <div class="col-sm-10">
            <input type="text" readonly="readonly" name="epf" class="form-control" value="<?=$e->epf?>">
        </div>
    </div><br/>
    <div class="form-group">
        <label class="control-label col-sm-2">ETF:</label>
        <div class="col-sm-10">
            <input type="text" readonly="readonly" name="etf" class="form-control" value="<?=$e->etf?>">
        </div>
    </div><br/>
    <hr>
    <div class="form-group">
        <label class="control-label col-sm-2">Total Salary:</label>
        <div class="col-sm-10">
            <input type="text" readonly="readonly" name="t_salary" class="form-control" value="<?=$e->tot_salary?>">
        </div>
    </div>
</form>
</body>
</html>
<?php
include_once("foot.php");
?>
