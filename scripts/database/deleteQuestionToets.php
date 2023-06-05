<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    require "inc/config.inc.php";
    
    if(isset($_POST['verwijder_vraag_id']) && is_numeric($_POST['verwijder_vraag_id'])){
        $vraag_id = htmlentities($_POST["verwijder_vraag_id"]);

        $query = "DELETE FROM `Toetsvraag` WHERE toetsvraag_id = " . $vraag_id; 

        if(mysqli_query($mysqli,$query)){
            echo "true";
        }else{
            echo "false";                
        }    
    }

?>