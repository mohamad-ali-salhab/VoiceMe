<?php  

session_start();

if(isset($_POST["admin"], $_POST["password"])) 
    {     
        include 'db_conn.php';

        $admin = $_POST["admin"]; 
        $password = $_POST["password"]; 

        $result1 = mysqli_query($conn,"SELECT * FROM admin WHERE admin = '".$admin."' AND  Password = '".$password."'");

        
        if(mysqli_num_rows($result1) ==1 )
        { 
        
            $_SESSION["logged_in"] = true; 
            
            $data = mysqli_fetch_array($result1);
            $_SESSION["image"] = $data[9];
            $_SESSION["user"] = $data[5]; 
            header("Location: homeadmin.php");

        }
        else
        {
            $_SESSION["logged_in"] = false;
            $referer = "loginadmin.php";
		    $errcode="error=9";
		    header("Location: $referer?$errcode");
        }
    }

?>