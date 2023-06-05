<?php 

    class ToetsMaak
    {
        public $toets_id = null;
        public $naam = "";
        public $beschrijving = "";
        public $aanmaakTijd = "";
        public $tinyUrl = "";
        public $timestamp = null;

        public function loadToets($id)
            {
                global $mysqli;

                $query = "SELECT * FROM Toets WHERE toets_id = " . $id;
                $result = mysqli_query($mysqli, $query);

                if(mysqli_num_rows($result) == 1)
                {
                    $row = mysqli_fetch_array($result);

                    $this->toets_id = $id;
                    $this->naam = $row['naam'];
                    $this->beschrijving = $row['beschrijving'];
                    $this->aanmaakTijd = $row['aanmaakTijd'];
                    $this->tinyUrl = $row['short_url'];
                    $this->timestamp = $row['timestamp'];
                }
            }

            public function issetToets($timestamp){
                global $mysqli;
    
                $query = "SELECT `toets_id` FROM `Toets` WHERE `timestamp` = $timestamp";
                $result = mysqli_query($mysqli, $query);
    
                if(mysqli_num_rows($result) == 1)
                {
                    $row = mysqli_fetch_array($result);
                    return $row['toets_id'];
                }else{
                    return false;
                }
            }

        public function getToets($toets_id){
            $toetsAdd = new ToetsMaak();
            $toetsAdd->loadToets($toets_id);
            $toetsen[] = $toetsAdd;
            return $toetsen;
        }

        public function gemaaktteToets($user_id, $toets_id){
            global $mysqli;
                
            $query = "SELECT `toets_id` FROM `Gemaaktte_toets` WHERE `toets_id` = $toets_id AND `user_id` = $user_id";
            $result = mysqli_query($mysqli, $query);
        
            if($result){
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    mysqli_free_result($result);
                    return 1;
                } else {
                    mysqli_free_result($result);
                    return 0;
                }
            } else {
                return 0;
            }
        }

        public function getVragen($toets_id){
            global $mysqli;

            $toets_id = htmlentities($toets_id);
            $query = "SELECT * FROM `Toetsvraag` WHERE `toets_id` = $toets_id";

            $result = mysqli_query($mysqli, $query);

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $vragen[] = $row;
                }
                return $vragen;
            }
        }
  

    //     //SELECTEER EEN TOETSEN MET ID
    //     public function selectToets($toets_id){
    //         $toetsAdd = new ToetsMaak();
    //         $toetsAdd->loadToets($toets_id);
    //         $toetsen[] = $toetsAdd;
    //         return $toetsen;
            
    //     }

    //     public function selectToetsVragen($toets_id){
    //         global $mysqli;

    //         $toets_id = htmlentities($toets_id);

    //         $query = "SELECT * FROM `Toetsvraag` WHERE `toets_id` = $toets_id";
    //         $result = mysqli_query($mysqli, $query);
    //         if(mysqli_num_rows($result) > 0)
    //         {
    //             while($row = mysqli_fetch_assoc($result))
    //             {
    //                 $vragen[] = $row;
    //             }
    //             return $vragen;
    //         }
    //     }

    //     //Selecteer een toets
    //     public function loadToets($id)
    //     {
    //         global $mysqli;

    //         $query = "SELECT * FROM Toets WHERE toets_id = " . $id;
    //         $result = mysqli_query($mysqli, $query);

    //         if(mysqli_num_rows($result) == 1)
    //         {
    //             $row = mysqli_fetch_array($result);

    //             $this->toets_id = $id;
    //             $this->naam = $row['naam'];
    //             $this->beschrijving = $row['beschrijving'];
    //             $this->aanmaakTijd = $row['aanmaakTijd'];
    //             $this->tinyUrl = $row['short_url'];
    //             $this->timestamp = $row['timestamp'];
    //         }
    //     }

        public function selectToetsResultaat($user_id, $toets_id){
            global $mysqli;

            $query = "SELECT * FROM `Resultaat` WHERE `user_id` = $user_id AND `toets_id` = $toets_id";
            $result = mysqli_query($mysqli, $query);

            if(mysqli_num_rows($result) == 1)
            {
                $row = mysqli_fetch_assoc($result);

                return $row;
            }
        }

    //     public function checkGemaakt($user_id, $toets_id){
    //         global $mysqli;
        
    //         $query = "SELECT `toets_id` FROM `Gemaaktte_toets` WHERE `toets_id` = $toets_id AND `user_id` = $user_id";
    //         $result = mysqli_query($mysqli, $query);
        
    //         if($result){
    //             if(mysqli_num_rows($result) > 0){
    //                 $row = mysqli_fetch_assoc($result);
    //                 return true;
    //             } else {
    //                 return false;
    //             }
    //             mysqli_free_result($result);
    //         } else {
    //             return false;
    //         }
    //     }

    //     public function getToets_id($user_id, $timestamp_id){
    //         global $mysqli;

    //         $query = "SELECT `toets_id` FROM `Toets` WHERE `user_id` = $user_id AND `timestamp` = $timestamp_id";
    //         $result = mysqli_query($mysqli, $query);

    //         if(mysqli_num_rows($result) == 1)
    //         {
    //             $row = mysqli_fetch_array($result);
                
    //             return $row['toets_id'];
    //         }
    //     }
        
    }