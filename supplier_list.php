<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 16-Jul-19
 * Time: 2:56 PM
 */
session_start();
if ($_SESSION["utype"]=="admin" or $_SESSION["utype"]=="manager"){

}
else
{
    header("location:page-login.php");
}
include_once ("c_supplier.php");
$s=new supplier();

if (isset($_GET['ds']))
{
    $s->remove($_GET['ds']);
}

$arr=$s->getall();

include_once("head.php");
?>
<table class="table">
    <tr><th>Supplier ID</th><th>Supplier Name</th><th>Company Name</th><th>Contact No</th><th>Delete</th><th>Edit</th></tr>
<?php
foreach ($arr as $item)
{
    echo "<tr><td>$item->supplier_id</td><td>$item->supplier_name</td><td>$item->company_name</td><td>$item->contact_no</td><td onclick='dels($item->supplier_id)'>del</td><td><a href='add_supplier.php?ed=$item->supplier_id'>edit</a></td></tr>";
}
?>
</table>
<script>
    function dels(sidx)
    {
        if (confirm("Are you sure want to delete this?")==true)
            location.href="supplier_list.php?ds="+sidx;
    }
</script>
<?php
include_once("foot.php");
?>
