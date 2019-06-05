<?php
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
    <tr><th>Drug ID</th><th>Drug Name</th><th>Company Name</th><th>Description</th><th>Batch No</th><th>Weight</th><th>Manufactured Date</th><th>Expire Date</th><th>Price</th></tr>

    <?php
        foreach ($arr as $item)
        {
            echo "<tr><td>$item->drug_id</td><td>$item->drug_name</td><td>$item->comp_name</td><td>$item->description</td><td>$item->batch_no</td><td>$item->weight</td><td>$item->manu_date</td><td>$item->exp_date</td><td>$item->price</td><td onclick='deld($item->drug_id)'>del</td></tr>";
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
