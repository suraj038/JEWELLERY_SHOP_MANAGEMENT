<?php
session_start();
//connectivity
require('../config.php');
if($_SESSION['admin']=="")
{
	header('location:admin.php');
}
else
{

//logout
if(isset($_POST['logout']))
{
	header('location:adminlogout.php');
}


//header marquee
if(isset($_POST['m1save']))
{
	$marquee = $_POST['marquee1'];
	$query = "UPDATE admin SET marquee1='$marquee' WHERE  id=1";
	mysqli_query($con,$query);
	$confirm ="<b style='color:red'>Page Saved</b>";
}

//colg name
if(isset($_POST['cnsave']))
{
	$cname = $_POST['colgname'];
	$query2 = "UPDATE admin SET colgname='$cname' WHERE id=1";
	mysqli_query($con,$query2);
	$confirm2 = "<b style='color:red'>Page Saved</b>";
}

//colg intro
if(isset($_POST['intsave']))
{
	$intro = $_POST['colgintro'];
	$query3 = "UPDATE admin SET colgintro='$intro' WHERE id=1";
	mysqli_query($con,$query3);
	$confirm3 = "<b style='color:red'>Page Saved</b>";
}

//footer info
if(isset($_POST['footersave']))
{
	$footer = $_POST['footerinfo'];
	$query4 = "UPDATE admin SET footerinfo='$footer' WHERE id=1";
	mysqli_query($con,$query4);
	$confirm4 = "<b style='color:red'>Page Saved</b>";
}

//about page
if(isset($_POST['aboutsave']))
{
	$abouthead = $_POST['abouthead'];
	$aboutinfo = $_POST['aboutinfo'];
	$query5 = "UPDATE admin SET abouthead='$abouthead' WHERE id=1";
	$query6 = "UPDATE admin SET aboutinfo='$aboutinfo' WHERE id=1";
	mysqli_query($con,$query5);
	mysqli_query($con,$query6);
	$confirm5 = "<b style='color:red'>Page Saved</b>";
}
?>
<div align="center">
<form method="post">
<table width="1023" height="628" border="1">
  <tbody>
    <tr>
      <td colspan="2" bgcolor="#5D5CEC"><center><font size="+2"><strong style="color: #FFFFFF">Administrator Control Panel</strong></font></center><div align="right">
	  <a href="adminlogout.php">
	  <input type="submit" value="Logout" name="logout"></div>
	  </a>	  </td>
    </tr>
    <tr>
      <td width="323" height="543">
      <center><p><b>[ Content of Header Marquee ]</b>
      <textarea placeholder="Input Marquee for the header of the Page!" name="marquee1"></textarea><br>
      <input type="submit" value="Save" name="m1save"><br><?php echo $confirm; ?>
      </p></center><br>
      <p><center><b>Change College Name : </b><br>
      <input type="text" placeholder="College Name" name="colgname" size="50"><input type="submit" value="Save" name="cnsave"><br><?php echo $confirm2; ?></center></p><br>
      <center><p><b>Change College Intoduction</b><br>
      <textarea placeholder="Input Introduction for College" name="colgintro"></textarea><br>
      <input type="submit" value="Save" name="intsave"><br><?php echo $confirm3; ?></p></center><br>

	  <center><p><b>Change Footer</b><br>
      <input type="text" placeholder="copyright information etc," name="footerinfo" size="50"><br>
      <input type="submit" value="Save" name="footersave"><br><?php echo $confirm4; ?></p></center>      </td>
      <td width="684" valign="top">


	  <p><center><b>Edit "About" Page</b><br><br>
      Page Heading : <input type="text" placeholder="heading" name="abouthead" size="30"><br><br>
     [ Page Content ]<br>
      <textarea placeholder="Input Content" name="aboutinfo"></textarea><br>
      <input type="submit" value="Save" name="aboutsave"><br><?php echo $confirm5; ?></p></center>      </td>
      </tr>
  </tbody>
</table>
</form>
</div>
<?php
}
?>
