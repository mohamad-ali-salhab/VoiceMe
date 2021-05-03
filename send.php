<?php
    session_start();
    include_once "db_conn.php";


    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];

    if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password) 
	&& !empty($country) && !empty($state) && !empty($city)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE Email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                //echo "$email - This Email already exist!";
				$referer = "register.php";
				$errcode="error=1";
				header("Location: $referer?$errcode");
            }else{
				$sql2 = mysqli_query($conn,"SELECT * FROM users WHERE Username = '{$username}'");
				if(mysqli_num_rows($sql2) > 0){
						//echo "$username - This Username already exists!";
						$referer = "register.php";
						$errcode="error=2";
						header("Location: $referer?$errcode");
				}else{
					if(isset($_FILES['image'])){
						$img_name = $_FILES['image']['name'];
						$img_type = $_FILES['image']['type'];
						$tmp_name = $_FILES['image']['tmp_name'];
						
						$img_explode = explode('.',$img_name);
						$img_ext = end($img_explode);
		
						$extensions = ["jpeg", "png", "jpg"];
						if(in_array($img_ext, $extensions) === true){
							$types = ["image/jpeg", "image/jpg", "image/png"];
							if(in_array($img_type, $types) === true){
								$time = time();
								$new_img_name = $time.$img_name;
								if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
									$sql= "INSERT INTO `users`(`First Name`, `Last Name`, `Email`, `Password`, `Username`, `Country`, `State`, `City`,`Image`)
									VALUES ('$firstname','$lastname','$email','$password','$username','$country','$state','$city','$new_img_name')";
									
									$insert_query = mysqli_query($conn, $sql);
									//echo $sql;
									/*$insert_query = mysqli_query($conn,"INSERT INTO `users`(`First Name`, `Last Name`, `Email`, `Password`, `Username`, `Country`, `State`, `City`,'Image')
									VALUES ('$firstname','$lastname','$email','$password','$username','$country','$state','$city','$new_img_name')");*/
									
									if($insert_query){
										$sqlx= "SELECT * FROM `users` WHERE `Email` = '{$email}'";
										$select_sql2 = mysqli_query($conn,$sqlx);
										if(mysqli_num_rows($select_sql2)>0){
											$result = mysqli_fetch_assoc($select_sql2);
											$_SESSION['Username'] = $result['Username'];
											header("Location: index.php");
										}else{
											echo "This email address not Exist!";
										}
									}else{
										echo "Something went wrong. Please try again!";
									}
								}
							}else{
								echo "Please upload an image file - jpeg, png, jpg";
							}
						}else{
							//to get back to the register page when error appeard 
							$referer = "register.php";
							$errcode="error=3";
							header("Location: $referer?$errcode");
							//echo "Please upload an image file - jpeg, png, jpg";
						}
					}
			}
		}}
		else{
			//echo "Enter a valid Email";
			$referer = "register.php";
			$errcode="error=4";
			header("Location: $referer?$errcode");
		}
	}
	else{
		echo "Enter the required data";
	}
?>