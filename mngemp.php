
<?php

$conn=mysqli_connect("localhost","root","","travel");

$message="";

/* ADD EMPLOYEE */
if(isset($_POST['addemp'])){

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$role=$_POST['role'];

$sql="INSERT INTO users (username,email,password,role)
VALUES ('$username','$email','$password','$role')";

if(mysqli_query($conn,$sql)){
$message="Employee Added Successfully";
}else{
$message="Error Adding Employee";
}

}

/* DELETE EMPLOYEE */
if(isset($_GET['delete'])){
$id=$_GET['delete'];

mysqli_query($conn,"DELETE FROM users WHERE id='$id'");
$message="Employee Deleted Successfully";
}

/* UPDATE EMPLOYEE */
if(isset($_POST['updateemp'])){

$id=$_POST['id'];
$username=$_POST['username'];
$email=$_POST['email'];
$role=$_POST['role'];

mysqli_query($conn,"UPDATE users 
SET username='$username',email='$email',role='$role'
WHERE id='$id'");

$message="Employee Updated Successfully";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Employees</title>
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

<h2>Add Employee</h2>

<?php if($message!=""){ echo "<p>$message</p>"; } ?>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<select name="role" required>
<option value="">Select Role</option>
<option value="admin">Admin</option>
<option value="drivers">Drivers</option>
<option value="customer">Customer</option>
</select>

<button type="submit" name="addemp">Add Employee</button>

</form>

<hr>

<h2>All Employees</h2>

<table border="1" width="100%" cellpadding="10">

<tr>
<th>ID</th>
<th>Username</th>
<th>Email</th>
<th>Role</th>
<th>Actions</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM users WHERE role='admin' OR role='drivers'");

while($row=mysqli_fetch_assoc($result)){

if(isset($_GET['edit']) && $_GET['edit']==$row['id']){

?>

<form method="POST">

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<input type="text" name="username" value="<?php echo $row['username']; ?>">
</td>

<td>
<input type="text" name="email" value="<?php echo $row['email']; ?>">
</td>

<td>
<select name="role">
<option value="admin">Admin</option>
<option value="drivers">Drivers</option>
</select>
</td>

<td>

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<button type="submit" name="updateemp">Update</button>

<a href="mngemp.php">Cancel</a>

</td>

</tr>

</form>

<?php

}else{

?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['role']; ?></td>

<td>

<a href="mngemp.php?edit=<?php echo $row['id']; ?>">Update</a>

|

<a href="mngemp.php?delete=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this employee?')">Delete</a>

</td>

</tr>

<?php
}

}

?>

</table>

</div>

</body>
</html>
```
