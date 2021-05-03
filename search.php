<?php
include "validation.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search For Users</title>
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    
   
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
    
    
    <div class="container">
    
        <div class="row">
        <h2>Search by Username</h2>
        <form method="POST" action="search.php">
        
        <input type="text" name="search" id="search" placeholder="search here...." class="form-control">  
        <button type="submit" >Search</button>
        </form>
          
    </div>
    </div>
    <?php
    
        if(isset($_POST['search'])&&!empty($_POST['search'])){
        echo "
    <h2>Search List:</h2>
    <table style=\"border-collapse: collapse;\" border=\"i\">
        <tr style='font-weight:bold;'>
          <td>Image</td>
          <td>Username</td>
          <td>Name</td>
        </tr>";
    
    require_once "db_conn.php";
    $keyword = $_POST['search'];
    $query = "SELECT * FROM `users` WHERE `Username` LIKE '{$keyword}%'";
    $result = mysqli_query($conn, $query);
    //$records = mysqli_query($conn,"select * from users where Username");
    while($data = mysqli_fetch_array($result))
    {
    echo "
    <tr>
        <td><img src=\"images/".$data['Image']."\" width=\"100\" height=\"100\" style=\"border-radius: 50%;\"></td>
        <td>".$data['Username']."</td>
        <td>".$data['First Name']." ".$data['Last Name']."</td>
        <td>
            <form method=\"POST\" action=\"userprofile.php?user=".$data['Username']."\">
            <button type=\"submit\" >Send Audio</button>
            </form>
        </td>
        
    </tr>";
    }
    echo "</table>";

  mysqli_close($conn); } ?>
    <script type="text/javascript">
    $(function() {
        $( "#search" ).autocomplete({
        source: 'dbsearch.php',
        });
    });
    </script>

</html>
