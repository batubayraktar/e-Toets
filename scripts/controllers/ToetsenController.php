<?php

    class ToetsController
    {
        private $toets;
        public function __construct()
        {
            $this->toets = new Toets();
        }

        public function toetsen($user_id){
            //Tabel toetsen ophalen van user
            $toets_data = $this->toets->getToetsen($user_id);
            $toets_data_gemaakt = $this->toets->getToetsenGemaakt($user_id);

            //tabel op scherm laten zien
            include "views/userTable.php";
        }
        
        public function toetsLaden($toets_id){
            //een toets gegevens ophalen van een toets
            $toets_data = $this->toets->selectToets($toets_id);
            $toets_vragen = $this->toets->selectToetsVragen($toets_id);

            //tabel op scherm laten zien
            include "views/bewerk_view.php"; 
        }

        protected function toetsVerwijderen($toets_id){
            if($this->toets->deleteToets($toets_id)){
                header("location: home.php?delete=true");
            }else{
                header("location: home.php?delete=false");
            }
        }
    }