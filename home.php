
<?php
include "validation.php";
include "db_conn.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Signed In</title>
    <link rel="stylesheet" href="css/stylehome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- <div class="navbar-header">
                <a class="active" href='home.php'>VoiceMe</a>
            </div> -->
    <ul class="nav navbar-nav">
        <li><a class="active" href='home.php'>VoiceMe</a></li>
        <li><a href='search.php'>Search</a></li>
        <li><a href='settings.php'>Settings</a></li>
        <li><a href='contactus.php'>Contact Us</a></li>
        <li><a href='aboutus.php'>About Us</a></li>
        <!-- <a href='search.php'>Search</a>
        <a href='settings.php'>Settings</a>
        <a href='contactus.php'>Contact Us</a>
        <a href='aboutus.php'>About Us</a> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">        
    <li><?php
            if ($_SESSION['logged_in']==true){
                echo $_SESSION['user'];
            }elseif ($_SESSION['logged_in']==false){
                echo 'failed';
            }
                ?><img src="images/<?php echo $_SESSION["image"]; ?>" alt=""width="40" height="40" style="border-radius: 50%;">
    </li>   
    
    <li><a href="logout.php">Log Out</a></li>
        <!-- <a style="float:right;" href="logout.php">Log Out</a>
        <strong style="float:right;"> -->
    </nav>
    <div>
        <?php 
        $query = mysqli_query($conn,"SELECT file_path, receiver_name, create_at FROM records WHERE receiver_name ='".$_SESSION['user']."'");
        if (mysqli_num_rows($query)>0){
        echo "
        <table style=\"border-collapse: collapse;\" border=\"0\">
            <tr style='font-weight:bold;'>
                <td>Date&Time Sent</td>
                <td>Audio</td>
            </tr>";
        while ($row = mysqli_fetch_array($query)){
            $element = "";
            $element .= "<audio controls>";
            $element .= "<source src= '".$row['file_path']."' type='audio/mpeg'>";
            $element .= "Your browser does not support the audio element.";
            $element .= "</audio>";
            echo "<tr>
                    <td> ".$row['create_at']." </td>
                    <td>$element</td>
                </tr>";
        }
    }else{
            echo "<h2>No Audio Files Found!</h2>";
        }
        ?>
       
    </div>

</body>
</html>