<?php
include "validation.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Preferences</title>
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
        <a class="active" href='settings.php'>Settings</a>
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
    <br><br>
    <div>
    <form>
        <h3>Change  Theme</h3>
        <input type="radio" id="dark" name="mode" value="DarkMode">
        <label for="dark">Dark Mode</label><br>
        <input type="radio" id="light" name="mode" value="LightMode">
        <label for="light">Light Mode</label><br>
    </form>
    </div>
    <br>
    <br>

    <div>
    <h3>Change Password</h3>
    <form action="changepass.php" name="change-password" method="POST" enctype="multipart/form-data" autocomplete="off">
        <input type="password" name="oldpass" placeholder="Old Password" required>
        <input type="password" name="newpass1" placeholder="New Password" required>
        <input type="password" name="newpass2" placeholder="Confirm New Password" required>

        <input type="submit" name="changepassword" value="Change Password">
    </form>
    </div>
    <br>
    <br>

    <div>
        <h3>Change Username</h3>
        <form action="changeuser.php" name="change-username" method="POST" enctype="multipart/form-data" autocomplete="off">
        <input type="text" name="newusername" placeholder="New Username" required>
        <input type="password" name="password" placeholder="Enter your Password" required>

        <input type="submit" name="changepassword" value="Change Username" >
        </form>
    </div>
    <br>
    <br>

    <div>
        <form action="changepp.php" name="change-profile" method="POST" enctype="multipart/form-data" autocomplete="off"> 
        <h3>Change Profile Picture</h3>
        <div class="field image">
            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
            <input type="submit" name="changeprofilepicture" value="Change Profile Picture">
        </div>
        </form>
    </div>
    <?php
    if(isset($_GET['error']))
    {
        $error=$_GET['error'];

    }
    else $error = NULL;
    if($error)
    {
        if($error==5){
            echo'<script>alert("Sorry... username already taken")</script>';
        }
        //error 6 deleted no use
        else if($error==7){
            echo'<script>alert("PASSWORD IS WRONG")</script>';
        }
        else if($error==8){
            echo'<script>alert("Please upload an image file - jpeg, png, jpg")</script>';
        }
        //error 9 in the login/validation pages
        else if($error==10){
            echo'<script>alert("Your Old Password is incorrect!")</script>';
        }
    }

    if(isset($_GET['msg']))
            {
                $msg=$_GET['msg'];
        
            }
            else $msg = NULL;
            if($msg)
            {
                if($msg==1){
                    echo'<script>alert("Your Profile Picture has been changed successfully.")</script>';
                }
                elseif($msg==2){
                    echo'<script>alert("Your password has been changed successfully.")</script>';
                }
                elseif($msg==3){
                    echo'<script>alert("Your Username has been changed successfully.")</script>';
                }
            
            }
    ?>
</body>
