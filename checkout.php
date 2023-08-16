<?php
include('includes/connect.php');
if(isset($_POST['insert_billing']))
{
	$firstname = $_POST['Firstname'];
	$lastname = $_POST['lastname'];
	$Address = $_POST['address'];
	$address2 = $_POST['address2'];
    $state = $_POST['state'];
    $City = $_POST['city'];
	$Zipcode = $_POST['Zipcode'];
	if( $firstname =='' or $lastname =='' or $Address=='' or $address2=='' 
	    or  $state==''or $City=='' or $Zipcode=='' )
	{
		echo "<script>alert('please fill all the available fields')</script>";
		exit();
	}
	else
	{
		
		$insert_address = "insert into `billing address`( Firstname, lastname, address, address2, state, city, Zipcode) values('$firstname','$lastname','$Address', '$address2','$state', '$City',$Zipcode')";
		$result = mysqli_query($con,$insert_address);
		if($result)
		{
			echo"<script>alert('successfully inserted the address')</script>";
		}
	}	
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>
</head>
<body>
  <!DOCTYPE html>
<html>
<head>
  <title>Checkout Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<style>
.card {
    max-width: 500px;
    margin: auto;
    color: black;
    border-radius: 20 px;
}

p {
    margin: 0px;
}

.container .h8 {
    font-size: 30px;
    font-weight: 800;
    text-align: center;
}

.btn.btn-primary {
    width: 100%;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 15px;
    background-image: linear-gradient(to right, #77A1D3 0%, #79CBCA 51%, #77A1D3 100%);
    border: none;
    transition: 0.5s;
    background-size: 200% auto;

}


.btn.btn.btn-primary:hover {
    background-position: right center;
    color: #fff;
    text-decoration: none;
}



.btn.btn-primary:hover .fas.fa-arrow-right {
    transform: translate(15px);
    transition: transform 0.2s ease-in;
}

.form-control {
    color: white;
    background-color: #223C60;
    border: 2px solid transparent;
    height: 60px;
    padding-left: 20px;
    vertical-align: middle;
}

.form-control:focus {
    color: white;
    background-color: #0C4160;
    border: 2px solid #2d4dda;
    box-shadow: none;
}

.text {
    font-size: 14px;
    font-weight: 600;
}

::placeholder {
    font-size: 14px;
    font-weight: 600;
}

</style>

<body>
  <div class="container p-4">
     
        <div class="card px-4">
            <p class="h8 py-3">Billing Address</p>
            <div class="row gx-3">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1" style="color: black;">First Name</p>
                        <input class="form-control mb-3" type="text" name="firstname" placeholder=" First Name" >
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1"  style="color: black;">Last Name</p>
                        <input class="form-control mb-3" type="text" name="lastname" placeholder="Last Name" >
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1" style="color: black;">Address</p>
                        <input class="form-control mb-3" type="text" name="Address" placeholder="Enter Address">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                         <p class="text mb-1" style="color: black;">Address 2<span class="text-muted">(Optional)</span></p>
                        
                         <input type="text" class="form-control" id="address2"  name ="address2"placeholder="Flat No">
                    </div>
                </div>
    
                <div class="col-6">
                    <div class="d-flex flex-column" name="state">
                        <p class="text mb-1" style="color: black;">State</p>
                        <select type="text" class="form-control" id="city">
              <option value>Choose...</option>
              <option value="AL">Alabama</option>
  <option value="AK">Alaska</option>
  <option value="AZ">Arizona</option>
  <option value="AR">Arkansas</option>
  <option value="CA">California</option>
  <option value="CO">Colorado</option>
  <option value="CT">Connecticut</option>
  <option value="DE">Delaware</option>
  <option value="DC">District Of Columbia</option>
  <option value="FL">Florida</option>
  <option value="GA">Georgia</option>
  <option value="HI">Hawaii</option>
  <option value="ID">Idaho</option>
  <option value="IL">Illinois</option>
  <option value="IN">Indiana</option>
  <option value="IA">Iowa</option>
  <option value="KS">Kansas</option>
  <option value="KY">Kentucky</option>
  <option value="LA">Louisiana</option>
  <option value="ME">Maine</option>
  <option value="MD">Maryland</option>
  <option value="MA">Massachusetts</option>
  <option value="MI">Michigan</option>
  <option value="MN">Minnesota</option>
  <option value="MS">Mississippi</option>
  <option value="MO">Missouri</option>
  <option value="MT">Montana</option>
  <option value="NE">Nebraska</option>
  <option value="NV">Nevada</option>
  <option value="NH">New Hampshire</option>
  <option value="NJ">New Jersey</option>
  <option value="NM">New Mexico</option>
  <option value="NY">New York</option>
  <option value="NC">North Carolina</option>
  <option value="ND">North Dakota</option>
  <option value="OH">Ohio</option>
  <option value="OK">Oklahoma</option>
  <option value="OR">Oregon</option>
  <option value="PA">Pennsylvania</option>
  <option value="RI">Rhode Island</option>
  <option value="SC">South Carolina</option>
  <option value="SD">South Dakota</option>
  <option value="TN">Tennessee</option>
  <option value="TX">Texas</option>
  <option value="UT">Utah</option>
  <option value="VT">Vermont</option>
  <option value="VA">Virginia</option>
  <option value="WA">Washington</option>
  <option value="WV">West Virginia</option>
  <option value="WI">Wisconsin</option>
  <option value="WY">Wyoming</option>
</select>

            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
                       
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1" style="color: black;">City</p>
                        <input class="form-control mb-3 pt-2 " type="text" name="City" placeholder="Name">
                    </div>
                </div>
                <div class="col-8">
                    <div class="d-flex flex-column">
                        <p class="text mb-1" style="color: black;">ZIP CODE</p>
                        <input class="form-control mb-3 pt-2 " type="text" name ="Zipcode" placeholder="123456789">
                    </div>
                </div>
                <div class="form-check">
          <input type="checkbox" class="form-check-input" id="shipping-adress"> 
            Shipping address is the same as my billing address
          <label for="shipping-adress" class="form-check-label"></label>
        </div>
            <p class="h8 py-3 " style="color: black;" >Payment Details</p>
                <div class="col-12">

                    <div class="d-flex flex-column">
                        <p class="text mb-1"style="color: black;">Person Name</p>
                        <input class="form-control mb-3" type="text" placeholder="Name" >
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1"style="color: black;">Card Number</p>
                        <input class="form-control mb-3 " type="text" placeholder="1234 5678 435678">
                    </div>
                </div>
                <div class="col-8">
                    <div class="d-flex flex-column">
                        <p class="text mb-1"style="color: black;">Expiry</p>
                        <input class="form-control mb-3 pt-2" type="text" placeholder="MM/YYYY">
                    </div>
                </div>
                <div class="col-8">
                    <div class="d-flex flex-column">
                        <p class="text mb-1"style="color: black;">CVV/CVC</p>
                        <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                    </div>
                </div>

                <div class=" row6 col-12 text-center ">
                   
                    <input type="submit" name="insert_payment" 
                class="ps-3 btn btn-danger mb-3" style="font-size: 15x;" value="Place Order" >
            </div>   
                   
                </div>
              
              
                
            </div>
        </div>
    </div>
</body>
</html>

  
