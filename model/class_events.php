<?php

    //Class Speakers with all functions related to Speakers

    class Events extends DataBase {

        protected $id;
        public $title, $type, $facebook_link, $thematic, $beginning, $ending, $ticketing, $emplacement_name, $emplacement_facebook_link, $emplacement_website, $address, $address_link, $description, $price, $cancelation, $id_speaker_1, $id_speaker_2, $id_speaker_3, $id_speaker_4; 

        //Function returning a table with all infos of all events - to be tested
        public function listAllEvents(){
            
            $sql = "SELECT * from events";
            $query = $this->connexion->prepare($sql);
            $query->execute();
            $allEvents= $query->fetchAll();
            
            return $allEvents;
        }

        //Function returning an array with the infos of the concerned event  - to be tested
        public function eventInfos($id) {

            $sql = "SELECT * FROM events WHERE id = :id";
            $query = $this->connexion->prepare($sql);
            $query->execute([':id'=>$id]);

            return $speakerInfos = $query->fetch();
        }

        //Function adding a new event to the database - to be tested
        public function addEvent($title, $type, $facebook_link, $thematic, $beginning, $ending, $ticketing, $emplacement_name, $emplacement_facebook_link, $emplacement_website, $address, $address_link, $description, $price, $cancelation, $id_speaker_1, $id_speaker_2, $id_speaker_3, $id_speaker_4){

            $data = [
                ':title'=>$title,
                ':type'=>$type,
                ':facebook_link'=>$facebook_link,
                ':thematic'=>$thematic,
                ':beginning'=>$beginning,
                'ending'=>$ending,
                'ticketing'=>$ticketing,
                'emplacement_name'=>$emplacement_name,
                'emplacement_facebook_link'=>$emplacement_facebook_link,
                'emplacement_website'=>$emplacement_website,
                'address'=>$address,
                'address_link'=>$address_link,
                'description'=>$description,
                'price'=>$price,
                'cancelation'=>$cancelation,
                'id_speaker_1'=>$id_speaker_1,
                'id_speaker_2'=>$id_speaker_2,
                'id_speaker_3'=>$id_speaker_3,
                'id_speaker_4'=>$id_speaker_4,
            ];

            $sql = "INSERT INTO events (title, type, facebook_link, thematic, beginning, ending, ticketing, emplacement_name, emplacement_facebook_link, emplacement_website, addreess, address_link, description, price, cancelation, id_speaker_1, id_speaker_2, id_speaker_3, id_speaker_4) 
            VALUES (:title, :type, :facebook_link, :thematic, :beginning, :ending, :ticketing, :emplacement_name, :emplacement_facebook_link, :emplacement_website, :addreess, :address_link, :description, :price, :cancelation, :id_speaker_1, :id_speaker_2, :id_speaker_3, :id_speaker_4)";
            $query = $this->connexion->prepare($sql);
            $query->execute($data);

        }

        //Function updating a speaker from the database - to be tested
        public function updateEvent($title, $type, $facebook_link, $thematic, $beginning, $ending, $ticketing, $emplacement_name, $emplacement_facebook_link, $emplacement_website, $address, $address_link, $description, $price, $cancelation, $id_speaker_1, $id_speaker_2, $id_speaker_3, $id_speaker_4){

            $data = [
                ':title'=>$title,
                ':type'=>$type,
                ':facebook_link'=>$facebook_link,
                ':thematic'=>$thematic,
                ':beginning'=>$beginning,
                'ending'=>$ending,
                'ticketing'=>$ticketing,
                'emplacement_name'=>$emplacement_name,
                'emplacement_facebook_link'=>$emplacement_facebook_link,
                'emplacement_website'=>$emplacement_website,
                'address'=>$address,
                'address_link'=>$address_link,
                'description'=>$description,
                'price'=>$price,
                'cancelation'=>$cancelation,
                'id_speaker_1'=>$id_speaker_1,
                'id_speaker_2'=>$id_speaker_2,
                'id_speaker_3'=>$id_speaker_3,
                'id_speaker_4'=>$id_speaker_4,
            ];

            $sql = "UPDATE speakers SET title = :title, type = :type, facebook_link = :facebook_link, thematic = :thematic, beginning = :beginning, ending = :ending, ticketing = :ticketing, emplacement_name = :emplacement_name, emplacement_facebook_link = :emplacement_facebook_link, emplacement_website = :emplacement_website, addreess = :address, address_link = :address_link, description = :description, price = :price, cancelation = :cancelation, id_speaker_1 = :id_speaker_1, id_speaker_2 = :id_speaker_2, id_speaker_3 = :id_speaker_3, id_speaker_4 = :id_speaker_4)";
            $query = $this->connexion->prepare($sql);
            $query->execute($data);

        }

        //Function deleting a speaker from the database - tested/working
        public function deleteEvent($id) {
            $sql = "DELETE FROM events WHERE id = :id";
            $query = $this->connexion->prepare($sql);
            $query->execute([':id'=>$id]);
        }

        








    }



?>