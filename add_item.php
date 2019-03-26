<?php

if(isset($_POST["Iid"]) && isset($_POST["Iweight"]) && isset($_POST["Itype"]) && isset($_POST["Icategory"]) && isset($_POST["Icopies"]) && isset($_POST["Idate"])){

$Iid=$_POST["Iid"];
$Iweight=$_POST["Iweight"];
$Itype=$_POST["Itype"];
$Icategory=$_POST["Icategory"];
$Icopies=$_POST["Icopies"];
$Idate=$_POST["Idate"];
$pro_image = $_POST["pro_image"];
$price = $_POST["price"];
echo "$Idate";
echo "$Icategory";
$conn=mysqli_connect("localhost","root","","jewelleryshop");

 if(!$conn ) {
      die('Could not connect');
   }

   $sql1=" SELECT Iid FROM itemdetails WHERE Iid='$Iid'";
   $result = mysqli_query( $conn, $sql1 );
   $retval1=mysqli_fetch_assoc($result);
   if( $retval1 > 0 ){
   	echo "Item already exist";
   	header ("Location: items.php");
   }
   else
   {
	// $sql= "INSERT into 'itemdetails' ('Iid','Iweight','Itype','Icategory','Imc','Icopies','Idate') VALUES('$Iid','$Iweight','$Itype','$Icategory','$Itype','$Icopies','$Idate') ";
  $sql = "INSERT INTO `itemdetails` (`Iid`, `Iweight`, `Itype`, `Icategory`, `no_of_items`, `date`,`pro_image`,`price`) VALUES ('$Iid', '$Iweight', '$Itype', '$Icategory', '$Icopies', '$Idate','$pro_image','$price');";
   $retval = mysqli_query( $conn, $sql );

   if(! $retval) {
      die('Could not enter data');
   }
   else {
     echo "data Insert";
     echo "<script>alert('Item Inserted!'); location.href='items.php';</script>";
   }

   // header("Location: items.php");
}
mysqli_close($conn);
}
?>
