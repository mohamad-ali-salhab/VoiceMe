<?php
include "validation.php"
?>

<?php

if (isset($_POST['oldpass'], $_POST['newpass1'], $_POST['newpass2'])){

    include "db_conn.php";


    $username = $_SESSION['user'];
    $oldpass = $_POST['oldpass'];
    $newpass1 = $_POST['newpass1'];
    $newpass2 = $_POST['newpass2'];

    $query = mysqli_query($conn,"SELECT * FROM users WHERE Username = '".$username."' AND  Password = '".$oldpass."'");
    //$querynewpass = "SELECT * FROM users WHERE username='$newusername'";
    if(mysqli_num_rows($query)==1){
        $sql = "UPDATE users SET Password='".$newpass1."' WHERE Username='".$username."'";
         
        if (mysqli_query($conn, $sql)) {
           // session_destroy();
           // die ("Your password has been changed.<a href='login.html'>Return </a>to the main page"); 
            $referer = "settings.php";
		    $errcode="msg=2";
		    header("Location: $referer?$errcode");
        } 
        else {
            echo "Error updating password: " . mysqli_error($conn);
        }
    }else{
        $referer = "settings.php";
		$errcode="error=10";
		header("Location: $referer?$errcode");
        //$message = "Password is incorrect! ";
    }

}
?>
