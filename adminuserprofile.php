<?php
include "db_conn.php";
session_start();

?>

<?php
    echo "
    <table style=\"border-collapse: collapse;margin-right: auto;margin-left:auto;\" border=\"i\">
    <tr style='font-weight:bold;'>
    <td>Image</td>
    <td>Username</td>
    <td>Full Name</td>
    <td>Location</td>
    </tr>";

    if ($_GET['un'] != NULL){
        $UserToSend = $_GET['un'];
        include "db_conn.php";
        $query = "SELECT * FROM `users` WHERE `Username` LIKE '{$UserToSend}%'";
        $result = mysqli_query($conn, $query);
        while($data = mysqli_fetch_array($result))
        {
        echo "
        <tr>
            <td><img src=\"images/".$data['Image']."\" width=\"100\" height=\"100\" style=\"border-radius: 50%;\"></td>
            <td>".$data['Username']."</td>
            <td>".$data['First Name']." ".$data['Last Name']."</td>
            <td>".$data['Country'].", ".$data['State'].", ".$data['City']."</td>          
        </tr>
        ";

        }
        $_SESSION["usertosend"]=$_GET['un'];
        echo "</table>";
        echo "
            <form method=\"POST\" action=\"adminsendwarning.php\">
                <button type=\"submit\" >Send Warning</button>
            </form>

            <form method=\"POST\" action=\"adminsendmessage.php\">
                <button type=\"submit\" >Send Message</button>
            </form>

            <form method=\"POST\" action=\"adminbanuser.php\">
                <button type=\"submit\" >BAN USER</button>
            </form>"

        ;
        }else{
            echo "Username not found!";
        }

?>
<!-- 
if ($_GET['un'] != NULL){
    $UserToSend = $_GET['un'];
    $query = "SELECT * FROM `users` WHERE `Username` LIKE '{$UserToSend}%'";
    $result = mysqli_query($conn, $query);
    $send = "INSERT INTO `users`(`Warnings`) VALUES ('1')";
    $insert_query = mysqli_query($conn, $send);
    if ($insert_query){
        header("Location: adminsendwarning.php");
    }else{
        echo "Failed";
    }
}
?> -->