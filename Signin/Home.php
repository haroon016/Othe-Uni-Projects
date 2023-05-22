<?php 

include ('config.php');
session_start();
error_reporting(0);
        $name = $_POST['name'];
 
        $res = mysqli_query($conn , "SELECT * FROM user WHERE name='$name'")
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <style>
            table ,tr ,th, td{
                border:  2px solid blue;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Signin</title>

    </head>
    <body>
   <br><br>
<form method="post" action="">
	<label> Search by name:</label> 
	<input type="text" name="name" placeholder="Enter Name">
	<input type="submit" name="submit" value="Go"><br><br>
	
</form><br><br>
    <table width="70%">

        <tr>
            <th>Name</th>
            <th>Password</th>

        </tr>
<?php
while($row = mysqli_fetch_assoc($res)){
        echo  "<tr>";
        echo  "<td>$row[name]</td>";
        echo  "<td>$row[password]</td>";

        echo  "</tr>";
}
?>





    </table>

</form>
</body>
</html>

