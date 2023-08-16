<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login form</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!----fontawesome link---->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!---- css.file----->
    <link rel = "stylesheet" href="style.css">
</head>
<style>
.btn
{
	height:40px;
	width:40%;
	outline: none;
	border: none;
	background: rgb(248, 26, 92);
	color: white;
	border-radius: 60px;
	font-weight: 700;
}
</style>
<body>
	<div class= "container d-flex min-vh-100 justify-content-center align-items-center" >
		<form action ="payment.php" class="border shadow p-3 " style="width: 450px;" >
			<h1 class ="text-center p-3">LOGIN</h1>
            <!----username---->
			<div class="mb-3">
               <label for="username" class="form-label">User name</label>
               <input type="text" name="username" class="form-control" id="username">
            </div>
            <!-----password----->
            <div class="mb-3">
               <label for="password" class="form-label">Password</label>
               <input type="text" name="password" class="form-control" id="password">
            </div>   
            <div>                        
              <input type="submit" value="Login" class="btn" name="user_login">
            </div>
            <div>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_registration.php" class="text-danger">Register</a></p>
            </div>


        </form>
   	</div>
	
</body>
</html>


<!--php-->
<?php
if(isset($_POST['user_login']))
{
$user_username=$_POST['user_username'];
$user_password=$_POST['user_password'];
$hash_password=password_hash($user_password, PASSWORD_DEFAULT);
$sql = "select * from `user_table` where username='".$user_username."' and user_password='".$hash_password."'";
$result = mysqli_query($con,$sql);
$rows_count= mysqli_fetch_array($result);
if($rows_count>0)
{
    echo "<script>alert(“Login Successful”)</script>";
    echo"<script>window.open('payment.php','_self')</script>";
  
}
else 
{
echo "<script>alert(“Wrong user name or password”)</script>";

}


}
?>

