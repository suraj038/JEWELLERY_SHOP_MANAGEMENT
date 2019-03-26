<!doctype html>
<html>
<head>
<?php
include('config1.php');
$productid=$_GET['product'];
echo "$productid";
?>
<meta charset="utf-8">
<title>View Product <?=$productid?></title>
<link rel="stylesheet" href="css/style2.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Rubik" rel="stylesheet">
<style>
#undr{width:100%; height:580px; position:absolute; top:75px; left:0px;}
.bdimg{width:100%; height:100%}
.big-outer{ width:80%; height:100%; background:rgba(255,255,255,0.7); margin:auto}
.big-outer p{text-align:center; font-size:40px; margin:10px auto}
.outer{ width:270px; height:310px;  margin:auto;}
.outer img {width:88% !important;}
.price{text-align:center; margin:20px auto; background:#16B472; color:#fff; width:30%; padding:5px 0px;}
.price p{margin:0px; font-size:26px;}
.buy{text-align:center; margin:20px auto; background:#3E8BDC; width:34%; padding:5px 0px; cursor:pointer}
.buy:hover{ background:#2E5AE4;transition:all 0.4s ease-in-out}
#subaz{border:none; background-color:transparent; font-size:32px; color:#fff; font-weight:bold; cursor:pointer}
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
$sql="SELECT * FROM `itemdetails` WHERE Iid=$productid";

// $sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
			?>



<form id="form1" name="form1" method="post" action="cart1.php">
<input type="hidden" name="pid" id="pid" value="<?php echo $row["Iid"]?>" />
    <div id="lowrbdy">
		<div class="big-outer">
        	<div class="outer">
            	<img src="imeg/<?php echo $row["pro_image"]?>"/>
            </div>
            <p><?php echo $row["Icategory"]?></p>
            <div class="price"><p>Rs. <?php  echo $row["price"]?>/-</p></div>
            <div class="buy"><input type="submit" id="subaz" value="Buy Now"/></div>
        </div>
    </div>
</form>




<?php
}
}


 ?>
</body>
</html>
