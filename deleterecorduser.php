<?php
include "validation.php";
include "db_conn.php";
?>

<?php 

$audio_id = $_GET['rid'];

$query = "DELETE FROM `records` WHERE id LIKE '$audio_id'";
$result = mysqli_query($conn, $query);

if ($result){
    $referer = "home.php";
    $errcode="msg=3";
    header("Location: $referer?$errcode");
}else{
    $referer = "home.php";
    $errcode="msg=4";
    header("Location: $referer?$errcode");
}

?>