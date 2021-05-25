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
    
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet"> 
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>            
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" /> 
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./style.css">-->
    <!--for new search-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!--for new table search-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./searchtablestyle.css">
   
</head>

<body class="hero-anime">	

	<div class="navigation-wrap bg-light start-header start-style">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-md navbar-light">
					
						<a class="navbar-brand" href="https://voiceme.site/" target="_blank"><img src="logo2.PNG" alt=""></a>	
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto py-4 py-md-0">
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="home.php">Home</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
									<a class="nav-link" href="search.php">Search</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="settings.php">Settings</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="contactus.php">Contact Us</a>
										<a class="dropdown-item" href="aboutus.php">About Us</a>
									</div>
								</li>

                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="logout.php">Log Out</a>
								</li>

                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active"><?php
                   if ($_SESSION['logged_in']==true){
                       ?><li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                       <a class="nav-link" href="#"><?php echo $_SESSION['user']?></a>
                     </li>
                   
                  <?php }
                   elseif ($_SESSION['logged_in']==false){
                       echo 'failed';
                   }
                   ?></li>
                   <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                   <img  class="navbar-brand" src="images/<?php echo $_SESSION["image"]; ?>" alt="" height="50" width=""></li>
               </li>

							</ul>
						</div>
						
					</nav>		
				</div>
			</div>
		</div>
	</div>


<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>-->

 
<script>

(function($) { "use strict";
 
 $(function() {
 var header = $(".start-style");
 $(window).scroll(function() {    
 var scroll = $(window).scrollTop();
 
 if (scroll >= 10) {
 header.removeClass('start-style').addClass("scroll-on");
 } else {
 header.removeClass("scroll-on").addClass('start-style');
 }
 });
 }); 
 
 //Animation
 
 $(document).ready(function() {
 $('body.hero-anime').removeClass('hero-anime');
 });
 
 //Menu On Hover
 
 $('body').on('mouseenter mouseleave','.nav-item',function(e){
 if ($(window).width() > 750) {
 var _d=$(e.target).closest('.nav-item');_d.addClass('show');
 setTimeout(function(){
 _d[_d.is(':hover')?'addClass':'removeClass']('show');
 },1);
 }
 }); 
 
 //Switch light/dark
 
 $("#switch").on('click', function () {
 if ($("body").hasClass("dark")) {
 $("body").removeClass("dark");
 $("#switch").removeClass("switched");
 }
 else {
 $("body").addClass("dark");
 $("#switch").addClass("switched");
 }
 });  
 
  })(jQuery)


</script> 
<br><br><br><br><br>
    </div>
    <style>
        #searched_users > thead{
            background-color: black;
            color:white ;

        }
        #searched_users > tbody >tr{
          background-color: rgba(255, 255, 255, 0.5);

        }
      </style>
    <br><br><br>
    <div class="container">
    
        <div class="row">
        
          
    </div>
    <form method="POST" class="example" action="search.php">
            <input type="text" placeholder="Search..." name="search" id="search">
            <button type="submit"><i class="fa fa-search"></i></button>
    </form>
   
    <!--SEARCH bar STYLE-->
    <style>


        * {
        box-sizing: border-box;
        }

        form.example input[type=text] {
        border-radius: 7px;
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
        }

        form.example button {
        border-radius: 7px;
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
        }

        form.example button:hover {
        background: darkblue;
        }

        form.example::after {
        content: "";
        clear: both;
        display: table;
        }
    </style>

    </div>
    <br><br><br>
    <?php
        if(isset($_POST['search'])&&!empty($_POST['search'])){
        /*echo "

    <div class=\"table-responsive\" id=\"hadi\">
    <table style=\"border-collapse: collapse;\" border=\"i\" class=\"table table-striped table-bordered\" id=\"searched_users\">
    <thead class=\"thead-dark\">
    <tr style='font-weight:bold;'>
          <td>Image</td>
          <td>Username</td>
          <td>Name</td>
          <td>Location</td>
        </tr>
    </thead>";*/
    echo"
    <div class=\"table-users\">
    
    
    <table cellspacing=\"0\">
       <tr>
          <th>Picture</th>
          <th>Username</th>
          <th>Name </th>
          <th>Location</th>
          
       </tr>
    ";
    
    require_once "db_conn.php";
    $keyword = $_POST['search'];
    $query = "SELECT * FROM `users` WHERE `Username` LIKE '{$keyword}%'";
    $result = mysqli_query($conn, $query);
    //$records = mysqli_query($conn,"select * from users where Username");
    while($data = mysqli_fetch_array($result)){
      if ($data['Username']==$_SESSION['user']){
        continue;
    }else{
    
    //while($data = $result>0)
    //{
    echo "
    <tr>
        <td><img src=\"images/".$data['Image']."\" width=\"100\" height=\"100\" style=\"border-radius: 50%;\"></td>" ?>
        <td> <?php echo '<a href="userprofile.php?un=' . $data['Username'] . '">'. $data['Username'] .'</a>'; ?> </td><?php echo "
        <td>".$data['First Name']." ".$data['Last Name']."</td>
        <td>".$data['Country'].", ".$data['State']. ", ".$data['City']."</td>
        
    </tr>";
    }
    echo "</table>";
    
}} ?>

</html>

<script>  
 $(document).ready(function(){  
      $('#searched_users').DataTable();  
 });  
 </script>

  <script type="text/javascript">
    $(function() {
        $( "#search" ).autocomplete({
        source: 'dbsearch.php',
        });
    });
    </script>