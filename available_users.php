<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 02-Jan-20
 * Time: 11:04 AM
 */

session_start();
if ($_SESSION["utype"]=="admin" or $_SESSION["utype"]=="manager"){

}
else
{
    header("location:page-login.php");
}


	include_once("c_user.php");
	$u=new user(); //create a new object

	$arr=$u->getall(); // call the get all function
    include_once("head.php");
?>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
    <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
    <table id="tbl" class="table display" data-export-title="test"> <!--Create a table for list all the user details-->
        <caption>Available Users Reports</caption>
        <thead>
        <tr><th>User ID</th><th>Name</th><th>NIC</th><th>Date of Birth</th><th>Address</th><th>Mobile</th><th>Email</th><th>Basic Salary</th><th>Role</th></tr> <!--table headings-->
        </thead>
        <tbody>
        <?php
        foreach($arr as $item){
            echo "<tr><td>$item->usr_ID</td><td>$item->usr_Name</td><td>$item->usr_NIC</td><td>$item->dob</td><td>$item->usr_address</td><td>$item->usr_mobile</td><td>$item->usr_email</td><td>$item->basic_salary</td><td>$item->role</td></tr>";

        }
        ?>
        </tbody>
    </table>
    <script>
        //to print report
        jQuery(document).ready( function () {
            jQuery('#tbl').DataTable( {

                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );
    </script>
<?php
include_once("foot.php");
?>