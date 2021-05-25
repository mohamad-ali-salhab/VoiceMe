<?php
include "adminvalidation.php";
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="adminsearchtablestylehome.css">
</head>
<body>

<style>
		body{
			background: url("test2.jpg") no-repeat fixed center !important;
		}
</style>

<?php
        if ($_SESSION['logged_in']!=true){
            session_destroy();
            header("Location: adminlogin.php");

        }
        else{
            ;
        }
            
    ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">VoiceMe</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="adminhome.php">Home</a></li>
      <li><a href="adminusers.php">Users</a></li>
      <li><a href="adminrecordings.php">Recordings</a></li>
      <li><a href="admincomplaints.php">Complaints</a></li>
      
      <li>
      <form action="adminlogout.php" >
        <button type="submit" class="btn btn-danger navbar-btn">Log Out</button>
      </form>
      </li>


    </ul>
  </div>
</nav>
<br><br><br>



<?php 

$query1 = mysqli_query($conn,"SELECT * FROM users");
$num_rows_users = mysqli_num_rows($query1);

$query2 = mysqli_query($conn,"SELECT * FROM records");
$num_rows_audios = mysqli_num_rows($query2);

$query3 = mysqli_query($conn,"SELECT * FROM complaints");
$num_rows_complaints = mysqli_num_rows($query3);



echo"
    <div class=\"table-users\">
    
    
    <table cellspacing=\"0\">
       <tr>
          <th>Number of Users</th>
          <th>Number of Recordings</th>
          <th>Number of Complaints</th>
       </tr>
    ";

    echo " 
    <tr> "?>
        <td><a href="adminusers.php"> <?php echo $num_rows_users  ?></a></td>
        <td><a href="adminrecordings.php"><?php echo $num_rows_audios ?></a></td>
        <td><a href="admincomplaints.php"><?php echo $num_rows_complaints  ?></a></td> <?php echo "
    </tr>";
    echo "</table>";
    

    
  mysqli_close($conn);  ?>
    </script>

</html>

<script>  
 $(document).ready(function(){  
      $('#searched_users').DataTable();  
 });  
 </script>  