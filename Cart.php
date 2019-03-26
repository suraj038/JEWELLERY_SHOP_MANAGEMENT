<?php
         session_start();

      $con=mysqli_connect("localhost","root","","jewelleryshop");

         if(isset($_POST["add"])){
           if(isset($_SESSION["cart"])){
             $item_array_id = array_column($_SESSION["cart"], 1);
             if(! in_array($_GET["id"],$item_array_id)){
               $count = count($_SESSION["cart"]);
               $item_array = array(
                 'product_id' => $_GET["id"],
                 'item_name' => $_POST["hidden_name"],
                 'product_price' => $_POST["hidden_price"],
                 'item_quantity' => $_POST["quantity"],
               );
               $_SESSION["cart"][$count] = $item_array;
               echo  '<script>window.location="Cart.php"</script>';
             }else{
                     echo '<script>alert("Product is already Added to Cart")</script>';
                     echo '<script>window.location="Cart.php"</script>';
             }
           }else{
             $item_array = array(
               'product_id' => $_GET["id"],
               'item_name' => $_POST["hidden_name"],
               'product_price' => $_POST["hidden_price"],
               'item_quantity' => $_POST["quantity"],
             );
             $_SESSION["cart"][0] = $item_array;
           }
         }
         if(isset($_GET["action"])){
           if($_GET["action"] == "delete"){
             foreach($_SESSION["cart"] as $keys => $value){
               if($value["product_id"] == $_GET["id"]){
                 unset($_SESSION["cart"][$keys]);
                 echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
               }
             }
           }
         }
 ?>

<!doctype html>
<html>
<head>
      <meta charset="UTF-8">
      <meta name="viewport"
                 content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible"  content="ie=edge">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <div class="header">
      <title>Shopping Cart</title>
    </div>

      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

      <style>
             @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

             *{
             	margin:0px;
             	padding:0px;
             }

             .bgimage{
             	background-image: url('header.jpg');
             	background-size: 100% 110%;
             	width: 100%;
             	height: 100vh;
             }

             .menu{

             	width: 100%;
             	height: 100px;
             	background-color: rgba(0,0,0,0.5);
             }

             .leftmenu{
             	width: 30%;
             	line-height: 100px;
             	float: left;
             	/*background-color: yellow;*/
             }

             .leftmenu h4{
             	padding-left: 70px;
             	font-weight: bold;
             	color: orange;
             	font-size: 40px;
             	font-family: 'Montserrat', sans-serif;
             }


             .rightmenu{
             	width:70%;
             	height: 100px;
             	float: right;
             /*	background-color: red; */
             }

             .rightmenu ul{
             	margin-left: 400px;
             }

             .rightmenu ul li {
             	font-family: 'Montserrat', sans-serif;
             	display: inline-block;
             	list-style: none;
             	font-size: 20px;
             	color:white;
             	font-weight: bold;
             	line-height: 100px;
             	margin-left: 30px;
             	text-transform: uppercase;

             }

             #fisrtlist{
             	color: orange;
             }

             .rightmenu ul li:hover{
             	color: orange;
             }

             .text{
             	width: 100%;
             	margin-top: 150px;
             	text-transform: uppercase;
             	text-align: center;
             	color: orange;
             }

             .text h4{

             	font-size: 10px;
             	font-family: 'Open Sans', sans-serif;
             }

             .text h1{
             	font-size:70px;
             	font-family: 'Montserrat', sans-serif;
             	font-weight: 100px;
             	margin:14px 0px;
             }

             .text h3{
             	font-size: 20px;
             	font-family: 'Open Sans', sans-serif;
             }

             #buttonone{
             	background-color: orange;
             	border: none;
             	font-size: 15px;
             	font-weight: bold;
             	text-transform: uppercase;
             	line-height: 40px;
             	width: 150px;
             	font-family: 'Montserrat', sans-serif;
             	margin-top: 25px;
             	border: 3px solid white;
             }

             #buttontwo{

             	background-color: orange;
             	border: none;
             	font-family: 'Montserrat', sans-serif;
             	text-transform: uppercase;
             	font-weight: bold;
             	line-height: 40px;
             	border: 3px solid white;
             	width: 150px;
             }


             .product{
                    border: 1px solid #eaeaec;
                    margin: -1px 19px 3px -1px;
                    padding: 10px;
                    text-align: center;
                    background-color: #efefef;
                    }
                    table, th, tr{
                      text-align: center;
                    }
                    .title2{
                      text-align: center;
                      color: #66afe9;
                      background-color: #efefef;
                      padding: 2%;
                    }
                    h2{
                      text-align: center;
                      color: #66afe9;
                      background-color: #efefef;
                      padding: 2%;
                    }
                    table th{
                      background-color: #efefef;
                    }
                    .pic{
                      width: 400px;
                      height: 225px;
                    }
                    .picbig{
                      position: absolute;
                      width: 0px;
                      -webkit-transition: width 0.3s linear 0s;
                      transition: width 0.3s linear 0s;
                      z-index: 50;
                    }
                    .pic:hover + .picbig{
                      width: 500px;
                    }
                    .zoomImage{
                      width:500px;
                      height: 250px;
                      overflow: hidden;
                      text-align: center;
                    }
                    img{
                      max-width: 100%;
                      max-height: 100%;
                      transition: 0.75s;
                    }
                    .zoomImage:hover img{
                      transform: scale(1.3);
                    }
      </style>
</head>
<body>
  <div class="bgimage">
    <div class="menu">

      <div class="leftmenu">
        <h4> SHOPPING CART </h4>
      </div>

      <div class="rightmenu">
        <ul>
          <li id="fisrtlist"> HOME </li>
          <li > <a href="index1.html" style="text-decoration: none; text-color:white;">GALLERY </a></li>
          <li><a href="login.php" style="text-decoration: none; text-color:white;">LOGOUT </a></li>
          <!-- <li><a href="contact.php" style="text-decoration: none; text-color:white;">CONTACT US </a></li> -->


        </ul>
      </div>
</div>
<div class="text">
  <h2> DESIGN • DEVELOPMENT • BRANDING </h2>
  <h1> SHOPPING CART  </h1>
  <h2> JEWELLERY SHOPPING</h2>
  <button id="buttonone"> like share </button>
  <button id="buttontwo"> Subscribe </button>
</div>
    </div>

            <?php
                     $query = "SELECT * FROM product ORDER BY id ASC";
                     $result = mysqli_query($con,$query);
                     if(mysqli_num_rows($result) > 0) {

                       while ($row = mysqli_fetch_array($result)) {
            ?>
      <div class="col-sm-12">

                  <form method="post"  action="Cart.php?action=add&id=<?php echo $row["id"]; ?>">

                    <div class="product col-sm-6/2">
                      <div class="zoomImage">


                        <a href="index4.php">
                          <img class="pic" src="<?php echo $row["image"]; ?>" class="img-responsive" height="200px" width="200px">
                            <img class="picbig" src="<?php echo $row["image"]; ?>" class="img-responsive" height="200px" width="200px">
                        </a>


                      </div>
                             <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
                            <h5 class="text-danger"> &#8377 <?php echo $row["price"]; ?> </h5>
                            <h5 class="badge badge-success"> 4.4 <i class="fa fa-star"> </i> </h5>
                            <input type="text" name="quantity" class="form-control" value="1" >
                            <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                              <input type="hidden" name="hidden_price" value=" <?php echo $row["price"]; ?>">
                              <!-- <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="DEMO Cart"> -->
                              <a href="checkout.php" style="margin-top: 10px;" class="btn btn-success">BUY NOW</a>
                        </div>
                 </form>
      </div>
               <?php
             }
        }

     ?>
     <!-- <div style="clear: both"></div>
     <h3 class="title2">Shopping Cart Details</h3>
     <div class="table-responsive">
             <table class="table table-bordered">
              <tr>
                    <th width="30%">Product Name</th>
                    <th width="10%">Quantity</th>
                    <th width="13%">Price Details</th>
                    <!-- <th width="10%">Total Price</th> -->
                    <th width="17%">Remove Item</th>
              </tr> -->
              <?php
                      if(!empty($_SESSION["cart"])) {
                              $total = 0;
                              foreach($_SESSION["cart"] as $key => $value){
                                    ?>
                    <tr>
                               <td><?php echo $value["item_name"]; ?></td>
                               <td><?php echo $value["item_quantity"]; ?></td>
                               <td>&#8377 <?php echo $value["product_price"]; ?></td>

                               <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>

                    </tr>
                    <?php
                          //   $total = $total + ($value["item_quantity"] * $value["product_price"]);
                           }
                     ?>
                     <tr>
                            <!-- <td colspan="3" align="right">Total</td> -->

                            <td></td>

                     </tr>
                     <?php
                   }
                      ?>
                    </table>
      </div>

          </div>
</body>
</html>
