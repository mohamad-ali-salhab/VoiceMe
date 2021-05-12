<?php
include "validation.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar2.css">
    <link rel="stylesheet" href="css/aboutus.css">
    <title>About Us</title>
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

    <div class="about-section">
        <h1 style="color:white">About Us</h1>
        <p>VoiceMe secures audio-messaging between Users by hiding their Voice Identity upon changing 
        pitches of the recorded audio, by the will of the user. 
        VoiceMe users must be sure that no raw recordings will be saved in our Database, 
        and thus users can feel free to express their feelings and opinions in their recordings.</p>
    </div>
    <br><br>
<h2 style="text-align:center">VoiceMe Team</h2>
<br><br>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="aboutus images/drmohamadnassar.jpeg" alt="Pr.Mohamad-Pic" style="width:100% height: 560px">
      <div class="container">
      <br><br>
        <h2>Mohamad El Baker Nassar</h2>
        <p class="title">Project Advisor</p>
        <p>AI Consultant, Data Science Expert, Project Manager and Assistant Professor at the American University of Beirut </p>
        <!-- <p>mn115@aub.edu.lb</p> -->
        <p><a class="button" href="mailto:mn115@aub.edu.lb">Contact</a></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="aboutus images/salhab.jpeg" alt="Mohamad-Pic" style="width:100% height: 560px">
      <div class="container">
      <br><br>
        <h2>Mohamad Ali Salhab</h2>
        <p class="title">Full-Stack Web Developer</p>
        <p>Senior Computer Science student at the American University of Beirut and a Full-Stack Web Developer</p>
        <!-- <p>hmn26@mail.aub.edu</p> -->
        <p><a class="button" href="mailto:mas164@mail.aub.edu">Contact</a></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="aboutus images/NEW3.jpg" alt="Hadi-Pic" style="width:100% height: 560px">
      <div class="container">
      <br><br>
        <h2>Hadi Najdi</h2>
        <p class="title">Front-End Web Developer</p>
        <p>Senior Computer Science student at the American University of Beirut and a Front-End Web Developer</p>
        <!-- <p>mas164@mail.aub.edu</p> -->
        <!-- <p><button class="button">Contact</button></p> -->
        <p><a class="button" href="mailto:hmn26@mail.aub.edu">Contact</a></p>
      </div>
    </div>
  </div>
</div>           

</body>
</html>