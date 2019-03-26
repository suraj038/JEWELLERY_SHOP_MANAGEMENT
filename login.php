<?php

session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'jewelleryshop');
if ($db) {
  // code..
  //echo "connected";
}



if (!empty($_POST['username'])) {
  // code...
$username = $_POST['username'];
$password = $_POST['password'];

// echo $username;
// echo $password;
  if($username =='admin' && $password=='admin'){
      header('location: login1.php');
  }



  // if (count($errors) == 0) {
    // $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
        echo "<script>alert('Login completed!'); location.href='Cart.php';</script>";
    //  header('location: index5.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  // }
}






 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style5.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>

  <form method="post" action="login.php">



  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username"   required>
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" required>
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
      	<!-- <button type="submit" class="btn" name="login_user1">delete</button> -->
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>
