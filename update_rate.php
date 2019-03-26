<?php

$conn = mysqli_connect("localhost","root","","jewelleryshop");

 if(!$conn ) {
      die('Could not connect');
   }

if(isset($_POST["Rgold"]) && isset($_POST["Rsilver"]) && isset($_POST["Rplatinum"])){

$Rgold=$_POST["Rgold"];
$Rsilver=$_POST["Rsilver"];
$Rplatinum=$_POST["Rplatinum"];

echo $Rgold;
echo $Rsilver;
echo $Rplatinum;

//$conn=mysqli_connect('localhost','root','','jewelleryshop');

 //if(!$conn ) {
  //    die('Could not connect');
  // }

   $sql= " UPDATE rate SET Rgold = '$Rgold', Rsilver = '$Rsilver',Rplatinum = '$Rplatinum' WHERE id = 1 ";


   $retval = mysqli_query( $conn, $sql);

   if(! $retval) {
      die('Could not enter data');
   }


 $row = mysqli_fetch_array($retval, MYSQLI_BOTH);

   mysqli_close($conn);

		header("Location: rates.php");

}
?>
