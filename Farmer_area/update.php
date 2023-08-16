<?php
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update product</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel = "stylesheet" href="../style.css">
</head>
<style>

	
</style>

 <body class="bg-light">
 	<?php
 	include('../includes/connect.php');

 	if (isset($_GET['edit'])) 
 	{
 		$edit_id=$_GET['edit'];
 		//echo $edit_id;
 		$edit_query =mysqli_query($con,"SELECT * FROM `product` WHERE Product_id = $edit_id");
 		if(mysqli_num_rows($edit_query) > 0 )
 		{
 			$fetch_data =mysqli_fetch_assoc($edit_query);
            
 				//$row = $fetch_data['product_title'];
 				//echo $row;
 			
 	?>
	<div class="container mt-3">
		<h1 class="text-center">Update Product </h1>
		<form action="" method="post" enctype="multipart/form-data" class="upadte_product product_container_box">
			<input type="hidden" value="<?php echo $fetch_data['Product_id']?>">
			<img src="./images/<?php echo $fetch_data['product_Image']?>"alt="" class="cart_img rounded mx-auto d-block">
			<!----- product-titile----->
			<div class="form-outline  mb-4 w-50 m-auto">
				<label for="product_title" class="form-label">Product_Title</label>
				<input type="text" name="product_title" id ="product_title" 
				class="form-control" placeholder="Enter product_title"
				autocomplete="off" required="required" value="<?php echo $fetch_data['product_title'] ?>">
			</div>

            <!----- product-description----->
			<div class="form-outline  mb-4 w-50 m-auto">
				<label for="Description" class="form-label">Product Description</label>
				<input type="text" name="Description" id ="Description" 
				class="form-control" placeholder="Enter Description"
				autocomplete="off" required="required" value="<?php echo $fetch_data['Description']?>">
			</div>

			
			


			<!----- product-price----->
			<div class="form-outline  mb-4 w-50 m-auto">
				<label for="Poduct_price" class="form-label">Product price</label>
				<input type="text" name="Product_price" id ="Product_price" 
				class="form-control" placeholder="Enter Product price"
				autocomplete="off" required="required" value="<?php echo $fetch_data['Product_price']?>">
			</div>
		
			<div class="form-outline  mb-4 w-50 m-auto">
				<div class="bnts">
					<input type="submit"class=" btn btn-danger mb-3 px-3" class="edit_btn">
					<input type="reset"class="close_btn btn btn-danger mb-3 px-3" Value="Cancel"class="cancel_btn">
				</div> 
			</div>
		</form>
     <?php
      }
      }
    
    ?>
	</div>
</body>
</html>