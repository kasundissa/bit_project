<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 10-Jul-19
 * Time: 10:41 AM
 */
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");
include_once("head.php");
?>
Welcome
<?php
include_once("foot.php");
?>