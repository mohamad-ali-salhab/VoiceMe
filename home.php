
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
        
        $query = mysqli_query($conn,"SELECT file_path, receiver_name FROM records WHERE receiver_name='".$_SESSION['user']."'");
        
        // $query = mysqli_query($conn,"SELECT receiver_name, file_path FROM audio WHERE receiver_name = '".$_SESSION['user']."'");
        
        while ($row = mysqli_fetch_array($query)){
            echo '<a href="play.php?name='.$row['file_path'].'">'.$row['file_path'].'</a>';
        }

        if (mysqli_num_rows($query)>0){
            while ($row = mysqli_fetch_array($query)){
                ?><tr>
                    <td><audio controls><audio source="<?php echo $row['file_path'] ?>"></audio></td>
                    <td><iframe width=200 height=200 src="<?php echo $row['file_path'] ?>"></iframe></td>
            </tr>
            <?php
            }
        }else{
            echo "<h2>You have no Recordings!</h2>";
        }
        ?>
    </div>

</body>
</html>