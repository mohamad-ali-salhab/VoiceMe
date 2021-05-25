<?php
include "adminvalidation.php";
include "db_conn.php";
?>

<?php 

$usertodelete = $_GET['un'];

$query = "DELETE FROM `users` WHERE Username LIKE '$usertodelete'";
$result = mysqli_query($conn, $query);

if ($result){
    $referer = "adminusers.php";
    $errcode="msg=3";
    header("Location: $referer?$errcode");
}else{
    $referer = "adminusers.php";
    $errcode="msg=4";
    header("Location: $referer?$errcode");
}

?>