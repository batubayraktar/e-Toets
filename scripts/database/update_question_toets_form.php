<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    require "inc/config.inc.php";
    
    if(isset($_POST['update_vraag_id']) && is_numeric($_POST['update_vraag_id'])){
        $id = htmlentities($_POST['update_vraag_id']);
        $vraag = htmlentities($_POST['update_vraag']);
        $antwoord = htmlentities($_POST['update_antwoord']);

        $var1 = htmlentities($_POST['update_vraag_var1']);
        $var2 = htmlentities($_POST['update_vraag_var2']);
        $var3 = htmlentities($_POST['update_vraag_var3']);
        $varianten = json_encode(array("$var1", "$var2", "$var3", "$antwoord"));

        $query = "UPDATE `Toetsvraag` SET `vraag`='$vraag',`varianten`='$varianten',`antwoord`='$antwoord' WHERE `toetsvraag_id` = $id"; 

        if(mysqli_query($mysqli,$query)){
            echo "true";
        }else{
            echo "false";                
        }    
    }

?>