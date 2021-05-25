<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="logo2.PNG" type="image/icon type">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="stylelogin.css">


    <!-- <video playsinline autoplay muted loop poster="background.mp4" id="bgvid">
        <source src="background.mp4" type="video/mp4">
    </video> -->
    <!-- <iframe src="https://giphy.com/embed/UGrpkMXipFWQ06IHIM" width="480" height="360" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/clubdoauto-club-do-auto-clube-clubedoauto-UGrpkMXipFWQ06IHIM">via GIPHY</a></p> -->
</head>


<body style="background-image: url('test13.jpg');">
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card" style="height: 600px; width: 800px">
                <div class="card-header">
                    <h3>VoiceMe</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <a href="https://www.facebook.com/VoiceMe-100132268924198"><span><i class="fa fa-facebook-square"></i></span></a>
                        <a href="https://www.instagram.com/voiceme.site/"><span><i class="fa fa-instagram"></i></span></a>
                        <!-- <span><i class="fab fa-google-plus-square"></i></span> -->
                        <!-- <span><i class="fab fa-twitter-square"></i></span> -->
				    </div>
			    </div>
            <div class="card-body">
                <!--<form name="myform" action="send.php" onsubmit="return checkpass()" method="POST" enctype="multipart/form-data">-->
                <form action="send.php" onsubmit="return checkpass()" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="fas fa-user"></i></span>
						            </div>
                        <input class="form-control" type="text" name="firstname" placeholder="First Name" required>

                        <div class="input-group-prepend" style="margin-left: 3%">
							            <span class="input-group-text"><i class="fas fa-users"></i></span>
						            </div>
                        <input class="form-control" type="text" name="lastname" placeholder="Last Name" required>
                    </div>
                    
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
							            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
						            </div>
                        <input class="form-control" type="text" name="username" placeholder="Username" required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
					              </div>
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="input-group form-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
					            </div>
                      <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
                    </div>
                      <div class="row align-items-center remember">
                        
                        <input type="checkbox" onclick="showPass()">Show Password<br>
                        
                      </div>
                      <div>
                      <progress max="100" value="0" id="strength" style="width: 230px"></progress>
                      </div>
                    
                    <br>            
                    
                    
                    <div class="input-group form-group">
                        <div class="input-group-prepend" style="margin-left:0%" >
                            <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
					              </div>
                        <select style="width:175px;margin-right: 3%;" name="country" class="countries" id="countryId" required>
                          <option value="">Select Country</option>
                        </select>

                        <div class="input-group-prepend" >
                            <span class="input-group-text"><i class="fas fa-compass"></i></span>
					              </div>
                        <select style="width:175px;margin-right: 3%" name="state" class="states" id="stateId" required>
                          <option value="">Select State</option>
                        </select>

                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
					              </div>
                        <select style="width:175px; margin-right:0% " name="city" class="cities" id="cityId" required>
                          <option value="">Select City</option>
                        </select>


                      </div>
                  
                    <div class="input-group form-group" style="margin: 0 auto; width: 350px">
                        <div class="input-group-prepend" >
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
					              </div>
                        <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                    </div>
                    <br>
                    <!-- </div> -->

                    <div class="form-group" style="justify-content: center">
                        <input class="btn float-right login_btn" type="submit" name="submit" value="Register" style="width: 250px">
                    </div>
                   
                    <br><br>
                    <div class="d-flex justify-content-center links">
                        <a href="index.php">Already have an account? Login Here!</a>
                    </div>

                    </div>

                    </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
   <script src="//geodata.solutions/includes/countrystatecity.js"></script> 
    <script type="text/javascript" src="register.js"></script>
    </div>
                

                </form>

            </div>

        </div>
    </div>
</div>
</div>
</body>


          <?php 
          if(isset($_GET['error']))
          {
            $error=$_GET['error'];
          }
          else $error = NULL;
          
  
          if($error)
          {
            if($error==1) {
            echo '<script>alert("This Email Already Exist")</script>';
            }
            else if($error==2){
              echo '<script>alert("This Username Already Exist")</script>';
            }
            else if($error==3){
              echo '<script>alert("Please upload an image file - jpeg, png, jpg")</script>';
            }
            else if($error==4){
              echo'<script>alert("Enter a valid Email")</script>';
            }
          } 
          
          ?>
      
        <!-- <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/signup.js"></script> -->
      </html>
