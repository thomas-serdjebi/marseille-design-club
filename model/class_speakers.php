<?php

    require('database.php');

    //Class Speakers with all functions related to Speakers

    class Speakers extends DataBase {

        //Function returning a table with all infos of the speakers - tested/working
        public function listAll(){
            
            $sql = "SELECT * from speakers";
            $req = $this->connexion->prepare($sql);
            $req->execute();
            $allSpeakers = $req->fetchAll();
            
            return $allSpeakers;
        }

        //Function adding a new speaker to the database - must be tested
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
                'contact_email'=>$email,
            ];

            $sql = "INSERT INTO speakers (firstname, lastname, job, company, website, instagram, linkedin, facebook, contact_phone, contact_email) 
            VALUES (:firstname, :lastname, :job, :company, :website, :instagram, :linkedin, :facebook, :contact_phone, :contact_email)";
            $req = $this->connexion->prepare($sql);
            $req->execute($data);

        }




    }



?>