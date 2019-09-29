<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 18-Sep-19
 * Time: 4:52 PM
 */
if (isset($_GET["PTS"])) {
    include("c_customer.php");
    $p = new customer();
    $pt = $p->getpoints($_GET["PS"]);
    echo $pt;
}
?>