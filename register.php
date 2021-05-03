<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styleregister.css">

    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
  <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">



    <!-- <video playsinline autoplay muted loop poster="background.mp4" id="bgvid">
        <source src="background.mp4" type="video/mp4">
    </video> -->
    <title>Register- VOICEME</title>
    
</head> 
    <body>
        <div class="container">

              <div class="cardbody">
                <form action="send.php" onsubmit="return checkpass()" method="POST" enctype="multipart/form-data" autocomplete="off">
                  <!-- <div class="error-text"></div> -->

                    <div class="input-group form-group">
                      <input class="form-control" type="text" name="firstname" placeholder="First name" required>
                    </div>
                    

                    <div class="input-group form-group">
                      <input class="form-control" type="text" name="lastname" placeholder="Last name" required>
                    </div>
                  
      
                    <div class="input-group form-group">
                      <input class="form-control" type="text" name="username" placeholder="Username" required>
                    </div>

      
                    <div class="input-group form-group">
                      <input class="form-control" type="email" name="email" placeholder="Enter your email" required>
                    </div>


                    <div class="input-group form-group">
                      <input class="form-control" type="password" id="password" name="password" placeholder="Type Password" required>
                    </div>
                    <div>
                      <input type="checkbox" onclick="showPass()">Show Password
                    </div>
                    <div>
                      <progress max="100" value="0" id="strength" style="width: 230px"></progress>
                    </div>

                    <div>
                      <label>Upload an image</label>
                      <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                    </div>

                    <div>
                      <select name="country" class="countries" id="countryId" required>
                          <option value="">Select Country</option>
                      </select>
                    </div>

                    <div>
                      <select name="state" class="states" id="stateId" required>
                          <option value="">Select State</option>
                      </select>
                    </div>

                    <div>
                      <select name="city" class="cities" id="cityId" required>
                          <option value="">Select City</option>
                      </select>
                    </div>

                    <div>
                      <input class="btn float-right login_btn" type="submit" name="submit" value="Register" >
                    </div>
                
                </form>  
              </div>

            <div class="d-flex justify-content-center links"><a href="index.php">Already have an account? Login Here!</a></div>

          </div>













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
      
      </body>
      </html>
