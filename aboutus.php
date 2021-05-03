<?php
include "validation.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
        <a href='home.php'>Home</a>
        <a href='search.php'>Search</a>
        <a href='settings.php'>Settings</a>
        <a href='contactus.php'>Contact Us</a>
        <a class="active" href='aboutus.php'>About Us</a>
        

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


    <div class="content">
        <h1>Project Managed by Doctor Mohamad El Baker Nassar</h1>
        <h1>Developers: </h1>
        <li>
            <ul>Mohamad Ali Salhab</ul>
            <ul>Hadi Najdi</ul>
        </li>
    </div>

</body>
</html>