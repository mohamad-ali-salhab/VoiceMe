<?php  

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) 
    && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['image']) && isset($_POST['country'])
	&& isset($_POST['state']) && isset($_POST['city'])) {
	include 'db_conn.php';

	function validate($data){
       $data = trim($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
	$username = validate($_POST['username']);
    $email = validate($_POST['email']);
    $password = $_POST['password'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];

	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		$em = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
		if(mysqli_num_rows($em) > 0){
			echo "$email - This email already exists!";
		}else{
			$em2 = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");
			if(mysqli_num_rows($em2) > 0){
				echo "$username - This username already exists!";
		}else{

			if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password)
				|| empty($country) || empty($state) || empty($city)) {
				header("Location: register.html");
			}else{

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
						$ran_id = rand(time(), 100000000);

						$sql = "INSERT INTO `users`(`First Name`, `Last Name`, `Email`, `Password`, `Username`, `Country`, `State`, `City`,'Image')
						VALUES ('$firstname','$lastname','$email','$password','$username','$country','$state','$city','$new_img_name')";
						$res = mysqli_query($conn, $sql);

						if ($res) {
							header("Location: index.html?logged_in");
						}else {
							echo "Connection to database failed! Please Try Again!";
						}
					}}

				}else {
					header("Location: register.html?logged_in");
				}}}}}}

?>