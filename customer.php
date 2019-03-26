<?php
  $Cid;
  $Cname;
  $Caddress;
  $Cphoneno;
  // $Cdate;

if(isset($_POST["Custid"])){

echo $_POST["Custid"];

$Custid=$_POST["Custid"];
$conn=mysqli_connect('localhost','root','','jewelleryshop');
 if(!$conn ) {
      die('Could not connect');
   }
   // $sql1=" SELECT  Cid,Cname,Caddress,Cphoneno FROM customerdetails WHERE Cid='12' ";
   $result = mysqli_query( $conn, " SELECT  Cid,Cname,Caddress,Cphoneno FROM customerdetails WHERE Cid='$Custid' ");
  if(!$result)
  {
    echo("Failed");
  }
   $retval1=mysqli_fetch_assoc($result);
   if( $retval1 < 1){
    echo "No item found ";
   }
  else{
     $Cid=$retval1['Cid'];
    $Cname=$retval1['Cname'];
    $Caddress=$retval1['Caddress'];
    $Cphoneno=$retval1['Cphoneno'];
    // $Cdate=$retval1['Cdate'];
  }
mysqli_close($conn);

}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
/* Add a black background color to the top navigation */
.topnav {
    background-color: #333;
    overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
    background-color: #4CAF50;
    color: white;
}

td{
  color:  orange;
}
.colors{
  color: orange;
}
#back{
  margin-left: 1200px;
}

</style>
</head>
<body background="Images/bg.jpg">
<div>
<font color="orange" size="10"><b align="center"><pre>S U R A J     J E W E L L E R S</pre></b></font>
</div>
<div class="topnav" id="myTopnav">

  <!-- <a href="rates.php">Rates</a> -->
  <a href="billing.php">Billing</a>
  <a href="items.php">Items</a>
  <a href="customer.php">Customer</a>
  <a href="supplier.php">Suppliers</a>
  <a href="aboutus.php">AboutUs</a>
  <div id="back">
    <a href="login1.php">Back</a>
  </div>
</div>
<form method="post" action="add_customer.php">
  <h3 class="colors">Add Customer Information :-</h3>
<br>
    <table>
       <tr>
      <td>Customer id</td>
      <td><input type="text" name="Cid" placeholder="Customer Id" required></td>
    </tr>
      <tr>
      <td>Customer Name</td>
      <td><input type="text" name="Cname"  placeholder="" required></td>
    </tr>
    <tr>
      <td>Customer Address</td>
      <td><input type="text" name="Caddress"   placeholder="" required></td>
    </tr>
    <tr>
      <td>Customer Phone no</td>
      <td><input type="text" name="Cphoneno" placeholder="" required></td>
    </tr>
    <!-- <tr> -->
      <!-- <td>Customer Date</td>
      <td><input type="date" name="Cdate" placeholder="" required></td>
    </tr> -->
  </table>
  <input type="submit" value="submit">
</form>

<form method="post" action="customer.php">
<h2 class="colors">  Check Customer Details :- <input type="text" name="Custid" placeholder="Customer ID"><input type="submit" value="submit"></h2>
</form>
<table>
  <tr>
    <td>Customer id</td>
    <td> Name</td>
    <td> Address</td>
    <td> Phone no</td>
    <!-- <td> Date</td> -->
  </tr>
  <tr>
    <td><input type="text" name="Cid" value="<?php if(isset($_POST["Custid"])){ echo "$Cid"; } ?>" ></td>
    <td><input type="text" name="Cname" value="<?php if(isset($_POST["Custid"])){ echo "$Cname"; } ?>" ></td>
    <td><input type="text" name="Caddress" value="<?php if(isset($_POST["Custid"])){ echo "$Caddress"; }?>"></td>
    <td><input type="text" name="Cphoneno" value="<?php if(isset($_POST["Custid"])){ echo "$Cphoneno"; }?>"></td>

  </tr>

</table>

</body>
</html>
