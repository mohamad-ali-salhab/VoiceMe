<?php
try {
    $uploadDir="recordings/";
    $typeFIle=explode("/",$_FILES['record']['type']);
    $upload_file=$uploadDir.$_FILES['record']['name'];
    
    if(move_uploaded_file($_FILES['record']['tmp_name'],$upload_file))
    {
        try
		{
			 $conn = new PDO("mysql:host=localhost;dbname=test;connectionpooling=0", "root", "");	
			 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $stmt = $conn->prepare("insert into records(file_name,file_path,create_at)
                    VALUES(:field1,:field2,'".date("Y-m-d H:i:S")."')");
					$stmt->execute(array(':field1' =>$_FILES['record']['name'], ':field2' => $upload_file));
					$affected_rows = $stmt->rowCount();
            // $sql = "INSERT INTO `records`(`file_name`, `file_path`, `receiver_name`, `create_at`) VALUES ('$_FILES['record']['name']','$upload_file','g','22312')";
            // $insert_query = mysqli_query($conn, $sql);
            // if ($insert_query){
            //     echo "Done";
            // }else{
            //     echo"Failed";
            // }
			 
			
		}
		catch(PDOException $e) {
			var_dump($e->getMessage());
		}
        $response=array("data"=>"Data Sent", "status"=>"1");      
    }
    else
    { 
        $response=array("data"=>"Error", "status"=>"0");    
    } 
    //$response=array("data"=>$_FILES['record']['tmp_name']);      
 }
catch(Exception $e) {
       
    $response=array("data"=>"Error", "status"=>"0");    
   
 }

 //$response=array("data"=>"DAMN");

 echo json_encode($response);
 //echo $response;


