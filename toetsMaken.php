<?php
    include "scripts/database/inc/session.inc.php";  
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require 'scripts/database/inc/config.inc.php';
    require 'scripts/models/ToetsMaak.php';
    require 'scripts/controllers/ToetsMaakController.php';
    $ctr = new ToetsMaakController();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormToets - Toets</title>
    <script src="scripts/script.js" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body class="bg-dark text-white">
    <div class="navbarAlert w-100"></div>
    <form action="home.php" method="post">
        <button type="submit" class="btn btn-danger mt-3" style="margin-left: 10px" name="toets_stoppen" type="button">Terug</button>
    </form>
    <?php
        if(isset($_GET['toets_id']) && is_numeric($_GET['toets_id'])){
            $user_id = $_SESSION['id'];
            $timestamp = htmlentities($_GET['toets_id']);
                
            $ctr->controlleToets($user_id, $timestamp);
        }else{
            if(isset($_SESSION['toets_id_maken']) && is_numeric($_SESSION['toets_id_maken']) && isset($_SESSION['toets_password']) && is_numeric($_SESSION['toets_password']) && $_SESSION['toets_password'] == $_SESSION['toets_id_maken']){
                $ctr->toetsMaken($_SESSION['toets_id_maken']);
            }else{
                if(isset($_SESSION['toets_id_maken'])){
                    $user_id = $_SESSION['id'];
                    $ctr->checkToets2($user_id, $_SESSION['toets_id_maken']);
                }else{
                    header("location: home.php?message=Toets is niet gevonden!");
                }
            }
        }

        


       ?>
</body>
</html>