<?php
include('config1.php');
session_start();
?>
<div id="headdown">
	<div class="logo"><a href="index4.php">CART</a></div>
		<div class="srbox">
			  <div class="bk">
              	<input type="text" name="qu" id="qu" class="textbox" placeholder="What are you looking for ?" tabindex="1">
				<button type="submit" class="query-submit" tabindex="2"><i class="fa fa-search" style="color:#727272; font-size:20px"></i></button>
					<!-- <input type="text" name="LOGOUT" class="box" placeholder="LOGOUT"> -->
   	  		  </div>
		</div>

	<div class="acount">
		<div class="aclogo"><i class="fa fa-user" style="color:#fff; font-size:15px; margin-top:2px"></i></div>
		<div class="actext">My Account</div>
	</div>

    	<a href="cart1.php"><div class="cart">
			<i class="fa fa-shopping-cart"></i>
		    <p class="cart-e">Cart</p>
    		<p class="cart-f">
           <!-- <ul>
					    <li><a href="login.php" style="text-decoration: none; text-color:white;">LOGOUT </a></li>
					</ul> -->


	            <?php
					if(isset($_SESSION["cartshop"])){
						$s=count($_SESSION["cartshop"]);
					}
					else{
						$s=0;
						}
					echo $s;
				?>
            </p>
		</div></a>

</div>
 <div class="acount1"><a href="login.php">LOGOUT </a></div>


	

<!-- <div class="acount1">
	<div class="aclogo1"><i class="fa fa-user" style="color:#fff; font-size:15px; margin-top:2px"></i></div>

		<li><a href="login.php" style="text-decoration: none; text-color:white;">LOGOUT </a></li>

</div> -->
