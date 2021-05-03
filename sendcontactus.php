<?php  


if (isset($_POST['fullname']) && isset($_POST['message'])) {
	include 'db_conn.php';

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$fullname = validate($_POST['fullname']);
	$message = validate($_POST['message']);

	if (empty($message) || empty($fullname)) {
		header("Location: contactus.html");
	}else {

		$sql = "INSERT INTO `complaints`(`Full Name`, `Message`) VALUES ('$fullname','$message')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			echo "Your message was sent successfully!";
		}else {
			echo "Your message could not be sent!";
		}
	}

}else {
	header("Location: contactus.html");
}