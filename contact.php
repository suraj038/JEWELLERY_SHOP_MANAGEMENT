<?php

      include("config1.php");
      //$note=$_POST['note'];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>JewelStore | Contact</title>
    <link rel="stylesheet" href="css/flexboxgrid.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!-- HEADER -->
    <header id="main-header">
      <div class="container">
        <div class="row end-sm end-md end-lg center-xs middle-xs middle-sm middle-md middle-lg">
          <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
            <h1><span class="primary-text">Jewel</span>Store</h1>
          </div>
          <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
            <nav id="navbar">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="login.php">SignIn / SignUp</a></li>
                <li class="current"><a href="contact.html">Contact</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <!-- SUBHEADER -->
    <section id="subheader">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1>Contact</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- MAIN PAGE -->
    <section id="page" class="contact">
      <div class="container">
        <div class="row center-xs center-sm center-md center-lg">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2><span class="primary-text">Get</span> In Touch</h2>
            <p>Please use this form to contact us</p>

            <!-- <?PHP if($note=='success')
            {
              echo "<h1> Form Submitted Successfully</h1>";
            }
            ?> -->
            <form action="contact2.php" method="POST">
              <div>
                <label for="name">Name</label><br>
                <input type="text" name="name">
              </div>
              <div>
                <label for="city">City</label><br>
                <input type="text" name="city">
              </div>
              <div>
                <label for="email">Email</label><br>
                <input type="text" name="email">
              </div>
              <div>
                <label for="message">Message</label><br>
                <textarea name="message"></textarea>
              </div>
              <button type="submit" name="button">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- COMPANY -->
    <section id="company">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <h4>Contact Us</h4>
            <ul>
              <li><i class="fa fa-phone"></i>  (+91)8050905044</li>
              <li><i class="fa fa-envelope"></i> surajsingh98450@gmail.com</li>
              <li><i class="fa fa-map"></i> BIET  DAVANGERE</li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <h4>About Us</h4>
            <p>Just a Beginer</p>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <h4>Newsletter</h4>
            <!-- <p>Lorem ipsum dolor sit amet</p> -->
            <form>
              <input type="text" name="email" placeholder="Enter Email">
              <button type="submit" name="button">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer id="main-footer">
      <div class="container">
        <div class="row center-xs center-sm center-md center-lg">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p>Copyright &copy; 2018 | JewelStore</p>
          </div>
        </div>
      </div>
    </footer>

  </body>
</html>
