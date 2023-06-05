<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    require "inc/config.inc.php";
    
    if(isset($_POST['toets_hidden_id']) && is_numeric($_POST['toets_hidden_id'])){
        $toets_id = htmlentities($_POST["toets_hidden_id"]);

        $query = "DELETE FROM `Toets` WHERE toets_id = " . $toets_id;
        $query2 = "DELETE FROM `Toetsvraag` WHERE toets_id = " . $toets_id; 

        if(mysqli_query($mysqli,$query) && mysqli_query($mysqli,$query2)){
            echo "true";
        }else{
            echo "false";                
        }    
    }

?>