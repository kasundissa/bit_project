<?php
include_once("c_grocery_items.php");
$g=new  grocery_items();
$arr=$g->getall();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
<h2>Product Gallery</h2>

<?php
foreach ($arr as $item) {
    echo "<div class='prod'>
    <img src='pimg/$item->it_id.jpg'>
    <div class='info'>
        <p class='des'>$item->it_id $item->it_name</p>
        <p class='price'>Rs.$item->price/=</p>
    </div>
        <a href='cus_portal_stp2.php?id=$item->it_id'>
    <div class='buynow'>
  Buy Now
    </div>
    </a>  
</div>";
}
?>

<style>
.prod { float: left;
    text-align:center;
    width: 150px;
    height: 250px;
      border:#eee 1px solid;
      margin:15px;}
.prod img {
margin: 5px;
width: 100%;
}
.info{
padding: 5px;
    height: 75px;
        background: #E1E8ED;

    }
    .buynow{
padding: 25px;
        height: 25px;
        background: #2288bb;
    }

.buynow:hover{
    cursor: pointer;

}
</style>
</body>
</html>
