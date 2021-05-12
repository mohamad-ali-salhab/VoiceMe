<?php
include('db_conn.php')

?>

<?php

$url = $_GET['arid'];

$query ="SELECT * FROM 
(SELECT l.State, a.IATA_airport, l.Country, a.Airport_ID FROM Airport a JOIN Location l ON l.Airport_ID = a.Airport_ID ) AS INFO JOIN (SELECT Source_airport, Destination_time ,Airport_ID, Flight_Number, DelayedOrCancelled , Destination_ID FROM receives_departs WHERE Airport_ID = '$url') AS DEP  ON INFO.Airport_ID = DEP.Destination_ID ";  
$departing = mysqli_query($mysqli, $query);  


$query2 ="SELECT * FROM 
(SELECT l.State, a.IATA_airport, l.Country, a.Airport_ID 
    FROM Airport a JOIN Location l 
    ON l.Airport_ID = a.Airport_ID ) AS INFO JOIN  
    
(SELECT Destination_airport, Arrival_time , Destination_ID, Flight_Number, DelayedOrCancelled, Airport_ID
FROM receives_departs WHERE Destination_ID= '$url') AS DEP  ON INFO.Airport_ID = DEP.Airport_ID
";  

$arriving = mysqli_query($mysqli, $query2); 

?>

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Main Page</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet"> 
           <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />  
      
      </head>  
      <style>
           body{
	background-image: url('../img/background.jpg');
	background-size: cover;
	background-repeat: no-repeat;
     background-attachment: fixed;
}
        #arriving > thead{
            background-color: black;
            color:white ;

        }
        #arriving > tbody >tr{
          background-color: rgba(255, 255, 255, 0.5);

        }

        #departing > thead{
            background-color: black;
            color:white ;

        }
        #departing > tbody >tr{
          background-color: rgba(255, 255, 255, 0.5);

        }
        

        
        #book{
            margin-left:20px;
            position: absolute;
            right: 20px
        }
      </style>
      <body>  
      <nav class="navbar navbar-dark bg-dark">
        <form class="form-inline">
        <a class="btn btn-light" href = "#">All flights</a>
        <a class="btn btn-light" href = "/index.php" id = "book">Book a Flight</a>
        </form>
        </nav>

          <br/><br/>  

          <div style="display:flex;">
          
           <div class="container"> 
           <h1>Arriving</h1> 
                <br />  
                <div class="table-responsive">  
                     <table id="arriving" class="table table-striped table-bordered">  
                          
                          <thead class="thead-dark">  
                               <tr>  
                                    <td>Flight No.</td>  
                                    <td>Time</td>  
                                    <td>From</td>  
                                    <td>Country</td>  
                                    <td>Airport</td>
                               </tr>
                                 
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($arriving))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["Flight_Number"].'</td>  
                                    <td>'.$row["Arrival_time"].'</td>  
                                    <td>'.$row["State"].'</td>  
                                    <td>'.$row["Country"].'</td>  
                                    <td>'.$row["Destination_airport"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?> 
                          
                           
                     </table>  
                </div>  
           </div>  
           <!-- departing -->
           <div class="container">  
                <h1>Departing</h1>
                <br />  
                <div class="table-responsive">  
                     <table id="departing" class="table table-striped table-bordered">  
                          <thead class="thead-dark">  
                               <tr>  
                                    <td>Flight No.</td>  
                                    <td>Time</td>  
                                    <td>To</td>  
                                    <td>Country</td>  
                                    <td>Airport</td>
                               </tr>
                                 
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($departing))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["Flight_Number"].'</td>  
                                    <td>'.$row["Destination_time"].'</td>  
                                    <td>'.$row["State"].'</td>  
                                    <td>'.$row["Country"].'</td>  
                                    <td>'.$row["Source_airport"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                          
                          
                     </table>  
                </div>  
           </div> 
           </div>
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#arriving').DataTable({
        "paging":   false,
        "info":     false,
        "searching": false
      }); 
 
      $('#departing').DataTable({
        "paging":   false,
        "info":     false,
        "searching": false
      }); 
     

 });  
 </script>  


<!-- 35,112835,A,13A,Economy,Beirut Rafic Harriri International,Kugaaruk Airport,282929473,6671584269COS0007458F3369874,Costarricenses,6678584269COS0007458F3369874,Nina Abdallah,Parker Street,Female Costa Rica,392083@rhu.edu.lb,NULLm1995-12-23,00506,45879965,NULL,3490 -->