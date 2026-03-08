
<?php

$conn = mysqli_connect("localhost","root","","travel");

$message="";

/* SIGN UP */

if(isset($_POST['signup'])){

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql="INSERT INTO users (username,email,password,role) 
VALUES ('$username','$email','$password','customer')";

if(mysqli_query($conn,$sql)){
$message="Sign Up Successful";
$showSignin=true;
}else{
$message="Error creating account";
}

}


/* SIGN IN */

if(isset($_POST['signin'])){

$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

$user=mysqli_fetch_assoc($result);

if($user['role']=="admin"){
header("Location: admin.php");
exit();
}

if($user['role']=="customer"){
header("Location: cus.php");
exit();
}

}else{
$message="Invalid Username or Password";
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Account</title>
<link rel="stylesheet" type="text/css" href="sign.css">
</head>

<body>

<header>
<a href="index.html" class="home-btn">Home</a>
</header>

<div class="container">

<?php if($message!=""){ ?>
<div class="message"><?php echo $message; ?></div>
<?php } ?>

<input type="radio" name="tab" id="signin" <?php if(isset($showSignin)) echo "checked"; ?>>
<input type="radio" name="tab" id="signup" <?php if(!isset($showSignin)) echo "checked"; ?>>

<div class="tabs">
<label for="signin">Sign In</label>
<label for="signup">Sign Up</label>
</div>

<div class="forms">

<form class="signin-form" method="POST">
<h2>Sign In</h2>
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit" name="signin">Sign In</button>
</form>

<form class="signup-form" method="POST">
<h2>Create Account</h2>
<input type="text" name="username" placeholder="Username" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit" name="signup">Sign Up</button>
</form>

</div>

</div>

</body>
</html>
```
