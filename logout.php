<?php
    include "validation.php";
?>




<?php

    $_SESSION['logged_in']==false;

    session_destroy();

    header("Location: index.php");

?>