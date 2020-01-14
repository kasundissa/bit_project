<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 03-Jan-20
 * Time: 9:40 PM
 */
if (isset($_GET["AMT"])) {
    include("c_grn.php");
    $p = new grn();
    $pr = $p->get_amt($_GET["AMT"]);
    echo $pr;
    }
?>