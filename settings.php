<?php
include "validation.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Preferences</title>
    <link rel="stylesheet" href="css/navbar2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
					
						<a class="navbar-brand" href="home.php" target="_blank"><img src="logo2.PNG" alt=""></a>	
						
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
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
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


<br><br><br><br><br><br>
    <div class="container">
    <h3>Change Password</h3>
    <form action="changepass.php" name="change-password" method="POST" enctype="multipart/form-data" autocomplete="off">
        <input type="password" name="oldpass" placeholder="Old Password" required>
        <input type="password" name="newpass1" placeholder="New Password" required>
        <input type="password" name="newpass2" placeholder="Confirm New Password" required>

        <input type="submit" name="changepassword" value="Change Password">
    </form>
    </div>
    <br>
    <br>

    <div class="container">
        <h3>Change Username</h3>
        <form action="changeuser.php" name="change-username" method="POST" enctype="multipart/form-data" autocomplete="off">
        <input type="text" name="newusername" placeholder="New Username" required>
        <input type="password" name="password" placeholder="Enter your Password" required>

        <input type="submit" name="changepassword" value="Change Username" >
        </form>
    </div>
    <br>
    <br>

    <div class="container">
        <form action="changepp.php" name="change-profile" method="POST" enctype="multipart/form-data" autocomplete="off"> 
        <h3>Change Profile Picture</h3>
        <div class="field image">
            <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
            <input type="submit" name="changeprofilepicture" value="Change Profile Picture">
        </div>
        </form>
    </div>
    <?php
    if(isset($_GET['error']))
    {
        $error=$_GET['error'];

    }
    else $error = NULL;
    if($error)
    {
        if($error==5){
            echo'<script>alert("Sorry... username already taken")</script>';
        }
        //error 6 deleted no use
        else if($error==7){
            echo'<script>alert("PASSWORD IS WRONG")</script>';
        }
        else if($error==8){
            echo'<script>alert("Please upload an image file - jpeg, png, jpg")</script>';
        }
        //error 9 in the login/validation pages
        else if($error==10){
            echo'<script>alert("Your Old Password is incorrect!")</script>';
        }
    }

    if(isset($_GET['msg']))
            {
                $msg=$_GET['msg'];
        
            }
            else $msg = NULL;
            if($msg)
            {
                if($msg==1){
                    echo'<script>alert("Your Profile Picture has been changed successfully.")</script>';
                }
                elseif($msg==2){
                    echo'<script>alert("Your password has been changed successfully.")</script>';
                }
                elseif($msg==3){
                    echo'<script>alert("Your Username has been changed successfully.")</script>';
                }
            
            }
    ?>
</body>
