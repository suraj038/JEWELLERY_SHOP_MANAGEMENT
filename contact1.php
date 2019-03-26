<!-- <?php

// include("config1.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewelleryshop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn) {
  // code...
  echo "done";
}


$name=$_POST['name'];
$city=$_POST['city'];
$email=$_POST['email'];
$msg=$_POST['message'];

echo $name;

echo $msg;

inserting data to table
$query=mysqli_query($db_connect,"INSERT into contact(Name,City,Email,Message) VALUES ('$name', '$city', '$email', '$msg')") or die(mysqli_error($db_connect));

mysqli_close($db_connect);
// header("location: contact.php?note=success");

echo "done";


 ?> -->
