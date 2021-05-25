<?php
include "validation.php"
?>

<?php

if (isset($_POST['oldpass'], $_POST['newpass1'])){

    include "db_conn.php";


    $username = trim( $_SESSION['user']);
    $oldpass = trim($_POST['oldpass']);
    $new1 = trim($_POST['newpass1']);
    $options=array("cost"=>4);
    $newpass1=password_hash($new1,PASSWORD_BCRYPT,$options);
    //$newpass2 = trim($_POST['newpass2']);

    $query = mysqli_query($conn,"SELECT * FROM users WHERE Username = '".$username."'");
    //$querynewpass = "SELECT * FROM users WHERE username='$newusername'";
    if(mysqli_num_rows($query)==1){
        $data = mysqli_fetch_array($query);
        if (password_verify($oldpass,$data[4])){
            $sql = "UPDATE users SET Password='".$newpass1."' WHERE Username='".$username."'";
         
            if (mysqli_query($conn, $sql)) {
           // session_destroy();
           // die ("Your password has been changed.<a href='login.html'>Return </a>to the main page"); 
                $referer = "settings.php";
    		    $errcode="msg=2";
    		    header("Location: $referer?$errcode");
            }else {
                echo "Error updating password: " . mysqli_error($conn);
            }
        
            
        }else{
        $referer = "settings.php";
		$errcode="error=10";
		header("Location: $referer?$errcode");
        
    }
    }else{
        $referer = "settings.php";
		$errcode="error=11";
		header("Location: $referer?$errcode");
    }

}echo "Enter all passwords";
?>
