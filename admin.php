<?php

$conn=mysqli_connect("localhost","root","","travel");

$sql="SELECT * FROM bookings";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="admin.css">
</head>
<body>

<header>
<h1>Admin Dashboard</h1>
<a href="index.html" class="home-btn">Home</a>
</header>

<nav>
<a href="admin.php">All Bookings</a>
<a href="mngcus.php">Manage Customers</a>
<a href="mngemp.php">Manage Employees</a>
</nav>

<div class="container">

<section id="allbookings">
<h2>All Bookings</h2>

<table>

<tr>
<th>Name</th>
<th>Address</th>
<th>Tel</th>
<th>Email</th>
<th>Destination</th>
<th>Date</th>
</tr>

<?php

if(mysqli_num_rows($result)>0){

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

}else{

echo "<tr><td colspan='6'>No bookings found</td></tr>";

}

?>

</table>



</div>

</body>
</html>