<?php

$conn=mysqli_connect("localhost","root","","travel");

if(isset($_POST['update'])){

$id=$_POST['id'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql="UPDATE users SET username='$username', email='$email', password='$password' WHERE id='$id'";

mysqli_query($conn,$sql);

}

$sql="SELECT * FROM users WHERE role='customer'";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Customers</title>
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

<h2>Manage Customers</h2>

<table>

<tr>
<th>Username</th>
<th>Email</th>
<th>Password</th>
<th>Action</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<form method="POST">

<td>
<input type="text" name="username" value="<?php echo $row['username']; ?>">
</td>

<td>
<input type="email" name="email" value="<?php echo $row['email']; ?>">
</td>

<td>
<input type="text" name="password" value="<?php echo $row['password']; ?>">
</td>

<td>
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<button type="submit" name="update">Update</button>
</td>

</form>

</tr>

<?php

}

?>

</table>

</div>

</body>
</html>