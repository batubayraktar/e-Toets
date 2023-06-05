<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header("location: ./index.php?message=U bent niet ingelogd.");
        exit;
    }
?>