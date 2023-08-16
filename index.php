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
	<title>Organic Farm Hub</title>

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
          <a class="nav-link" href="farmer_login/farmer_login.php">Farmer_Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="users_area/user_login.php"><i class="fa-solid fa-users"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php
          cart_item();?></sup></a>
        </li> 
        
 

      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="px-2 search" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!--<button class="btn" type="submit" value="search" name ="search_data_product">Search</button>----->
       <input type="submit" value="search" class="btn"  name ="search_data_product">
      </form>
    </div>
  </div>
</nav>
<!--- calling  cart function--->
<?php
cart();
?>

  <section class ="main">
    <div class ="container">
      <div class ="row text-center">
        <div class ="col-lg-7 pt-5 text-center">
          <h1 class ="pt-5">Experience The Freshness</h1>
          <p >Welcome To Our Organic Farm Hub! Explore Organic Delights At Our Farm Hub To Add Some Flavor To Your life.Delivered Right To Your Table By Local Organic Farmers.</p>
          <a href ="display_all.php"><button class="btn1">Explore Now</button></a>

        </div>
      </div>
    </div>
  </section>
  <!----products---->
  <section class= "products">
    <div class="container ">

      <div class="row1">
        <div class="col-lg-5 py-5 m-auto text-center">
         <h1>Products</h1>
        </div>
      </div>
      <!----insert products--->
      
          <div class="row">
          <!--- fetching products----->
          <?php
          //calling function
          getproducts();
          getIPAddress();

  
          ?>   
          </div>
    </div>
  </section>

  <!----- contact---->
  <div class="container">
            <div class="row">
                <div class="col-lg-5 py-5 m-auto text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <form name="sentMessage" id="contactForm" method="post" >
                      
                      
                        <div class="row">
                           <div class="form-outline mb-3">
                                
                                 <div class="form-group">
                                    <label class="large fw-bold mt-4 pt-1 mb-0" >FullName</label>
                                    <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label class="large fw-bold mt-4 pt-1 mb-0" >Email</label>
                                    <input type="email"name="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label class="large fw-bold mt-4 pt-1 mb-0" >Subject</label>
                                    <input type="text" name="subject" class="form-control" placeholder="Your subject" id="subject" required data-validation-required-message="Please enter your subject.">
                                    <p class="help-block text-danger"></p>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="large fw-bold mt-4 pt-1 mb-0" >Message</label>
                                    <textarea name ="message" class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            
                                <div id="success"></div>
                                <button name="submit "type="submit" class="btn1 ">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
 

  



<!--- include footer---->
<?php
include('./includes/footer.php');
?>


 <!---bootstap js link--->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>

