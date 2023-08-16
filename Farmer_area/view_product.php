<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <!------ css link---->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel = "stylesheet" href="../style.css">

</head>
<body>
<!---- header----->
  
<div class = "container-fluid p-3 ">
  <nav class="navbar navbar-expand-lg bg-warning">
    <div class = "container-fluid">
        <a href=" " class = "logo" ><img src ="../images/logo7.jpg" alt="" >Organic Farm Hub</a>
        <nav class="navbar navbar-expand-lg">
          <ul class="navbar-nav">
            <li class= "nav-item">
              <a href="" class="nav-link">Welcome Guest</a>
            </li>
          </ul>
        </nav>
        </div>
  </nav>
</div>
<style>

</style>
<div class ="container">
  <div class="shopping cart">
    <h1 class="text-center">All Product Details</h1>

   
    <table class = "table table-fit mt-5 table-dark table-striped table-bordered text-center">
      <thead>
        <tr>
          <th>SL.No</th>
          <th>Product_Title</th>
          <th>Product_Image</th>
          <th>Description</th>
          <th>Total Price</th>
          <th>Action</th>  
        </tr>
      </thead>
      <tbody>
      <?php
      $display_product = mysqli_query($con,"select * from `product`");
      $num=1;
      if(mysqli_num_rows($display_product)>0)
      {



        while($row=mysqli_fetch_assoc($display_product))
        { 


          $product_name =$row['product_title'];
          $product_Image=$row['product_Image'];
          $product_description=$row['Description'];
          $price_price = $row['Product_price'];
       
      ?>


        <tr>
          <td><?php echo $num ?></td>
          <td><?php echo $product_name ?></td>
          <td ><img src="./product_images/<?php echo $product_Image?>"alt="" class="cart_img"></td>
          <td><?php echo $product_description ?></td>
          <td><?php echo"\$".$price_price ?></td>
          <td>
            <a href="delete.php?delete=<?php echo $row['Product_id']?>"
            class="btn-outline-danger"onclick ="return confirm('Are you sure want to delete the product');"><i class="fa-sharp fa-solid fa-trash"></i></a>
            <a href="update.php?edit=<?php echo $row['Product_id']?>"  class=" btn-outline-danger" ><i class="fa-regular fa-pen-to-square"></i></a>
          </td>
        </tr>
      <?php
      $num++;
      }
      }
      else
      {
        echo "<div class= 'empty_text'>No products Available</div>";
      }
      ?>

      </tbody>
    </table>
  </div>
</div>
</body>


</html>