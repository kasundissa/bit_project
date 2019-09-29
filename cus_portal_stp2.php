<?php
include_once("c_grocery_items.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="vendors/jquery/dist/jquery.min.js"></script>
</head>
<body>

<?php
$g=new grocery_items();
if(isset($_GET['id'])){
  $g= $g->getbyid($_GET['id']);
}
    echo "<div class='prod'>
    <img src='pimg/$g->it_id.jpg'/>
         <div class='info'>
        <h2><p class='des'>$g->it_id $g->brand_name $g->it_name</p></h2>
        <h4><p class='about'>$g->description</p></h4>
        <h4><p class='price'>Rs.$g->price/=</p></h4>"; ?>

<form method="post" class="form-horizontal">
        <label>Quantity :</label>
        <input type='text' id='qty' class="form-control" value='1'> <br/>
        <label>Total :</label>
        <input type='text' id='total' class="form-control" value="<?php echo $g->price; ?>" readonly='readonly'><br/>
        <input type="button" value="BUY NOW" class="btn">
         <input type="button" value="ADD TO SHOPPING CART" class="btn">
</form>
<style>
    .prod { float: left;
        text-align:center;
        width: 90%;
        height: 500px;
        border:#eee 1px solid;
        margin:15px;}
    .prod img { float: left;
        margin: 5px;
        height: 400px;
        width: 40%;
    }
    .info{ float: right;
        padding-left: 50px;
        text-align:left;
        width: 45%;
        height: 100%;
        background: #E1E8ED;

    }
</style>
<script>
    jQuery("#qty").change(function () {
        var price = <?php echo $g->price; ?>;
        var quty = jQuery("#qty").val();
        var tot =  price*quty;

        jQuery("#total").val(tot);

    });

</script>
</body>
</html>