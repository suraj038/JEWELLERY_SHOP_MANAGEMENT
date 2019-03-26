<?php
  $Sid;
  $Sname;
  $Saddress;
  $Sphoneno;
  $Sdate;

if(isset($_POST["suppid"])){
$suppid=$_POST["suppid"];
$conn=mysqli_connect('localhost','root','','jewelleryshop');
 if(!$conn ) {
      die('Could not connect');
   }
   //$sql1=" SELECT Sid,Sname,Saddress,Sphoneno,Sdate FROM supplierdetails WHERE Sid=$suppid ";
   $result = mysqli_query( $conn, " SELECT Sid,Sname,Saddress,Sphoneno,Sdate FROM supplierdetails WHERE Sid='$suppid' " );

  if(!$result)
  { echo "<h4>Error</h4>";
    echo("Failed");
  }
   $retval1=mysqli_fetch_assoc($result);
   if( $retval1 < 1){
    echo "No item found ";
     echo "<h4>Error 2</h4>";
   }
  else
  {
    $Sid=$retval1['Sid'];
    $Sname=$retval1['Sname'];
    $Saddress=$retval1['Saddress'];
    $Sphoneno=$retval1['Sphoneno'];
    $Sdate=$retval1['Sdate'];
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
<font color="orange" size="10"><b align="center"><pre>    J E W E L L E R S</pre></b></font>
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
<form method="post" action="add_supplier.php">
  <h3 class="colors">Add Supplier Information :-</h3>
<br>
    <table>
       <tr>
      <td>supplier id</td>
      <td><input type="text" name="Sid" placeholder="Supplier Id" required></td>
    </tr>
      <tr>
      <td>supplier Name</td>
      <td><input type="text" name="Sname"  placeholder="" required></td>
    </tr>
    <tr>
      <td>supplier Address</td>
      <td><input type="text" name="Saddress"   placeholder="" required></td>
    </tr>
    <tr>
      <td>supplier Phone no</td>
      <td><input type="text" name="Sphoneno" placeholder="" required></td>
    </tr>
    <tr>
      <td>supplier Date</td>
      <td><input type="date" name="Sdate" placeholder="" required></td>
    </tr>
  </table>
  <input type="submit" value="submit">
</form>

<form method="post" action="supplier.php">
<h2 class="colors">  Check supplier Details :- <input type="text" name="suppid" placeholder="Supplier ID"><input type="submit" value="submit"></h2>
</form>
<table>
  <tr>
    <td>Supplier id</td>
    <td>Supplier Name</td>
    <td>Supplier Address</td>
    <td>Supplier Phone no</td>
    <td>Supplier Date</td>
  </tr>
  <tr>
    <td><input type="text" name="Sid" value="<?php if(isset($_POST["suppid"])){ echo "$Sid"; } ?>" ></td>
    <td><input type="text" name="Sname" value="<?php if(isset($_POST["suppid"])){ echo "$Sname"; } ?>" ></td>
    <td><input type="text" name="Saddress" value="<?php if(isset($_POST["suppid"])){ echo "$Saddress"; }?>"></td>
    <td><input type="text" name="Sphoneno" value="<?php if(isset($_POST["suppid"])){ echo "$Sphoneno"; }?>"></td>
    <td><input type="date" name="Sdate" value="<?php if(isset($_POST["suppid"])){ echo "$Sdate"; }?>"></td>
  </tr>

</table>

</body>
</html>
