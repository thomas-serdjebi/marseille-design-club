<?php

    //Class Speakers with all functions related to Speakers

    class Speakers extends DataBase {

        public $id;
        public $name, $job, $company, $website, $instagram, $linkedin, $facebook, $contact_phone, $contact_email ;


        //Function returning a table with all infos of the speakers - tested/working
        public function listAll(){
            
            $sql = "SELECT * from speakers ORDER BY name ASC";
            $query = $this->connexion->prepare($sql);
            $query->execute();
            $allSpeakers = $query->fetchAll();
            
            return $allSpeakers;
        }

        //Function returning an array with the infos of the concerned speaker - tested/working
        public function speakerInfos($id) {

            $sql = "SELECT * FROM speakers WHERE id = :id";
            $query = $this->connexion->prepare($sql);
            $query->execute([':id'=>$id]);

            return $speakerInfos = $query->fetch();
        }

        //Function adding a new speaker to the database - tested/working 
        public function addSpeaker($name, $job, $company, $website, $instagram, $linkedin, $facebook, $contact_phone, $contact_email){

            $data = [
                'name'=>$name,
                'job'=>$job,
                'company'=>$company,
                'website'=>$website,
                'instagram'=>$instagram,
                'linkedin'=>$linkedin,
                'facebook'=>$facebook,
                'contact_phone'=>$contact_phone,
                'contact_email'=>$contact_email,
            ];

            $sql = "INSERT INTO speakers (name, job, company, website, instagram, linkedin, facebook, contact_phone, contact_email) 
            VALUES (:name, :job, :company, :website, :instagram, :linkedin, :facebook, :contact_phone, :contact_email)";
            $query = $this->connexion->prepare($sql);
            $query->execute($data);

        }

        //Function updating a speaker from the database - tested/working
        public function updateSpeaker($id, $name, $job, $company, $website, $instagram, $linkedin, $facebook, $contact_phone, $contact_email){

            $data = [
                'id'=>$id,
                'name'=>$name,
                'job'=>$job,
                'company'=>$company,
                'website'=>$website,
                'instagram'=>$instagram,
                'linkedin'=>$linkedin,
                'facebook'=>$facebook,
                'contact_phone'=>$contact_phone,
                'contact_email'=>$contact_email,
            ];

            $sql = "UPDATE speakers SET name = :name, job = :job, company = :company, website = :website, instagram = :instagram, linkedin = :linkedin, facebook = :facebook, contact_phone = :contact_phone, contact_email = :contact_email WHERE id=:id ";
            $query = $this->connexion->prepare($sql);
            $query->execute($data);

        }

        //Function deleting a speaker from the database - tested/working
        public function deleteSpeaker($id) {
            $sql = "DELETE FROM speakers WHERE id = :id";
            $query = $this->connexion->prepare($sql);
            $query->execute([':id'=>$id]);
        }

        //Function returning the id of a speaker from the database : used for the addevent page input speaker - to be tested
        public function getSpeakerId($name) {
            $sql = "SELECT id FROM speakers WHERE name = :name";
            $query = $this->connexion->prepare($sql);
            $query->execute(['name'=>$name]);
            
            $id = $query->fetch();

            return $id;


        }

    }



?>