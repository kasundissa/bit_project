<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 23-Jul-19
 * Time: 2:10 PM
 */
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");

include_once("c_grocery_items.php");
$g=new  grocery_items();

if (isset($_GET['dc']))
{
    $g->remove($_GET['dc']);
}

$arr=$g->getall();

include_once("head.php");
?>
<table class="table">
    <tr><th>Item ID</th><th>Item Name</th><th>Brand Name</th><th>Manufacturer Name</th><th>Marketer Name</th><th>Description</th><th>Delete</th><th>Edit</th></tr>
    <?php
    foreach ($arr as $item)
    {
        echo "<tr><td>$item->it_id</td><td>$item->it_name</td><td>$item->brand_name</td><td>$item->manufacturer_name</td><td>$item->marketer_name</td><td>$item->description</td><td onclick='del($item->it_id)'>del</td><td><a href='add_grocery_items.php?ed=$item->it_id'>edit</a></td></tr>";
    }
    ?>
</table>
<script>
    function del(gidx)
    {
        if (confirm("Are you sure want to delete this?")==true)
            location.href="grocery_items_list.php?dc="+gidx;
    }
</script>
<?php
include_once("foot.php");
?>
