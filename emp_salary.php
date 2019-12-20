<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 21-Sep-19
 * Time: 11:55 AM
 */
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");
include_once("c_emp_salary.php");
if (isset($_POST["ot"]))
{
    $e = new emp_salary();

    $e->month = $_POST["category"];
    $e->OT = $_POST["ot"];
    $e->bonus = $_POST["bonus"];
    $e->deduction = $_POST["deduction"];
    $e->usr_ID = $_POST["uid"];

    $e->register();


}
include_once("c_user.php");
    $u = new user();
    $a = $u->getall();
include_once("head.php");
?>
    <!DOCTYPE html>
    <html>
<body>
<h3>Employee's Salary</h3><br/>
<form method="post" class="form-horizontal" action="emp_salary.php">
    <div class="form-group">
        <label class="control-label col-sm-4" >Month:</label>
        <div class="col-sm-4">
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
    <br/>
    <br/>
<table class="table">
    <tr><th>Employee Name</th><th>OT</th><th>Bonus</th><th>Deduction</th></tr>
    <?php
    foreach ($a as $item){

        echo "<tr><td><input type='hidden' name='uid[]' value='$item->usr_ID'><input type='text' value='$item->usr_Name' readonly='readonly'></td><td><input type='text' name='ot[]' class='numonly' pattern='[0-9]{*}|[0-9]{*}[.][0-9]{2}' required></td><td><input type='text' name='bonus[]' class='numonly' required></td><td><input type='text' class='numonly' name='deduction[]' required></td></tr>";

    }
    ?>
</table>
    <input type="submit" class="btn">
</form>
</body>
</html>
<?php
include_once("foot.php");
?>

