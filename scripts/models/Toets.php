<?php 

    class Toets
    {
        public $toets_id = null;
        public $naam = "";
        public $beschrijving = "";
        public $aanmaakTijd = "";
        public $tinyUrl = "";
        public $timestamp = null;

        //SELECTEER ALLE TOETSEN VAN EEN USER
        public function getToetsen($user_id){
            global $mysqli;

            $query = "SELECT `toets_id` FROM `Toets` WHERE `user_id` = $user_id ORDER BY toets_id;";
            $result = mysqli_query($mysqli, $query);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $toetsAdd = new Toets();
                    $toetsAdd->loadToets($row['toets_id']);
                    $toetsen[] = $toetsAdd;
                }
                return $toetsen;
            }
            
        }

        //SELECTEER EEN TOETSEN MET ID
        public function selectToets($toets_id){
            $toetsAdd = new Toets();
            $toetsAdd->loadToets($toets_id);
            $toetsen[] = $toetsAdd;
            return $toetsen;
            
        }

        public function selectToetsVragen($toets_id){
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

        //SELECTEER ALLE GEMAAKTE TOETSEN VAN EEN USER
        public function getToetsenGemaakt($user_id){
            global $mysqli;

            $query = "SELECT `toets_id` FROM `Gemaaktte_toets` WHERE `user_id` = $user_id ORDER BY toets_id;";
            $result = mysqli_query($mysqli, $query);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $toetsAdd = new Toets();
                    $toetsAdd->loadToets($row['toets_id']);
                    $toetsen[] = $toetsAdd;
                }
                return $toetsen;
            }
            
        }

        //Selecteer een toets
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
        //Toets verwijderen met id
        protected function deleteToets($toets_id){
            global $mysqli;
            $query = "DELETE FROM `Toets` WHERE toets_id = " . $toets_id;
            $query2 = "DELETE FROM `Toetsvraag` WHERE toets_id = " . $toets_id; 

            if(mysqli_query($mysqli,$query) && mysqli_query($mysqli,$query2)){
                return true;
            }else{
                return false;                
            }

        }
    }