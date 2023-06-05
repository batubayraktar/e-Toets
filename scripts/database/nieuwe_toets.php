<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

    function get_tiny_url($url)  {  
        $ch = curl_init();  
        $timeout = 5;  
        curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
        $data = curl_exec($ch);  
        curl_close($ch);  
        return $data;  
    }

    if(isset($_POST["titel"]) && isset($_POST['user_id']) && isset($_POST['wachtwoord_toets'])){
        require "inc/config.inc.php";

        session_start();
        $user_id = htmlentities($_POST["user_id"]);
        $titel = htmlentities($_POST["titel"]);
        $beschrijving = htmlentities($_POST["beschrijving"]);
        $aanmaakTijd = date("Y-m-d H:i:s");
        $wachtwoord = sha1(htmlentities($_POST['wachtwoord_toets']));

        $timeStamp = time();
        $tinyUrl = htmlentities(get_tiny_url("https://87231.stu.sd-lab.nl/BEROEPS-2/e-toets/toetsMaken.php?toets_id=$timeStamp"));

        $query = "INSERT INTO `Toets`(`toets_id`, `naam`, `beschrijving`, `user_id`, `aanmaakTijd`, `wachtwoord`, `short_url`, `timestamp`) VALUES (null ,'$titel','$beschrijving', $user_id,'$aanmaakTijd', '$wachtwoord', '$tinyUrl', '$timeStamp')";

        $result = mysqli_query($mysqli,$query); 

        if($result){
            echo "true";
        }
        else{
            echo "false";
            echo $query;
        }           
        

        mysqli_close($mysqli);

    }else{
        echo "false";
    }
    