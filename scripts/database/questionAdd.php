<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    require "inc/config.inc.php";

    if(isset($_POST['new_vraag']) && isset($_POST['add_vraag_toets_id']) && isset($_POST['new_antwoord']) && isset($_POST['new_vraag_var1']) && isset($_POST['new_vraag_var2']) && isset($_POST['new_vraag_var3'])){
        $id = htmlentities($_POST['add_vraag_toets_id']);
        $vraag = htmlentities($_POST['new_vraag']);
        $antwoord = htmlentities($_POST['new_antwoord']);

        $var1 = htmlentities($_POST['new_vraag_var1']);
        $var2 = htmlentities($_POST['new_vraag_var2']);
        $var3 = htmlentities($_POST['new_vraag_var3']);

        $varianten = json_encode(array("$var1", "$var2", "$var3", "$antwoord"));

        
        $query = "INSERT INTO `Toetsvraag`(`vraag`, `varianten`, `antwoord`, `toets_id`) VALUES ('$vraag','$varianten','$antwoord', $id)";

        if(mysqli_query($mysqli, $query))
        {
            echo "true";
        }else{
            echo "false";          
        }  
    }
    
?>
