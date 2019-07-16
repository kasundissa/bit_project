<?php
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");

    include_once("c_drugs.php");
    $d=new drugs();

    if (isset($_GET['dd']))
    {
        $d->remove($_GET['dd']);
    }

    $arr=$d->getall();


    include_once("head.php");

?>

<table class="table">
    <tr><th>Drug ID</th><th>Drug Name</th><th>Brand Name</th><th>Manufacturer</th><th>Description</th><th>Weight</th><th>Category</th><th>Delete</th><th>Edit</th></tr>

    <?php
        foreach ($arr as $item)
        {
            echo "<tr><td>$item->drug_id</td><td>$item->drug_name</td><td>$item->brand_name</td><td>$item->manufacturer_name</td><td>$item->description</td><td>$item->weight</td><td>".$item->cat->cat_name."</td><td onclick='deld($item->drug_id)'>del</td><td><a href='add_drugs.php?ed=$item->drug_id'>edit</a></td></tr>";
        }
    ?>
</table>

<script>
    function deld(didx)
    {
        if(confirm("Are you sure want to delete this?")==true)
            location.href="drugs_list.php?dd="+didx;
    }
</script>


<?php
include_once("foot.php");
?>
