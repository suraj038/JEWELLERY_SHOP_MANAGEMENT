<?php

if(isset($_POST["username"]) && isset($_POST["password"])){

$username=$_POST["username"];

$conn=mysqli_connect('localhost','root','','jewelleryshop');

 if(!$conn ) {
      die('Could not connect');
   }
   
   $sql = 'SELECT username, password FROM users WHERE username="'.$username.'"';


      
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval) {
      die('Could not enter data');
   }
   
  
 $row = mysqli_fetch_array($retval, MYSQLI_BOTH);

      
      $uname=$row[0];
      $pass=$row[1];
    

   mysqli_close($conn);


if($_POST["username"]==$uname && $_POST["password"]==$pass){

session_start();
$_SESSION["user"] = $uname;
		header("Location: login1.php");

}else{
      header("Location: login.php");
   
die();
}}
?>