<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 01-Jan-20
 * Time: 12:51 PM
 */
include_once ("c_online_sold_items.php");
if (isset($_POST["num-product"]))
{
    $o = new online_sold_items(); //create a new object
    $o->it_id = $_POST["it_id"]; //match the variables with user interface
    $o->quantity = $_POST["num-product"];
    $o->c_name = $_POST["cname"];
    $o->c_address = $_POST["caddress"];
    $o->c_mobile = $_POST["cmobile"];

        $o->register();

}
?>
<div class="jumbotron text-center">
    <h1 class="display-3">Thank You!</h1>
    <p class="lead">Your Order Has Been <strong>Placed</strong> </p>
    <hr>
  <!--  <p>
        Having trouble? <a href="">Contact us</a>
    </p>-->
    <p class="lead">
        <a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a>
    </p>
</div>