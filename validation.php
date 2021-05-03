<?php  

session_start();

if(isset($_POST["username"], $_POST["password"])) 
    {     
        include 'db_conn.php';

        $username = $_POST["username"]; 
        $password = $_POST["password"]; 

        $result1 = mysqli_query($conn,"SELECT * FROM users WHERE Username = '".$username."' AND  Password = '".$password."'");

        
        if(mysqli_num_rows($result1) ==1 )
        { 
        
            $_SESSION["logged_in"] = true; 
            
            $data = mysqli_fetch_array($result1);
            $_SESSION["image"] = $data[9];
            $_SESSION["user"] = $data[5]; 
            header("Location: home.php");

        }
        else
        {
            $_SESSION["logged_in"] = false;
            //echo 'The username or password are incorrect!';
            $referer = "index.php";
		    $errcode="error=9";
		    header("Location: $referer?$errcode");
            //header("Location: index.php");
        }
    }

?>