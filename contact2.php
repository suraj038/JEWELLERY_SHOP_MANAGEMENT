<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jewelleryshop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn) {
  // code...
  // echo "done";
}


$name=$_POST['name'];
$city=$_POST['city'];
$email=$_POST['email'];
$msg=$_POST['message'];

// echo $name;
//
// echo $msg;



$query=mysqli_query($conn,"INSERT into contact(Name,City,Email,Message) VALUES ('$name', '$city', '$email', '$msg')") or die(mysqli_error($db_connect));

mysqli_close($conn);

// header("location: contact.php");
echo "<script>alert('Data Insered!'); location.href='contact.php';</script>";

// echo "done";


 ?>
