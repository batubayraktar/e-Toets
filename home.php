<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    include "scripts/database/inc/session.inc.php";
    
    if(isset($_POST['toets_stoppen'])){
        $_SESSION['toets_password'] = null;
        $_SESSION['toets_id_maken'] = null;
    }
    if(isset($_SESSION['toets_id_maken'])){
        header("location: ./toetsMaken.php");
        exit;
    }
    
    require 'scripts/database/inc/config.inc.php';
    require 'scripts/models/Toets.php';
    require 'scripts/controllers/ToetsenController.php';
    $ctr = new ToetsController();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormToets - Home</title>
    <script src="scripts/script.js" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body class="bg-dark text-white" id="home">
    <div class="navbarAlert w-100"></div>
    <!-- HEADER -->
    <?php include "views/header.php";?>
    
    <!-- BODY -->

    <!-- button modal nieuwe toets aanmaak -->
    <?php include "views/modal_nieuwe_toets.php";?>

    <?php $ctr->toetsen($_SESSION['id']);?>
</body>
</html>