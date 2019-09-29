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
<table class="table">
    <tr><th>User Name</th><th>OT</th><th>Bonus</th><th>Deduction</th></tr>
    <?php
    foreach ($a as $item){
        echo "<tr><td><input type='hidden' name='uid[]' value='$item->usr_ID'><input type='text' value='$item->usr_Name' readonly='readonly'></td><td><input type='text' name='ot[]'></td><td><input type='text' name='bonus[]'></td><td><input type='text' name='deduction[]'></td></tr>";
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