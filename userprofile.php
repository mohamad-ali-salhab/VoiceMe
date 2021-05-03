<?php
require "validation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
        
        <?php
        if ($_SESSION['logged_in']!=true){
            session_destroy();
            header("Location: index.php");

        }
        else{
            ;
        }
            
        ?>



        <div class="navbar">
        <a href='index.php'>Home</a>
        <a class="active" href='search.php'>Search</a>
        <a href='settings.php'>Settings</a>
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
    <?php
    echo "
    <table style=\"border-collapse: collapse;margin-right: auto;margin-left:auto;\" border=\"i\">
    <tr style='font-weight:bold;'>
    <td>Image</td>
    <td>Username</td>
    <td>Full Name</td>
    <td>Location</td>
    </tr>";

    if ($_GET['user'] != NULL){
        $UserToSend = $_GET['user'];
        include "db_conn.php";
        $query = "SELECT * FROM `users` WHERE `Username` LIKE '{$UserToSend}%'";
        $result = mysqli_query($conn, $query);
        while($data = mysqli_fetch_array($result))
        {
        echo "
        <tr>
            <td><img src=\"images/".$data['Image']."\" width=\"100\" height=\"100\" style=\"border-radius: 50%;\"></td>
            <td>".$data['Username']."</td>
            <td>".$data['First Name']." ".$data['Last Name']."</td>
            <td>".$data['Country'].", ".$data['State'].", ".$data['City']."</td>          
        </tr>
        ";

        }
        echo "</table>";
        echo "
        <form>
                <button type=\"button\" >Record</button>
                <button type=\"button\" >Stop</button>
                <button type=\"button\" >Play</button>
                <button type=\"button\" >Change Voice</button>
                <button type=\"\" >Send</button>
        </form>"
        ;
        }else{
            echo "Username not found!";
        }

?>