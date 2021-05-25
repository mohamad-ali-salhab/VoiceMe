
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="audio.css">

    <style>
	html,body{
		padding: 0 !important;
		margin: 0 !important;
	}
		body{
			background: #B0C4DE url("backgroundinside.jpeg") no-repeat fixed center;
		}

  </style>

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
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
                                <a class="nav-link" href="home.php">Home</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
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


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>

 
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

    <?php
        if ($_SESSION['logged_in']!=true){
            session_destroy();
            header("Location: index.php");

        }
        else{
            ;
        }
            
    ?>


        <div class="container">
                <?php 
                 $query = mysqli_query($conn,"SELECT * FROM records WHERE receiver_name ='".$_SESSION['user']."'");
                 if (mysqli_num_rows($query)>0){
                     ?>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col"  class="text-center">#</th>
                                <th scope="col"  class="text-center">Date Created</th>
                                <th scope="col"  class="text-center">Audio</th>
                                <th  class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody><?php
                            $i = 0;
                            while ($row = mysqli_fetch_array($query)){?>
                            <tr>
                                <?php $i++; ?>
                                <th scope="row"  class="text-center"><?php echo $i ?></th>
                                <?php $element = "";
                                $element .= "<audio controls>";
                                $element .= "<source src= '".$row['file_path']."' type='audio/mpeg'>";
                                $element .= "Your browser does not support the audio element.";
                                $element .= "</audio>";?>
                                <td  class="text-center"><?php echo $row['create_at'] ?></td>
                                <td  class="text-center"><?php echo $element ?></td>
                                <td  class="text-center">
                                <form action="deleterecorduser.php?rid=<?php  echo $row['id'] ?>"  method="POST" >
                                    <button type = "submit" class="btn btn-danger badge-pill" style="width:80px;"> DELETE </button>
                                </form>
                                </td>
                            </tr>
                            <?php }}else{
                            ?><h2>No Audio Files Found!</h2><?php
                        } ?>
                        </tbody>
                        </table>
                </div>
            </div>
        </div>

        <?php
if(isset($_GET['msg']))
            {
                $msg=$_GET['msg'];
        
            }
            else $msg = NULL;
            if($msg)
            {
                if($msg==3){
                    echo'<script>alert("Record Deleted Successfully.")</script>';

                }
                elseif($msg==4){
                    echo'<script>alert("An error occured and record was not delete.")</script>';
                }
            }
    ?>




</body>
</html>
