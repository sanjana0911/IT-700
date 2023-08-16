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
	
<div class = "container-fluid p-0 ">
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

	<!--- bottom---->
<div>
   <h3 class="text-center">DashBoard</h3>
</div>

<style>
.btn2
{
	height:40px;
	width: 10%;
	
	
}
</style>

<div class="col-md-12 p-1">
<div class="button text-center">
	<button ><a href="product.php" class="nav-link text-light bg-danger fw-bold  my-1">Add products</a></button>
	<button ><a href="view_product.php"class="nav-link text-light bg-danger fw-bold my-1">View Products</a></button>
	<button ><a href="view_payment.php"class="nav-link text-light bg-danger fw-bold my-1">All Payments</a></button>
	<button ><a href="order.php"class="nav-link text-light bg-danger fw-bold my-1 ">All Orders</a></button>
	
	
</div>
</div>


<!---bootstap js link--->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>
