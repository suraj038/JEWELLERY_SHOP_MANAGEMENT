<?php
       require 'config1.php';
        $sql="CALL `getitemdetails`();";


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
        background:#6A89CC ;
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
            <th> Iid</th>
            <th>Itype</th>
            <th>Icategory</th>
              <th>date</th>
              <th>pro_image</th>
              <th>price</th>


        </tr>
        <?php
        while($jewelleryshop=mysqli_fetch_assoc($records))
        {
            echo "<tr>";
            echo "<td>".$jewelleryshop['Iid']."</td>";
            echo "<td>".$jewelleryshop['Itype']."</td>";
            echo "<td>".$jewelleryshop['Icategory']."</td>";
            echo "<td>".$jewelleryshop['date']."</td>";
            echo "<td>".$jewelleryshop['pro_image']."</td>";
            echo "<td>".$jewelleryshop['price']."</td>";


           echo" </tr>";


        }
        ?>
    </table>
         <form name="record" action="procedure.php" width="100px" >
              <a href="login1.php"><input type="button" name="button" value="back" class="button"/></a>
        </form>
        </center>

</html>
