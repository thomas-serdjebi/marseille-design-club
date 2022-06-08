<?php

    //Class Speakers with all functions related to Speakers

    class Gallery extends DataBase {

        protected $id;
        public $img_name, $img_caption, $id_speaker, $id_event;

        //Function to upload an image to the gallery - to be tested
        public function uploadImage($img_name, $img_caption, $id_speaker, $id_event){

            $data = [
                'img_name' => $img_name,
                'img_caption' => $img_caption,
                'id_speaker' => $id_speaker,
                'id_event' => $id_event,
            ];
            
            $sql = "INSERT INTO gallery (img_name, img_caption, id_speaker, id_event) VALUES (:img_name, :img_caption, :id_speaker, :id_event)";
            $query = $this->$db->prepare($sql);
            $query->execute($data);
        }
        

    }
?>