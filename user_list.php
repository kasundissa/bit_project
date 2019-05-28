<?php

	include_once("c_user.php");
	$u=new user();
	
	if(isset($_GET['du'])){
		$u->remove($_GET['du']);
	}
	
	$arr=$u->getall();
?>

<table border='1'>
	<tr><th>User ID</th><th>Name</th><th>Password</th><th>NIC</th><th>Address</th><th>Mobile</th><th>Email</th></tr>
	
	<?php
		foreach($arr as $item){
			echo "<tr><td>$item->usr_ID</td><td>$item->usr_Name</td><td>$item->usr_password</td><td>$item->usr_NIC</td><td>$item->usr_address</td><td>$item->usr_mobile</td><td>$item->usr_email</td><td onclick='delu($item->usr_ID)'>del</td></tr>";
			
		}
	?>

</table>


<script>

	function delu(uidx){
		
		if(confirm("Are you sure want to delete this?")==true)
			location.href="user_list.php?du="+uidx;
		
	
	}

</script>