<?php

    require('database.php');

    

    //Class Speakers with all functions related to Speakers

    class Speakers extends DataBase {

        protected $id;
        public $firstname, $lastname, $job, $company, $website, $instagram, $linkedin, $facebook, $contact_phone, $contact_email ;


        //Function returning a table with all infos of the speakers - tested/working
        public function listAll(){
            
            $sql = "SELECT * from speakers";
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
        public function addSpeaker($firstname, $lastname, $job, $company, $website, $instagram, $linkedin, $facebook, $contact_phone, $contact_email){

            $data = [
                ':firstname'=>$firstname,
                ':lastname'=>$lastname,
                ':job'=>$job,
                ':company'=>$company,
                ':website'=>$website,
                'instagram'=>$instagram,
                'linkedin'=>$linkedin,
                'facebook'=>$facebook,
                'contact_phone'=>$contact_phone,
                'contact_email'=>$contact_email,
            ];

            $sql = "INSERT INTO speakers (firstname, lastname, job, company, website, instagram, linkedin, facebook, contact_phone, contact_email) 
            VALUES (:firstname, :lastname, :job, :company, :website, :instagram, :linkedin, :facebook, :contact_phone, :contact_email)";
            $query = $this->connexion->prepare($sql);
            $query->execute($data);

        }

        //Function updating a speaker from the database - tested/working
        public function updateSpeaker($id, $firstname, $lastname, $job, $company, $website, $instagram, $linkedin, $facebook, $contact_phone, $contact_email){

            $data = [
                ':id'=>$id,
                ':firstname'=>$firstname,
                ':lastname'=>$lastname,
                ':job'=>$job,
                ':company'=>$company,
                ':website'=>$website,
                'instagram'=>$instagram,
                'linkedin'=>$linkedin,
                'facebook'=>$facebook,
                'contact_phone'=>$contact_phone,
                'contact_email'=>$contact_email,
            ];

            $sql = "UPDATE speakers SET firstname = :firstname, lastname = :lastname, job = :job, company = :company, website = :website, instagram = :instagram, linkedin = :linkedin, facebook = :facebook, contact_phone = :contact_phone, contact_email = :contact_email WHERE id=:id ";
            $query = $this->connexion->prepare($sql);
            $query->execute($data);

        }

        //Function deleting a speaker from the database - tested/working
        public function deleteSpeaker($id) {
            $sql = "DELETE FROM speakers WHERE id = :id";
            $query = $this->connexion->prepare($sql);
            $query->execute([':id'=>$id]);
        }

        








    }



?>