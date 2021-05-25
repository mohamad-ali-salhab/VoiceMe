<?php
include "validation.php"
?>

<?php

if (isset($_POST['newusername'], $_POST['password'])){

    include "db_conn.php";


    $username = $_SESSION['user'];
    $newusername = $_POST['newusername'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,"SELECT * FROM users WHERE Username = '".$username."'");

    if(mysqli_num_rows($query)==1){
        $querynewuser = "SELECT * FROM users WHERE username='$newusername'";
        if (mysqli_num_rows(mysqli_query($conn,$querynewuser)) > 0) {
            //echo "Sorry... username already taken";
            $referer = $referer = "settings.php";
		    $errcode="error=5";
		    header("Location: $referer?$errcode");
        }
        else{
            $data = mysqli_fetch_array($query);
            if (password_verify($password,$data[4])) {
            
                $sql = "UPDATE users SET Username='$newusername' WHERE Username='".$username."'";
                if (mysqli_query($conn, $sql)) {
                   // session_destroy();
                    //die ("Your Username has been changed.<a href='login.php'>Return </a>to the main page"); 
                    //change to msg like pp
                    $_SESSION["user"] = $newusername;
                    $referer = "settings.php";
    		        $errcode="msg=3";
    		        header("Location: $referer?$errcode");
                }else{
                echo "Error updating username: " . mysqli_error($conn);
            }
        }else{
           $referer = "settings.php";
    		$errcode="error=7";
    		header("Location: $referer?$errcode"); 
        }
    }}else{
        echo "Error fetching username from database";
    }

}
?>