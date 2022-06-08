<?php

    //Class Speakers with all functions related to Speakers

    class Gallery extends DataBase {

        protected $id;

        public function transfert(){
            $ret = false;
            $img_blob = '';
            $img_size = '';
            $img_type = '';
            $img_name = '';
            $img_caption = '';
            $img_use = '';
            $img_id_event = '';
            $max_size = 250000;
            $ret = is_uploaded_file($_FILES['fic']['tmp_name']);

            if(!$ret) {
                echo"Problème de transfert";
                return false;
            } else { 
                //The file is well received
                $img_size = $_FILES['fic']['size'];
                echo "taille de l'image $img_size";

                if ($img_size > $max_size ) {
                    echo "L'image doit être inférieure à 250 000 ";
                    return false;
                }

                $img_type = $_FILES['fic']['type'];
                $img_name = $_FILES['fic']['name'];
                $img_id_event = $_POST['id_event'];
                $img_use = $_POST['img_use'];

                
            }

        }

    }
?>