<?php
       require 'config1.php';
       $sql="SELECT * FROM `registration_update`";


        $records=mysqli_query($conn,$sql);
    ?>
<!DOCTYPE html>
<head>
<style>
            .button
            {
                width:200px;
                height:50px;

                margin-top:100px;
                background: #192A56;
            }

    #table1
    {
        background: #6A89CC;
    }
    </style>
    </head>

<html>
    <head><title> record4</title >
        </head>
    <body background="Images/bg.jpg"></body>
    <center>
    <table width="600px" border="1" callpadding="1" callspacing="1" id="table1">
        <tr>
            <th> Username</th>
            <th>Email</th>
            <th>Password</th>
              <th>update_status</th>
              <th>registration_time</th>
              <!-- <th>price</th> -->


        </tr>
        <?php
        while($jewelleryshop=mysqli_fetch_assoc($records))
        {
            echo "<tr>";
            echo "<td>".$jewelleryshop['Username']."</td>";
            echo "<td>".$jewelleryshop['Email']."</td>";
            echo "<td>".$jewelleryshop['Password']."</td>";
            echo "<td>".$jewelleryshop['update_status']."</td>";
            echo "<td>".$jewelleryshop['registration_time']."</td>";
            // echo "<td>".$jewelleryshop['price']."</td>";


           echo" </tr>";


        }
        ?>
    </table>
         <form name="record" action="trigger.php" width="100px" >
              <a href="login1.php"><input type="button" name="button" value="back" class="button"/></a>
        </form>
        </center>

</html>
