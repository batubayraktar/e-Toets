<?php
    include "scripts/database/inc/session.inc.php";
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
    <div class="navbarAlert z-3 w-100 position-sticky top-0 start-0"></div>
    <!-- HEADER -->
    <?php include "views/header.php";?>
    <a href="home.php" style="margin: 10px;" class="btn btn-light pull-right" >Terug</a>
    <!-- BODY -->
    <?php
        if(isset($_POST['bewerk_toets_id']) && is_numeric($_POST['bewerk_toets_id'])){
            $toets_id = $_POST['bewerk_toets_id'];
            //echo $toets_id;
            $_SESSION['bewerk_toets_id'] = $_POST['bewerk_toets_id'];
            $ctr->toetsLaden($toets_id);
        }else{
            if(isset($_SESSION['bewerk_toets_id'])){
                $toets_id = $_SESSION['bewerk_toets_id'];
                $ctr->toetsLaden($toets_id);
            }else{
                header("location: home.php");
            }
        }
    ?>
</body>
</html>