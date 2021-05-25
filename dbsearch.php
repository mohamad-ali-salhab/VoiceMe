<?php
require_once "db_conn.php";

if (isset($_GET['term'])) {
  
    $query = "SELECT * FROM `users` WHERE `Username` LIKE '{$_GET['term']}%' LIMIT 25";
    $result = mysqli_query($conn, $query);
 
    if (mysqli_num_rows($result) > 0) {
        while ($username = mysqli_fetch_array($result)) {
        $res[] = $username['Username'];
        }
    } else {
      $res = array();
    }
    echo json_encode($res);
}