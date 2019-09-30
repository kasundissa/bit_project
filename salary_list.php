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
        <label class="control-label col-sm-4">User ID:</label>
        <div class="col-sm-4">
            <input type="text" name="uid" class="form-control">
        </div>
            <div class="col-sm-4">
        <input type="submit" class="btn" value="Generate">
        </div>
    </div>
</form>
</body>
</html>
<?php
include_once("foot.php");
?>