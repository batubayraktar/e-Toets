<?php

    class ToetsMaakController
    {
        private $toets;
        public function __construct()
        {
            $this->toets = new ToetsMaak();
        }

        public function controlleToets($user_id, $timestamp){
            $getToetsID = $this->toets->issetToets($timestamp); // toets id
            $toets_id = intval($getToetsID);
            //echo $toets_id;
        
            if(is_numeric($toets_id)){
                //echo $toets_id;

                $check = $this->toets->gemaaktteToets($user_id, $toets_id); // Update: Call to the gemaaktteToets function
            
                //var_dump($check);
                if(intval($check) == 1){
                    $resultaat = $this->toets->selectToetsResultaat($user_id, $toets_id);
                    include "views/toetsEerderGemaakt.php";
                    include "views/toets_result_view.php";
                }else{
                    $_SESSION['toets_id_maken'] = $toets_id;
                    include "views/toets_maak_log_in.php";
                }
            }else{
                header("location: home.php?message=Toets is niet gevonden!");
            }
        }
        
        public function checkToets2($user_id, $toets_id){
            $check = $this->toets->gemaaktteToets($user_id, $toets_id); // Update: Call to the gemaaktteToets function
            
            //var_dump($resultaat);
            if(intval($check) == 1){
                $resultaat = $this->toets->selectToetsResultaat($user_id, $toets_id);
                include "views/toetsEerderGemaakt.php";
                include "views/toets_result_view.php";
            }
        }
        
        public function toetsMaken($toets_id){
            //een toets gegevens ophalen van een toets
            $toets_data = $this->toets->getToets($toets_id);
            $toets_vragen = $this->toets->getVragen($toets_id);

            //tabel op scherm laten zien
            include "views/toetsMaken_view.php"; 
        }

        // public function toetsResultaat($user_id, $toets_id){

        //     $resultaat = $this->toets->selectToetsResultaat($user_id, $toets_id);

        //     include "views/toets_result_view.php"; 
        // }

        // public function checkGemaaktteToets($user_id, $timestamp_id){
        //     $haalToetsOp = $this->toets->getToets_id($user_id, $timestamp_id);

        //     $_SESSION['toets_id_maak'] = $haalToetsOp;

        //     $isGemaaktCheck = $this->toets->checkGemaakt($user_id, $haalToetsOp);

        //     if($isGemaaktCheck){
        //         $_SESSION['toetsEerderGemaakt'] = "gemaakt";
        //     }
        // }

        // public function chechTwee($user_id, $toets_id){
        //     $isGemaaktCheck = $this->toets->checkGemaakt($user_id, $toets_id);

        //     if($isGemaaktCheck){
        //         $_SESSION['toetsEerderGemaakt'] = "gemaakt";
        //     }
        // }

    }