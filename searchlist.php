<?php
include "validation.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search list</title>
</head>
<body>
    
    <div class="navbar">
        <a class="active" href='home.php'>Home</a>
        <a href='search.php'>Search</a>
        <a href='contactus.php'>Contact Us</a>
        <a href='aboutus.php'>About Us</a>
        

        <a style="float:right;" href="logout.php">Log Out</a>
        <strong style="float:right;">
        <?php
            if ($_SESSION['logged_in']==true){
                ?><img src="images/<?php echo $_SESSION["image"]; ?>" alt=""width="20" height="20" style="border-radius: 50%;">
                <?php
                echo $_SESSION['user'];
            }elseif ($_SESSION['logged_in']==false){
                echo 'failed';
            }
        ?>
        </strong>

    </div>

    <h2>Search List:</h2>
    <table style="border-collapse: collapse;" border="i">
        <tr style='font-weight:bold;'>
          <td>Image</td>
          <td>Username</td>
          <td>First Name</td>
          <td>Last Name </td>
          <td>Email</td>
          <td>Country</td>
          <td>State</td>
          <td>City</td>
        </tr>
    <?php
    require_once "db_conn.php";
    $keyword = $_POST['search'];
    $query = "SELECT * FROM `users` WHERE `Username` LIKE '{$keyword}%'";
    $result = mysqli_query($conn, $query);
    //$records = mysqli_query($conn,"select * from users where Username");
    while($data = mysqli_fetch_array($result))
    {
    ?>    
    <tr>
        <td><img src="images/<?php echo $data['Image']; ?>" alt=""width="100" height="100" style="border-radius: 50%;"></td>
        <td><?php echo $data['Username']; ?></td>
        <td><?php echo $data['First Name']; ?></td>
        <td><?php echo $data['Last Name']; ?></td>
        <td><?php echo $data['Email']; ?></td>
        <td><?php echo $data['Country']; ?></td>
        <td><?php echo $data['State']; ?></td>
        <td><?php echo $data['City']; ?></td>
        
    </tr>
    <?php
    }
    ?>	
    </table>
    <?php mysqli_close($conn); ?>
    
</body>
</html>