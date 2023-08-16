<?php
include('../includes/connect.php');

?>


<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User - Registartion</title>

    <!---bootstap css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!----fontawesome link---->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!---- css.file <link rel = "stylesheet" href="style.css"> ----->
   
    </script>
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
    
    
    <div class="conatiner-fluid">
        <h2 class ="text-center ">New Registration Form</h2>
        <div class="container d-flex  justify-content-center align-items-center">
            <div class = "col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/farm-data">

                    <div class="form-outline mb-3">
                        <label for="user_username" class="form-label">User name</label>
                        <input type="text" name="user_username" class="form-control" 
                        placeholder= "Enter user name" id="user_username" autocomplete="off" required="required">
                    </div>


                    <div class="form-outline mb-3">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="text" name="user_email" class="form-control" placeholder= "Enter your Email" 
                                id="user_email" autocomplete="off" required="required">
        

                    <div class="form-outline mb-3">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" name="user_password" class="form-control" 
                                placeholder= "Enter your password" id="user_password" autocomplete="off" 
                                required="required">
                    </div>
                    <div class="form-outline mb-3">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" name="conf_user_password" class="form-control" 
                                placeholder= "Re-Enter your password" id="conf_user_password" autocomplete="off" 
                                required="required">
                    </div>
                    <div class="form-outline mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" 
                                placeholder= "Enter your address" id="address" autocomplete="off" 
                                required="required">
                    </div>
                    <div class="form-outline mb-3">
                        <label for="contact" class="form-label">Contact Number</label>
                        <input type="text" name="contact" class="form-control" 
                                placeholder= "Enter you number " id="conatct" autocomplete="off" 
                                required="required">
                    </div>
                    <div  class="form-outline mb-3">
                        <label for="$upload_certificate" class="form-label">Upload Certificate</label>
                        <input type="file" name="$upload_certificate" class="form-control" 
                                placeholder= "Upload Certificate" id="$upload_certificate" autocomplete="off" 
                                required="required">
                    </div>
                    <div>                        
                        <input type="submit" value="Register" class="btn" name="farmer_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="farmer_login.php" class="text-danger">Login</a></p>
                    </div>

                </form>
            </div>     
        </div>
    </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
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
?>


<?php
if(isset($_POST['farmer_register']))
{
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $farmer_Image = $_FILES['farmer_Image']['name'];
        //accessing image tmp name
    $tmp_Image = $_FILES['farmer_Image']['tmp_name'];
    $user_ipaddress=getIPAddress();

    move_uploaded_file($tmp_Image,"./farmer_images/$farmer_Image");
    $select_query= "select * from `farmer_table` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $rows_count= mysqli_num_rows($result);
    if($rows_count>0)
    {
        echo"<script>alert('username already exists')</script>";

    }
    elseif ($user_password != $conf_user_password) 
    {
        echo"<script>alert('password doesnt match')</script>";
    }
    else
    {     
    $insert_query = "insert into `farmer_table`( username, user_email, user_password,address, mobile,user_ipaddress,farmer_Image ) values  ('$user_username','$user_email','$hash_password','$address','$contact','$user_ipaddress','$farmer_Image')";
    $sql_exceute=mysqli_query($con,$insert_query);
    }

}
?>



























