<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    require "inc/config.inc.php";
    
    if(isset($_POST['update_toets_id']) && is_numeric($_POST['update_toets_id']) && isset($_POST['update_naam'])){
        $toets_id = htmlentities($_POST["update_toets_id"]);
        $nieuweNaam = htmlentities($_POST['update_naam']);

        $query = "UPDATE `Toets` SET `naam`='$nieuweNaam' WHERE `toets_id` = $toets_id";

        if(mysqli_query($mysqli,$query)){
            echo "true";
        }else{
            echo "false";                
        }    
    }
    elseif(isset($_POST['update_toets_id']) && is_numeric($_POST['update_toets_id']) && isset($_POST['update_beschrijving'])){
        $toets_id = htmlentities($_POST["update_toets_id"]);
        $nieuweBesch = htmlentities($_POST['update_beschrijving']);

        $query = "UPDATE `Toets` SET `beschrijving`='$nieuweBesch' WHERE `toets_id` = $toets_id";

        if(mysqli_query($mysqli,$query)){
            echo "true";
        }else{
            echo "false";                
        } 
    }
    elseif(isset($_POST['update_toets_id']) && is_numeric($_POST['update_toets_id']) && isset($_POST['update_wachtoord'])){
        $toets_id = htmlentities($_POST["update_toets_id"]);
        $nieuweWachtwoord = sha1(htmlentities($_POST['update_wachtoord']));

        $query = "UPDATE `Toets` SET `wachtwoord`='$nieuweWachtwoord' WHERE `toets_id` = $toets_id";

        if(mysqli_query($mysqli,$query)){
            echo "true";
        }else{
            echo "false";                
        } 
    }
?>