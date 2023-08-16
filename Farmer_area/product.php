<?php
include('../includes/connect.php');
if(isset($_POST['insert_product']))
{
	$product_title = $_POST['product_title'];
	$Description = $_POST['Description'];
	$product_key = $_POST['product_key'];
	$Product_price = $_POST['Product_price'];
	$product_status="true";
	//accessing image
	$product_Image = $_FILES['product_Image']['name'];
	//accessing image tmp name
	$tmp_Image = $_FILES['product_Image']['tmp_name'];
	//checking empty conditions
	if($product_title =='' or $Description=='' or $product_key=='' or $Product_price=='' 
	    or $product_Image=='' )
	{
		echo "<script>alert('please fill all the available fields')</script>";
		exit();
	}
	else
	{
		move_uploaded_file($tmp_Image,"./product_images/$product_Image");
		//insert query
		$insert_product = "insert into `product`(product_title,Description,product_key,product_Image,Product_price,date,Status)
		values('$product_title','$Description','$product_key','$product_Image','$Product_price',Now(),'$product_status')";
		$result_query = mysqli_query($con,$insert_product);
		if($result_query)
		{
			echo"<script>alert('successfully inserted the products')</script>";
		}
	}	
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add products</title>
	<!------ css link---->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel = "stylesheet" href="../style.css">

</head>
<body class="bg-light">
	<div class="container mt-3">
		<h1 class="text-center">Product Details</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<!----- product-titile----->
			<div class="form-outline  mb-4 w-50 m-auto">
				<label for="product_title" class="form-label">Product_Title</label>
				<input type="text" name="product_title" id ="product_title" 
				class="form-control" placeholder="Enter product_title"
				autocomplete="off" required="required">
			</div>

            <!----- product-description----->
			<div class="form-outline  mb-4 w-50 m-auto">
				<label for="Description" class="form-label">Product Description</label>
				<input type="text" name="Description" id ="Description" 
				class="form-control" placeholder="Enter Description"
				autocomplete="off" required="required">
			</div>

			 <!----- product-keyword----->
			<div class="form-outline  mb-4 w-50 m-auto">
				<label for="product_key" class="form-label">Product Keyword</label>
				<input type="text" name="product_key" id ="product_key" 
				class="form-control" placeholder="Enter Product_key"
				autocomplete="off" required="required">
			</div>
			<!-----images----->
			<div class="form-outline  mb-4 w-50 m-auto">
				<label for="product_Image" class="form-label">Product Image</label>
				<input type="file" name="product_Image"  id ="product_Image" 
				class="form-control"required="required">
			</div>


			<!----- product-price----->
			<div class="form-outline  mb-4 w-50 m-auto">
				<label for="Product_price" class="form-label">Product price</label>
				<input type="text" name="Product_price" id ="Product_price" 
				class="form-control" placeholder="Enter Product price"
				autocomplete="off" required="required">
			</div>
			<!----- product-price----->
			<div class="form-outline  mb-4 w-50 m-auto">
				
				<input type="submit" name="insert_product" 
				class="btn btn-danger mb-3 px-3" value="Insert-Product" >
			</div>
			
		</form>
	</div>
	
</body>
</html>