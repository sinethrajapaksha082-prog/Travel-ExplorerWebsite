<?php

$conn=mysqli_connect("localhost","root","","travel");

$result=null;

if(isset($_POST['search'])){

$email=$_POST['email'];

$sql="SELECT * FROM bookings WHERE email='$email'";

$result=mysqli_query($conn,$sql);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Bookings</title>
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

<h2>Search Your Bookings</h2>

<form method="POST">
<input type="email" name="email" placeholder="Enter Your Email" required>
<button type="submit" name="search">Search</button>
</form>

<?php

if($result){

if(mysqli_num_rows($result)>0){

echo "<table>";
echo "<tr>
<th>Name</th>
<th>Address</th>
<th>Tel</th>
<th>Email</th>
<th>Destination</th>
<th>Date</th>
</tr>";

while($row=mysqli_fetch_assoc($result)){

echo "<tr>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['address']."</td>";
echo "<td>".$row['tel']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['destination']."</td>";
echo "<td>".$row['travel_date']."</td>";
echo "</tr>";

}

echo "</table>";

}else{

echo "<p>No bookings found for this email</p>";

}

}

?>

</div>

</body>
</html>