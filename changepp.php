<?php
include "validation.php"
?>

<?php

if(isset($_FILES['image'])){

    include "db_conn.php";


    $username = $_SESSION['user'];
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
                $query = mysqli_query($conn,"SELECT * FROM users WHERE Username = '".$username."'");
                if(mysqli_num_rows($query)==1){
                    $sql = "UPDATE users SET Image='$new_img_name' WHERE Username='".$username."'";
                    if (mysqli_query($conn, $sql)) {
                        //session_destroy();
                        $_SESSION["image"] = $new_img_name;
                        $referer = "settings.php";
                        $msgCode="msg=1";
                        header("Location: $referer?$msgCode");
                        
                        //die ("Your Profile Picture has been changed.<a href='login.php'>Return </a>to the main page"); 
                      } else {
                        echo "Error updating Profile Picture: " . mysqli_error($conn);
                    }
                }else{
                    echo "Something went wrong! Try again later";
                }
            }echo "Error uploading picture to files!";
        }
        else{
            echo "Please upload an image file - jpeg, png, jpg";
        }
    }
    else{
        //echo "Please upload an image file - jpeg, png, jpg";
        $referer = "settings.php";
		$errcode="error=8";
		header("Location: $referer?$errcode");
    }
}

else{
    echo "hadii Enter the required data";
}   
?>