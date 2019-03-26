<?php
echo "login_auth";
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'jewelleryshop');
if ($db) {
  // code...
  echo "connect";
}


if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // if (empty($username)) { array_push($errors, "Username is required"); }
   //if (empty($password)) { array_push($errors, "Password is required"); }




  if (!empty($_POST['username'])) {
    // code...
echo $username;
echo $password;





      // $password = md5($password);
      // $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

      $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      $result = mysqli_query($db, $sql);

      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            echo "inside while loop";
            echo $username;

              $_SESSION['username'] = $username;
              $_SESSION['success'] = "You are now logged in";
               header('location: Cart.php');
               echo $row["email"];
          }
      }

      if($username =="admin" && $password=="admin"){
           header('location: login1.php');
           echo "admin side";
      }




      // $results = mysqli_query($db, $query);
      // if (mysqli_num_rows($results) == 1) {
      //   $_SESSION['username'] = $username;
      //   $_SESSION['success'] = "You are now logged in";
      //   header('location: index5.php');
      // }else {
      //   array_push($errors, "Wrong username/password combination");
      // }

  }

}






 ?>
