<?php
include "validation.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./style.css">
	<style>
	html,body{
		padding: 0 !important;
		margin: 0 !important;
	}
		body{
			background: lightblue url("backgroundinside.jpeg") no-repeat fixed center;
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
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link" href="home.php">Home</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="search.php">Search</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="settings.php">Settings</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
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
						header("Location: index.php");
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


<h1>Contact Us</h1>
<div class="container" id="container2">
  <form method="POST" action="sendcontactus.php">
    
	<label for="fullname">Title</label>
    <input type="text"  name="fullname" placeholder="Enter a title.."  >
    <label for="message">Message</label>

    <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit"  name="button" value="Submit">
  </form>
</div>

<br><br><br>
<!--style for the contact from-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #2196F3;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: darkblue;
}

#container2 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<!--
    <div class="container">
    <form method="POST" action="sendcontactus.php" >
        
        <label>Title</label>
        <input type="text" name="fullname" class="align-middle">
        <br>
        <label>Message</label>
        <textarea name="message"></textarea>

        <input type="submit" name="button">

    </form>
    </div>-->
	<?php
		if(isset($_GET['msg']))
		{
			$msg=$_GET['msg'];
	
		}
		else $msg = NULL;
		if($msg)
		{
			if($msg==4){
				echo'<script>alert("Your Message has been sent successfully.")</script>';
			}
			
		
		}
	?>

</body>
<br>
</html>