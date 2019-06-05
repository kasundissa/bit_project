<?php

	include_once("c_pro_cat.php");
	$p=new product_category();
	
	if(isset($_GET['dp'])){
		$p->remove($_GET['dp']);
	}
	
	$arr=$p->getall();

    include_once("head.php");
?>
<table class="table">
	<tr><th>Category ID</th><th>Category Code</th><th>Category Name</th></tr>
	
	<?php
		foreach($arr as $item){
			echo "<tr><td>$item->cat_id</td><td>$item->cat_code</td><td>$item->cat_name</td><td onclick='delp($item->cat_id)'>del</td></tr>";
			
		}
	?>

</table>
<script>

	function delp(pidx){
		
		if(confirm("Are sure want to delete this?")==true)
			location.href="pro_cat_list.php?dp="+pidx;
		
	
	}

</script>
<?php
include_once("foot.php");
?>
