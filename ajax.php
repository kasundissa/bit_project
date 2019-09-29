<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 18-Sep-19
 * Time: 2:46 PM
 */
if (isset($_GET["LCN"])){
    include("c_customer.php");
    $p = new customer();
    $pr=$p->getbycode($_GET["LCN"]);
    echo $pr->cus_ID;


}
?>