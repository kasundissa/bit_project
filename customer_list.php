<?php
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");

    include_once("c_customer.php");
    $c=new  customer();

    if (isset($_GET['dc']))
    {
        $c->remove($_GET['dc']);
    }

    $arr=$c->getall();

    include_once("head.php");
?>
<table class="table">
    <tr><th>Customer ID</th><th>Customer Name</th><th>NIC</th><th>Loyalty Card No</th><th>Points</th><th>Date of Birth</th><th>Address</th><th>Mobile</th><th>Email</th><th>Delete</th><th>Edit</th></tr>
    <?php
        foreach ($arr as $item)
        {
            echo "<tr><td>$item->cus_ID</td><td>$item->cus_Name</td><td>$item->cus_NIC</td><td>$item->loyalty_no</td><td>$item->total_points</td><td>$item->dob</td><td>$item->cus_address</td><td>$item->cus_mobile</td><td>$item->cus_email</td><td onclick='delc($item->cus_ID)'>del</td><td><a href='add_customer.php?ed=$item->cus_ID'>edit</a></td></tr>";
        }
    ?>
</table>
<script>
    function delc(cidx) 
    {
        if (confirm("Are you sure want to delete this?")==true)
            location.href="customer_list.php?dc="+cidx;
    }
</script>
<?php
include_once("foot.php");
?>