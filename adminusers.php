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
  <link rel="stylesheet" href="adminsearchtablestyleusers.css">
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
      <li><a href="adminhome.php">Home</a></li>
      <li  class="active"><a href="adminusers.php">Users</a></li>
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

<?php 
echo"
    <div class=\"table-users\">
    
    
    <table cellspacing=\"0\">
       <tr>
          <th>Picture</th>
          <th>Username</th>
          <th>Name </th>
          <th>Location</th>
          <th>Actions</th>
       </tr>
    ";

    $query = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $query);
    //$records = mysqli_query($conn,"select * from users where Username");
    while($data = mysqli_fetch_array($result)){

    
    //while($data = $result>0)
    //{
    echo "
    <tr>
        <td><img src=\"images/".$data['Image']."\" width=\"100\" height=\"100\" style=\"border-radius: 50%;\"></td>
        <td>".$data['Username'] ."</td>
        <td>".$data['First Name']." ".$data['Last Name']."</td>
        <td>".$data['Country'].", ".$data['State']. ", ".$data['City']."</td> "?>
        <td class="text-center">
            <form action="deleteuser.php?un=<?php  echo $data['Username'] ?>"  method="POST" >
                <button type = "submit" class="btn btn-danger badge-pill" style="width:80px;"> DELETE </button>
            </form> <?php echo "
        </td>
    </tr>";
    }
    echo "</table>";
    

    
  mysqli_close($conn);  ?>
    </script>

</html>

<script>  
 $(document).ready(function(){  
      $('#searched_users').DataTable();  
 });  
 </script>  
<?php
if(isset($_GET['msg']))
            {
                $msg=$_GET['msg'];
        
            }
            else $msg = NULL;
            if($msg)
            {
                if($msg==3){
                    echo'<script>alert("User Deleted Successfully.")</script>';

                }
                elseif($msg==4){
                    echo'<script>alert("An error occured and User was not delete.")</script>';
                }
            }
    ?>