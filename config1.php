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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
