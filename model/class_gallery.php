<?php

    //Class Speakers with all functions related to Speakers

    class Gallery extends DataBase {

        protected $id;
        public $img_name, $img_caption, $id_speaker, $id_event;

        //Function to upload an image to the gallery - to be tested
        public function uploadImage($picture, $img_caption, $display, $id_speaker, $id_event){

            $data = [
                'img_name' => $picture,
                'img_caption' => $img_caption,
                'display' => $display,
                'id_speaker' => $id_speaker,
                'id_event' => $id_event,
            ];


            $sql = "INSERT INTO gallery (img_name, img_caption, display, id_speaker, id_event) VALUES (:img_name, :img_caption, :display, :id_speaker, :id_event)";
            $query = $this->connexion->prepare($sql);
            $query->execute($data);
        }

        //Function to return a list of all the images registered in the gallery - to be tested
        public function listAllImages(){
            
            $sql = "SELECT * FROM gallery ORDER BY id DESC";
            $query = $this->$connexion->prepare($sql);
            $query->execute();

            $listAllImages =  $query->fetchAll();

            return $listAllImages;
        }

        //Function to display all images from the gallery - to be tested
        public function displayAllImages(){

            
            
        }
        

    }
?>