<?php

$conn=mysqli_connect("localhost","root","","travel");

$message="";

if(isset($_POST['addbooking'])){

$name=$_POST['name'];
$address=$_POST['address'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$destination=$_POST['destination'];
$date=$_POST['date'];

$sql="INSERT INTO bookings (name,address,tel,email,destination,travel_date)
VALUES ('$name','$address','$tel','$email','$destination','$date')";

if(mysqli_query($conn,$sql)){
$message="Booking Added Successfully";
}else{
$message="Error Adding Booking";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WELCOME TO EXPLORE SL</title>
<link rel="stylesheet" href="cus.css">
</head>
<body>

<header>
<h1>WELCOME TO EXPLORE SL</h1>
<a href="index.html" class="home-btn">Home</a>
</header>

<nav>
<a href="cus.php">Add Booking</a>
<a href="cusb.php">My Bookings</a>
</nav>

<div class="container">

<h2>Add Booking</h2>

<?php if($message!=""){ echo "<p>$message</p>"; } ?>

<form method="POST">

<input type="text" name="name" placeholder="Full Name" required>

<input type="text" name="address" placeholder="Address" required>

<input type="text" name="tel" placeholder="Telephone Number" required>

<input type="email" name="email" placeholder="Email" required>

<select name="destination" required>
<option value="">Select Destination</option>
<option value="Sigiriya">Sigiriya</option>
<option value="Sri Padaya">Sri Padaya</option>
<option value="Yala Safari">Yala Safari</option>
<option value="Arugumbay">Arugumbay</option>
<option value="Delf Island">Delf Island</option>
<option value="Red Mosque">Red Mosque</option>
<option value="Gall Fort">Gall Fort</option>
</select>

<input type="date" name="date" required>

<button type="submit" name="addbooking">Add Booking</button>

</form>

</div>

</body>
</html>