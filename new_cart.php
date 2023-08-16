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
    $insert_query ="insert into `cart_details`(product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
    $result_query=mysqli_query($con,$insert_query); 
    echo"<script>window.open('index.php','_self')</script>";
    echo"<script>window.open('index.php','_self')</script>";
  }  









  <?php
    global $con;
     $get_ip_add = getIPAddress();
     $total_price=0;
     $cart_query=" select * from `cart_details` where ip_address='$get_ip_add'";
     $result=mysqli_query($con,$cart_query); 
     while($row=mysqli_fetch_array($result))
     {
      $product_id=$row['product_id'];
      $select_products = "select * from `product` where product_id='Product_id'";
      $result_query=mysqli_query($con,$select_products);
      while($row_product_price=mysqli_fetch_array($result_query))
      {
        $Product_price =array($row_product_price['Product_price']);
        $price_table=$row_product_price[' Product_price'];
        $product_title=$row_product_price[' product_title'];
        $product_Image =$row_product_price['product_Image'];
        $product_value=array_sum( $Product_price);
        $total_price+=$product_value;
         ?>
        <tr>
          <td>
          <?php
          echo $product_title
          ?>
          </td>

          <td>
          <img src="./images/<?php
          echo $product_Image
          ?>" alt="" class="cart_img">
          </td>
          <td><input type ="text" name="qty" class="form-input w-50"></td>-->
       
         <td> <?php
          echo $price_table
          ?></td>
          <td><input type ="checkbox" ></td>
          <td>
            <div class="btn-group">
            
            <input type="submit" value="update_cart" class="bg-danger px-3 py-2 border-0 mx-3"  name ="update_cart">
            <button class="bg-danger px-3 py-2 border-0 mx-3">Remove</button>
            </div>
          </td>   
        </tr>  
      <?php

      }
          
      }
      ?>  