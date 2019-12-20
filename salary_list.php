<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 26-Sep-19
 * Time: 11:17 AM
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
        <label class="control-label col-sm-6">Employee ID:</label>
        <div class="col-sm-6">
            <input type="text" name="uid" class="form-control numonly">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-6">Month:</label>
        <div class="col-sm-6">
            <select name="category" class="form-control">
                <option value="january">January</option>
                <option value="february">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september">September</option>
                <option value="october">October</option>
                <option value="november">November</option>
                <option value="december">December</option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <input type="submit" class="btn" value="Generate">
    </div>
</form>
</body>
</html>
<?php
include_once("foot.php");
?>