<?php
session_start();
include "db_conn.php";
?>

<?php

$UserToSend = $_SESSION['usertosend'];

// $query = "SELECT * FROM `users` WHERE `Username` LIKE '{$UserToSend}%'";
// $result = mysqli_query($conn, $query);
// $send = "INSERT INTO `users`(`Warnings`) VALUES ('1') (SELECT               WHERE `Username` LIKE '{$UserToSend}'";
// $insert_query = mysqli_query($conn, $send);
// if ($insert_query){
//     header("Location: adminsendwarning.php");
// }else{
//     echo "Failed";
// }

?>