<?php
//including the connect file to the database
include('includes/connect.php');

//getting products
function getproducts()
{
	global $con;
	$select_query="SELECT * FROM `product`  LIMIT 0,6"; 
    $result_query=mysqli_query($con,$select_query);
     while($row=mysqli_fetch_assoc($result_query))
     {
            $Product_id=$row['Product_id'];
            $product_title=$row['product_title'];
	          $Description=$row['Description'];
            $product_Image=$row['product_Image'];
	          $Product_price=$row['Product_price'];
            echo  "<div class='col-md-4 mb-2 text-center'>
            <div class='card border-0 bg-light mb-2'>
              <div class='card'>
                <img src='./Farmer_area/product_images/$product_Image' class='img-thumbnail'class='img-fluid' alt=''>         
              </div>
            </div>
              <h2 class='card-title'>$product_title</h2>
              <h5 class='card-text'>$Description</h5>
              <h5 class='card-price'>price: \${$Product_price}</h5>
              <a href='index.php?add_to_cart= $Product_id' class='btn'>Add to cart</a>
          </div>";
        }

}
// getting all products
 function productpage()
 {
  global $con;
  $select_query="SELECT * FROM `product`  "; 
    $result_query=mysqli_query($con,$select_query);
     while($row=mysqli_fetch_assoc($result_query))
     {
            $Product_id=$row['Product_id'];
            $product_title=$row['product_title'];
            $Description=$row['Description'];
            $product_Image=$row['product_Image'];
            $Product_price=$row['Product_price'];
            echo  "<div class='col-md-4 mb-2 text-center'>
            <div class='card border-0 bg-light mb-2'>
              <div class='card'>
                <img src='./Farmer_area/product_images/$product_Image' class='img-thumbnail'class='img-fluid' alt=''>         
              </div>
            </div>
              <h2 class='card-title'>$product_title</h2>
              <h5 class='card-text'>$Description</h5>
              <h5 class='card-price'>price: $Product_price</h5>
              <a href='index.php?add_to_cart=$Product_id' class='btn'>Add to cart</a>
          </div>";
        }


 }
//search product function
function search_products()
{
  global $con;
  if(isset($_GET['search_data_product']))
  {
    $search_data_value=$_GET['search_data'];

  $select_query="select * from `product` where product_key like'%$search_data_value%'"; 
    $result_query=mysqli_query($con,$select_query);
     while($row=mysqli_fetch_assoc($result_query))
     {
            $Product_id=$row['Product_id'];
            $product_title=$row['product_title'];
            $Description=$row['Description'];
            $product_Image=$row['product_Image'];
            $Product_price=$row['Product_price'];
            echo  "<div class='col-md-4 mb-2 text-center'>
            <div class='card border-0 bg-light mb-2'>
              <div class='card'>
                <img src='./Farmer_area/product_images/$product_Image' class='img-thumbnail'class='img-fluid' alt=''>         
              </div>
            </div>
              <h2 class='card-title'>$product_title</h2>
              <h5 class='card-text'>$Description</h5>
              <h5 class='card-price'>price: $Product_price</h5>
              <a href='index.php?add_to_cart=$Product_id' class='btn'>Add to cart</a>
          </div>";
 }    }
}
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 

//cart function
function  cart()
{
  if(isset($_GET['add_to_cart']))
  {
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart']; 
    $select_query=" select * from `cart_details` where ip_address='$get_ip_add' and product_id= $get_product_id" ;
    $result_query=mysqli_query($con,$select_query); 
    $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows>0)
  {
    echo "<script>alert('This item is already prsent inside cart')</script>";
    echo"<script>window.open('index.php','_self')</script>";
  }
  else
  {
    $insert_query ="insert into `cart_details`(product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',1)";
    $result_query= mysqli_query($con,$insert_query); 
    echo"<script>window.open('index.php','_self')</script>";
    echo"<script>window.open('index.php','_self')</script>";
  }  
  }
}
//function to get cart item numbers
 function cart_item()
{
  if(isset($_GET['add_to_cart']))
  {
      global $con;
      $get_ip_add = getIPAddress();
      $select_query=" select * from `cart_details` where ip_address='$get_ip_add'" ;
      $result_query=mysqli_query($con,$select_query); 
      $count_cart_items=mysqli_num_rows($result_query);
  }
  else
  {
      global $con;
      $get_ip_add = getIPAddress();
      $select_query=" select * from `cart_details` where ip_address='$get_ip_add'" ;
      $result_query=mysqli_query($con,$select_query); 
      $count_cart_items=mysqli_num_rows($result_query);    
  }
      echo $count_cart_items;
}

//total cart price
function total_cart_price()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total = 0;
    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
    $result = mysqli_query($con, $cart_query);

    while ($row = mysqli_fetch_array($result))
    {
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM `product` WHERE product_id='$product_id'";
        $result_query = mysqli_query($con, $select_products);

        while ($row_product_price = mysqli_fetch_array($result_query))
        {
            $Product_price = $row_product_price['Product_price'];
            $product_value = $Product_price;
            $total += $product_value;
        }
    }

    echo $total;
}




function send_message()
{
  if(isset($_POST['submit']))
  {
    $to= "someemailaddress@gmai.com";
    $from_name = $_POST['name'];
    $from_email = $_POST['email'];
   $from_subject = $_POST['message'];

    $headers="From: {$from_name} {$from_email} ";

    mail($to,$from_subject,$from_subject,$headers);
    if(!$result)
    {
      echo"error";
    }
    else
    {
      echo"SENT";
    }
   }
}


?>