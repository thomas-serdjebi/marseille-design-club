<?php

class DataBase {

    //Database connection

    protected $db; 

    public function __construct(){

        try{
            $db = new PDO("mysql:host=localhost;dbname=marseilledesignclub", 'root', '');
            $db->exec('SET NAMES utf8');
            $this->connexion = $db;
            return $db;
            
        }
          
          catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }

    }
}



?>