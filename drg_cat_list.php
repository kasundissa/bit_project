<?php
session_start();
if ($_SESSION["utype"]=="admin"){

}
else
{
    header("location:page-login.php");
}
	include_once("c_drugs_category.php");
	$p=new drugs_category();
	
	if(isset($_GET['dp'])){
		$p->remove($_GET['dp']);
	}
	
	$arr=$p->getall();

    include_once("head.php");
?>
<table class="table">
	<tr><th>Category ID</th><th>Category Name</th><th>Delete</th><th>Edit</th></tr>
	
	<?php
		foreach($arr as $item){
			echo "<tr><td>$item->cat_id</td><td>$item->cat_name</td><td onclick='delp($item->cat_id)'>del</td><td><a href='add_drg_cat.php?ed=$item->cat_id'>edit</a></td></tr>";
			
		}
	?>

</table>
<script>

	function delp(pidx){
		
		if(confirm("Are sure want to delete this?")==true)
			location.href="drg_cat_list.php?dp="+pidx;
		
	
	}

</script>
<?php
include_once("foot.php");
?>
