<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleregister.css">
    <title>Register- Talk Sarahah</title>
</head> 
    <body>
        <div class="container">
          <section class="form signup">
            <header>Register</header>
            <form action="send.php" onsubmit="return checkpass()" method="POST" enctype="multipart/form-data" autocomplete="off">
              <div class="error-text"></div>
              <div class="name-details">
                
                <div class="field">
                  <input type="text" name="firstname" placeholder="First name" required>
                </div><br>
                
                <div class="field">
                  <input type="text" name="lastname" placeholder="Last name" required>
                </div><br>
              
                <div class="field">
                  <input type="text" name="username" placeholder="Username" required>
                </div><br>

                <div class="field">
                  <input type="email" name="email" placeholder="Enter your email" required>
                </div><br>

                <div class="field">
                  <input type="password" id="password" name="password" placeholder="Type Password" required>
                </div>
                <div>
                  <input type="checkbox" onclick="showPass()">Show Password
                </div>
                <div>
                  <progress max="100" value="0" id="strength" style="width: 230px"></progress>
                </div><br>
                <br>

                <div class="field image">
                  <label>Upload an image</label>
                  <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                </div><br>

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
                </div><br><br>

                <div>
                  <input type="submit" name="submit" value="Register" >
                </div>

                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
                <script src="//geodata.solutions/includes/countrystatecity.js"></script>
                <script type="text/javascript" src="register.js"></script>
              </div>
            </form>
            <div><a href="index.php">Already have an account? Login Here!</a></div>
          </section>
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
        </div>
      
        <!-- <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/signup.js"></script> -->
      
      </body>
      </html>
