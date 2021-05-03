<?php
    include "adminvalidation.php";
?>




<?php

    $_SESSION['logged_in']==false;

    session_destroy();

    header("Location: adminlogin.php");

?>