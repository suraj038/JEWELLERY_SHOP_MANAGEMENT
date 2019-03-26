<!doctype html>
<html>
<head>
<?php
include('config1.php');
$productid=$_GET['product'];
?>
<meta charset="utf-8">
<title>Cart</title>
<link rel="stylesheet" href="css/style2.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Rubik" rel="stylesheet">
<style>
#undr{width:100%; height:580px; position:absolute; top:75px; left:0px;}
.bdimg{width:100%; height:100%}
.big-outer{ width:80%; height:100%; background:rgba(255,255,255,0.7); margin:auto}
.big-outer p{ font-size:60px; text-align:center; margin:0px;}
.upper-details{background:#EFEFEF;}
.upper-details td{text-align:center;}
td{text-align: center;}
#emptycart{font-size:20px;margin-bottom:15px;color:#111; float:right}
#emptycart:hover{ color:#fff}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>
	<header>
		<?php
			include('head.php');
		?>
	</header>

<div id="undr">
		<img class="bdimg" src="bg.jpg">
	</div>
<?php
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	if (!isset($_SESSION["cartshop"]) || count($_SESSION["cartshop"]) < 1) {
		$_SESSION["cartshop"] = array(0 => array("item_id" => $pid, "quantity" => 1));
	} else {
		foreach ($_SESSION["cartshop"] as $each_item) {
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  array_splice($_SESSION["cartshop"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  }
		      }
	       }
		   if ($wasFound == false) {
			   array_push($_SESSION["cartshop"], array("item_id" => $pid, "quantity" => 1));
		   }
	}
	header("location: cart1.php");
    exit();
}
?>
<?php
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cartshop"]);
}
?>
<?php
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity);
	if ($quantity >= 11) { $quantity = 10; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cartshop"] as $each_item) {
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  array_splice($_SESSION["cartshop"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  }
		      }
	}
}
?>
<?php
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cartshop"]) <= 1) {
		unset($_SESSION["cartshop"]);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		unset($_SESSION["cartshop"]["$key_to_remove"]);
		sort($_SESSION["cartshop"]);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}
?>
    <div id="lowrbdy">
	  <div class="big-outer">
   		<p style="text-decoration:underline">Cart</p>
<table width="100%" border="0" style="border-collapse:collapse">
<?php
if(isset($_SESSION['cartshop'])==!NULL){
?>
  <tbody>
    <tr class="upper-details">
      <td height="36" colspan="2" style="border-right: 1px solid #000;">Item</td>
      <td width="16%" style="border-right: 1px solid #000;">Quantity</td>
      <td width="16%" style="border-right: 1px solid #000;">Unit Price</td>
      <td width="21%">Sub Total</td>
    </tr>
<?php
}
?>
<?php
$cartTotal = "";
if (!isset($_SESSION["cartshop"]) || count($_SESSION["cartshop"]) < 1) {
    echo '<div class="empty-cart"><h2 class="crta">Your Shopping Cart Is Empty</h2>';
	echo '<br><a href="index4.php"><h2 class="alink">Continue Shopping</h2></a></div>';
} else {
$i = 0;
    foreach ($_SESSION["cartshop"] as $each_item) {
		$item_id = $each_item['item_id'];
		// $sql = mysql_query("SELECT * FROM product WHERE id='$item_id' LIMIT 1");
		$sql = "SELECT * FROM `itemdetails` WHERE Iid=$item_id LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

				$productname = $row["Icategory"];
				$producttotalprice = $row["price"];
				$productcode = $row["Iid"];
				$pic=$row['pro_image'];
				// $pdelc=$row['pdelc'];
				$pr=$row['price'];
    }
}
		$cartTotal = $cartTotal;
		$producttotalpricetotal = $producttotalprice * $each_item['quantity'];
		$cartTotal = $producttotalpricetotal + $cartTotal;
echo'<tr>
      <td width="7%" rowspan="3" style="border-bottom: 2px solid #000; height:100px"><img src="imeg/'.$pic.'"/></td>
      <td width="29%" height="21" style="border-right: 1px solid #000;">&nbsp;</td>
      <td rowspan="2" style="border-right: 1px solid #000;">
		  <form action="cart1.php" method="post">
		  	<input name="quantity" id="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" class="qnttxt"/></br>
			<input id="adjustBtn" name="adjustBtn' . $item_id . '" type="submit" value="Update" class="qntbtn"/>
			<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
		  </form>
	  </td>
      <td style="border-right: 1px solid #000;">&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    <tr style="border-bottom: 2px solid #000;">
      <td style="border-right: 1px solid #000;">'.$productname.'</td>
      <td style="border-right: 1px solid #000;">Rs. '.number_format($producttotalprice).'</td>
      <td><p style="float:left;margin:0px 0px 0px 20px;font-size:18px;text-decoration:none">Rs. '.number_format($producttotalprice*$each_item['quantity']).'</p>
	  	<form action="cart1.php" method="post">
			<input name="deleteBtn' . $item_id . '" type="submit" value="DELETE" class="removebtn"/>
			<input name="index_to_remove" type="hidden" value="' . $i . '" />
        </form>
	  </td>
    </tr>
    <tr>';
	$i++;
	}
echo'<div style="width:400px; height:40px; background:rgba(100,190,255,1.00); margin:auto; margin-bottom:6px;margin-top:10px">
<p style="font-size:20px;text-align:center; color:#fff; line-height:2em">Cart Total: <strong>Rs. '.number_format($cartTotal).' /-</strong></p></div>
<a href="clear-session.php"><div style="width:55%; height:22px;"><p id="emptycart">( Empty Cart )</p></div></a>
';
}
?>
  </tbody>

<tbody>
	<tr class="upper-details">
	<td height="60" colspan="6" style="border-right: 1px solid #000;"><a href="checkout.php"><strong>BUY NOW</strong></a></td>
</tr>
</tbody>


</table>
        </div>
    </div>
</body>
</html>
