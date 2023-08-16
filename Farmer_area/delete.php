<!----delete----->
<?php
include('../includes/connect.php');
if(isset($_GET['delete']))
{
	$delete_id=$_GET['delete'];
	$delete_query=mysqli_query($con,"DELETE FROM `product` WHERE Product_id =$delete_id") or die("query failed");
	if($delete_query)
	{ 
		echo "product  deleted";

		header('location:view_product.php');
	}else
	{
		echo "product not deleted";
		header('location:view_product.php');
	}

}

?>