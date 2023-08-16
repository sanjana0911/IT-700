<!-- connect file--->
<?php
include('includes/connect.php');
include('function/common_function.php');
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cart Details</title>

    <!---bootstap css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!----fontawesome link---->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!---- css.file----->
    <link rel = "stylesheet" href="style.css">

<body>
    <!---navbar---->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a  class="logo" href="#" ><i class="fa-brands fa-pagelines"></i>Organic Farm Hub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto  my-2 my-lg-0" >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li> 
        <li class="nav-item"  >
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-users"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item()?></sup></a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<!--- calling  cart function--->

<style>
    
.btn2
{
  height: 25px;
  width: 15%;
  outline: none;
  border: none;
  background: rgb(248, 26, 92);
  color: white;
  border-radius: 60px;
  font-weight: 700;
  margin-right: 40px;

}
.cart_img
{
  max-width: 20%;
  height: 20%;
  object-fit: contain;
  left: 30px;
}
.btn5
{
  height: 25px;
  width: 10%;
  outline: none;
  border: none;
  background: rgb(248, 26, 92);
  color: white;
  border-radius: 60px;
  font-weight: 700;
  margin-right: 40px;

}

</style>
<!------ tables for cart---->
<div class ="container">
  <div class="shopping cart">

    
    <form action=" " method="post">
    <table class = "table table-bordered text-center">
      <thead>
        <tr>
          <th>Product_Title</th>
          <th>Product_Image</th>
          <th>Qunatity</th>
          <th>Total Price</th>
          <th>Remove</th>
          <th class= "col-3">operation</th>  
        </tr>
      </thead>
      <tbody>
        <!------php code to display dynamic data--->
      <?php
        global $con;
        $get_ip_add = getIPAddress();
        $total_price = 0;
        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result = mysqli_query($con, $cart_query);
        while ($row = mysqli_fetch_array($result))
        {
          $product_id = $row['product_id'];
          $select_products = "SELECT * FROM product WHERE product_id='$product_id'";
          $result_query = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_query))
        {
          $Product_price = array($row_product_price['Product_price']);
          $price_table = $row_product_price['Product_price'];
          $product_title=$row_product_price['product_title'];
          $product_Image=$row_product_price['product_Image'];
          $product_value = array_sum($Product_price);
          $total_price += $product_value;
  
   
      ?>

        <tr>
          <td><?php echo $product_title ?></td>
          <td ><img src="./images/<?php echo $product_Image?>"alt="" class="cart_img"></td>
          <td>
          <div class="form-outline w-50 ">
          <input type="text"  name="qty" class="form-control" ></div>
          </td>
          
          <td><?php echo"\$".$price_table ?></td>
          <td><input type ="checkbox"></td>
          <td>
            <input type= "submit" class="bg-danger px-3 py-2 border-0 mx-3" value="updatecart" name="update_cart">

            <button class="bg-danger px-3 py-2 border-0 mx-3"> Remove </button>
          </td>
        </tr>
      <!---closing while tag---->
      <?php
        }
        }
      ?>
      
      </tbody>
    </table>
    </table>
    <!--- total---->

    <div class ="d-flex mb-5">
      <h2 class ="px-3">Total:<strong class =" text-danger"><?php echo "\$".$total_price; ?></strong></h2>
      <a href="display_all.php" class= "btn2 text-center ">Continue Shopping</a>

      <a href="checkout.php"class= "btn5 px-3 text-center">Checkout</a>
    </div>
   </div>
</div>
</form>


<!--- include footer---->
<?php
include('./includes/footer.php');
?>


 <!---bootstap js link--->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
