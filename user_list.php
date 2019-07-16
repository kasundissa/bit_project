<?php
session_start();
if(!isset($_SESSION["uid"]))
    header("location:page-login.php");


	include_once("c_user.php");
	$u=new user();
	
	if(isset($_GET['du'])){
		$u->remove($_GET['du']);
	}


	
	$arr=$u->getall();
    include_once("head.php");
?>

<table class="table">
	<tr><th>User ID</th><th>Name</th><th>NIC</th><th>Date of Birth</th><th>Address</th><th>Mobile</th><th>Email</th><th>Delete</th><th>Edit</th></tr>
	
	<?php
		foreach($arr as $item){
			echo "<tr><td>$item->usr_ID</td><td>$item->usr_Name</td><td>$item->usr_NIC</td><td>$item->dob</td><td>$item->usr_address</td><td>$item->usr_mobile</td><td>$item->usr_email</td><td onclick='delu($item->usr_ID)'>del</td><td><a href='add_user.php?ed=$item->usr_ID'>edit</a></td></tr>";
			
		}
	?>

</table>


<script>

	function delu(uidx){
		
		if(confirm("Are you sure want to delete this?")==true)
			location.href="user_list.php?du="+uidx;
		
	
	}

</script>

<?php
include_once("foot.php");
?>