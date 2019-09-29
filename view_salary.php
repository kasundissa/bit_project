<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 26-Sep-19
 * Time: 11:27 AM
 */
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
            <input type="text" name="u_name" class="form-control">
        </div>
    </div><br/>
    <div class="form-group">
        <label class="control-label col-sm-2">Address:</label>
        <div class="col-sm-10">
            <input type="text" name="u_address" class="form-control">
        </div>
    </div><br/>
    <div class="form-group">
        <label class="control-label col-sm-2">Phone:</label>
        <div class="col-sm-10">
            <input type="text" name="u_phone" class="form-control">
        </div>
    </div><br/>
    <hr>
    <div class="form-group">
        <label class="control-label col-sm-2">Basic Salary:</label>
        <div class="col-sm-10">
            <input type="text" name="b_salary" class="form-control">
        </div>
    </div> <br/>
    <div class="form-group">
        <label class="control-label col-sm-2">Bonus:</label>
        <div class="col-sm-10">
            <input type="text" name="bonus" class="form-control">
        </div>
    </div>  <br/>
    <div class="form-group">
        <label class="control-label col-sm-2">OT:</label>
        <div class="col-sm-10">
            <input type="text" name="ot" class="form-control">
        </div>
    </div><br/>
    <hr>
    <div class="form-group">
        <label class="control-label col-sm-2">Deduction:</label>
        <div class="col-sm-10">
            <input type="text" name="deduction" class="form-control">
        </div>
    </div>  <br/>
    <div class="form-group">
        <label class="control-label col-sm-2">EPF:</label>
        <div class="col-sm-10">
            <input type="text" name="epf" class="form-control">
        </div>
    </div><br/>
    <div class="form-group">
        <label class="control-label col-sm-2">ETF:</label>
        <div class="col-sm-10">
            <input type="text" name="etf" class="form-control">
        </div>
    </div><br/>
    <hr>
    <div class="form-group">
        <label class="control-label col-sm-2">Total Salary:</label>
        <div class="col-sm-10">
            <input type="text" name="t_salary" class="form-control">
        </div>
    </div>
</form>
</body>
</html>
<?php
include_once("foot.php");
?>
