<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- <div class="navbar-header">
                <a class="active" href='home.php'>VoiceMe</a>
            </div> -->
    <ul class="nav navbar-nav">
        <li><a class="active" href='home.php'>VoiceMe</a></li>
        <li><a href='search.php'>Search</a></li>
        <li><a href='settings.php'>Settings</a></li>
        <li><a href='contactus.php'>Contact Us</a></li>
        <li><a href='aboutus.php'>About Us</a></li>
        <!-- <a href='search.php'>Search</a>
        <a href='settings.php'>Settings</a>
        <a href='contactus.php'>Contact Us</a>
        <a href='aboutus.php'>About Us</a> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">        
    <li><?php
            if ($_SESSION['logged_in']==true){
                echo $_SESSION['user'];
            }elseif ($_SESSION['logged_in']==false){
                echo 'failed';
            }
                ?><img src="images/<?php echo $_SESSION["image"]; ?>" alt=""width="40" height="40" style="border-radius: 50%;">
    </li>   
    
    <li><a href="logout.php">Log Out</a></li>
        <!-- <a style="float:right;" href="logout.php">Log Out</a>
        <strong style="float:right;"> -->
    </nav>