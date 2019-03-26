<?php
session_start();
include('config.php');

if(isset($_POST['admlogin']))
{
	$u = $_POST['admname'];
	$pass = $_POST['admpass'];
	$_SESSION['admin']=$u;
	$p = md5($pass);
	$q = "SELECT * FROM admin WHERE auser='$u' AND apass='$p'";
	$cq = mysqli_query($con,$q);
	$ret = mysqli_num_rows($cq);
	if($ret == true)
	{
		header('location:backend.php');
	}
	else
	{
		echo "<script>alert('Wrong Login Details, Try Again!')</script>";
	}
}
?>
<div align="center">
<form method="post">
<table width="1067" height="493" border="1">
  <tbody>
    <tr>
      <td width="1057" height="59" bgcolor="#4D4C94"><center>
        <h1><strong style="color: #FFFFFF">ADMINISTRATOR  LOGIN</strong></h1>
      </center></td>
    </tr>
    <tr>
      <th height="426" bgcolor="#969BEF">
      <fieldset style="display:inline-flex"><legend><font size="+1">Backend Login</font></legend><p>Username : <input type="text" name="admname" placeholder="Admin Username">
      <p>Password : <input type="password" name="admpass" placeholder="Admin Password">
      <p><input type="submit" value="Login" name="admlogin">&nbsp;<input type="reset" value="Reset"></p></fieldset>
      </th>
    </tr>
  </tbody>
</table>
</form>
</div>
