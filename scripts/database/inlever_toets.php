<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    require "inc/config.inc.php";
    
    if(isset($_POST['toets_id_maken']) && is_numeric($_POST['toets_id_maken']) && isset($_POST['inlever_toets_user_id'])){
        $toets_id = $_POST['toets_id_maken'];
        $user_id = $_POST['inlever_toets_user_id'];
        $aantal_vragen = $_POST['inlever_toets_aantal_vragen'];
        $tijdstamp = time();

        $allQueriesSuccessful = true;

        $aantalGoed = 0;
        $aantalSlecht = 0;
        
        for($i = 0; $i <= $aantal_vragen-1; $i++){
            $naam_var = "vraag_" . $i+1;
            $toets_vraag = $_POST[$naam_var];
            //echo $toets_vraag;

            $array = explode(",", $toets_vraag);

            $vraag_id = $array[0];
            $user_antwoord = $array[1];

            $checkQuery = "SELECT COUNT(`toetsvraag_id`) as aantalRows FROM `Toetsvraag` WHERE `toetsvraag_id` = $vraag_id AND `antwoord` = '$user_antwoord'";
            $resultCheck = mysqli_query($mysqli,$checkQuery);
            if($resultCheck){
                if(mysqli_num_rows($resultCheck) == 1){
                    $row = mysqli_fetch_array($resultCheck);

                    $antwoord = $row['aantalRows'];

                    if($antwoord == 0){
                        $aantalSlecht++;
                    }else{
                        $aantalGoed++;
                    }

                    $query = "INSERT INTO `Antwoord`(`antwoord_id`, `toets_id`, `user_id`, `vraag_id`, `user_antwoord`, `resultaat`, `timestamp`) VALUES (NULL, $toets_id, $user_id, $vraag_id,'$user_antwoord', $antwoord, $tijdstamp)"; 

                        if(!mysqli_query($mysqli,$query)){
                            $allQueriesSuccessful = false;
                        }

                }else{
                    $allQueriesSuccessful = false;
                }
            }else{
                $allQueriesSuccessful = false;
            }

            
        }

       

        if($allQueriesSuccessful){
            $query = "INSERT INTO `Gemaaktte_toets`(`gem_toets_id`, `toets_id`, `timestamp`, `user_id`) VALUES (NULL, $toets_id, $tijdstamp, $user_id)"; 


            $setResultQuery = "INSERT INTO `Resultaat`(`resultaat_id`, `user_id`, `toets_id`, `aantal_goed`, `aantal_slecht`) VALUES (NULL,$user_id,$toets_id,$aantalGoed,$aantalSlecht)";


            if(mysqli_query($mysqli,$query) && mysqli_query($mysqli,$setResultQuery)){
                session_start();
                $_SESSION['toets_password'] = null;
                echo "true";
            }else{
                echo "false3";
            }

        }else{
            echo "false2";
        }

  
    }else{
        echo "false1";                
    }  

?>