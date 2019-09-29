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
<form method="post" class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-sm-4">User ID:</label>
        <div class="col-sm-4">
            <input type="text" name="uid" class="form-control">
        </div>
            <div class="col-sm-4">
        <a href="view_salary.php"><input type="submit" class="btn" value="Generate"> </a>
        </div>
    </div>
</form>
</body>
</html>
<?php
include_once("foot.php");
?>