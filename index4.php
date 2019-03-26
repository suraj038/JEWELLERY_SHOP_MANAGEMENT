<?php
include('config1.php');
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add to Cart</title>

<link rel="stylesheet" href="css/style2.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Rubik" rel="stylesheet">
<style>
a{text-decoration:none; color:inherit}
#undr{width:100%; height:580px; position:absolute; top:75px; left:0px;}
.bdimg{width:100%; height:100%}
#lowrbdy{ position:absolute; top:90px; left:0px;width:100%; height:100px}
.outer{width:270px; height:270px; background:rgba(255,255,255,0.8); float:left; margin-left:55px; margin-bottom:10px}
.imgdv{width:100px;height:140px;margin:10px auto;}
.imgdv img{width:100%; height:100%}
.pname{ text-align:center; width:100%; height:20px; font-size:15px; margin-top:-14px; margin-bottom:10px}
.prs{ text-align:center; font-size:24px; margin:0px}
.butndv{width:140px; height:40px; margin:auto; margin-top:-10px}
.butn{width:100%; height:100%; background:rgba(78,172,240,1.00); border:none; color:#fff; font-size:18px; border-radius:6px}
.outer:hover{ background:#fff}
.outer:hover .butn{ background:#4A7FDC; transition:all 0.2s ease-in-out; cursor:pointer}
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

    <div id="lowrbdy">
<?php
$sql = "SELECT * FROM `itemdetails`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";


?>
	    <a href="view.php?product=<?=$row["Iid"]?>">
        	<div class="outer">
           		<div class="imgdv"><img src="imeg/<?=$row["pro_image"]?>"/></div>
                <div class="pname"><?=$row["Icategory"]?></div>
                <p class="prs">Rs. <?=$row["price"]?>/-</p></br>
	    	    <div class="butndv"><input type="button" value="Buy Now" class="butn"></div>
			</div>
		</a>
<?php
}
}
?>

    </div>
</body>
</html>
