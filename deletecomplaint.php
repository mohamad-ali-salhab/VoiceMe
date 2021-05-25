<?php
include "adminvalidation.php";
include "db_conn.php";
?>

<?php 

$complaint_id = $_GET['id'];

$query = "DELETE FROM `complaints` WHERE Complaint_ID LIKE '$complaint_id'";
$result = mysqli_query($conn, $query);

if ($result){
    $referer = "admincomplaints.php";
    $errcode="msg=3";
    header("Location: $referer?$errcode");
}else{
    $referer = "admincomplaints.php";
    $errcode="msg=4";
    header("Location: $referer?$errcode");
}

?>