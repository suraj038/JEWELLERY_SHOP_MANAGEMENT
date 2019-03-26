<?php

$conn = mysqli_connect("localhost","root","","jewelleryshop");

 if(!$conn ) {
      die('Could not connect');
   }


if(isset($_POST["Cid"]) && isset($_POST["Cname"]) && isset($_POST["Caddress"]) && isset($_POST["Cphoneno"]) ){

$Cid=$_POST["Cid"];
$Cname=$_POST["Cname"];
$Caddress=$_POST["Caddress"];
$Cphoneno=$_POST["Cphoneno"];
// $Cdate=$_POST["Cdate"];

echo $Cid ;
echo $Cname;
echo $Caddress;
echo $Cphoneno;
// echo $Cdate ;

// $conn=mysqli_connect('localhost','root','','jewelleryshop');

   $sql1=" SELECT Cid FROM customerdetails WHERE Cid='$Cid'";
   $result = mysqli_query( $conn, $sql1 );
   $retval1=mysqli_fetch_assoc($result);
   echo $retval1;
   if( $retval1 > 0 ){
   	echo "Customer already exist";
   	// header ("Location: customer.php");
   }
   else
   {
	// $sql= "INSERT INTO `customerdetails` (`Cid`, `Cname`, `Caddress`, `Cphoneno`) VALUES (' $Cid ', ' $Cname', '$Caddress', '$Cphoneno');";
  $sql2 = "INSERT INTO `customerdetails` (`Cid`, `Cname`, `Caddress`, `Cphoneno`) VALUES ('$Cid', '$Cname', '$Caddress', '$Cphoneno')";
   $retval = mysqli_query( $conn, $sql2 );

   if(! $retval) {
      die('Could not enter data');
   }
   else {
     echo "customer Insert";
     echo "<script>alert('Customer Inserted!'); location.href='customer.php';</script>";
   }


  // header("Location: customer.php");
}
mysqli_close($conn);
}
?>
