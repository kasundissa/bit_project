<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 18-Sep-19
 * Time: 4:52 PM
 */
if (isset($_GET["PS"])) {
include("c_customer.php");
$p = new customer();
$pt = $p->getpoints($_GET["PS"]);
echo number_format((float)$pt,2,".","");
}
?>