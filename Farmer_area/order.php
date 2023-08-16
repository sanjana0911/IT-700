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
<div class ="container">
  <div class="shopping cart">
    <h1 class="text-center">All Orders</h1>
    <table class = "table table-fit mt-5 table-dark table-striped table-bordered text-center">
      <thead>
        <tr>
          <th>SL.No</th>
          <th>Invoice Number</th>
          <th>Order_Date</th>
          <th>Status</th>
            
        </tr>
      </thead>
      <tbody>
      <?php
      $display_order = mysqli_query($con,"select * from `orders`");
      $num=1;
      if(mysqli_num_rows($display_order)>0)
      {



        while($row=mysqli_fetch_assoc($display_order))
        { 


          $invoice_number =$row['invoice_number'];
          $order_date=$row['order_date'];
          $status=$row['status'];
          
       
      ?>


        <tr>
          <td><?php echo $num ?></td>
          <td><?php echo $invoice_number  ?></td>
          <td><?php echo  $order_date?></td>
          <td><?php echo $status ?></td>
          
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
