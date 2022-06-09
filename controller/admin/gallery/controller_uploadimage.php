<?php

require('../../../model/database.php');
require('../../../model/class_events.php');
require('../../../model/class_speakers.php');
require('../../../model/class_gallery.php');

// CHANGER LE NOM DE LIMAGE TELECHARGER EN AJOUTANT UN INPUT NAME A LIMAGE EN PLUS DE LA LEGENDE
// PENSER A BIEN CHANGER LA VARIABLE TITLE LIGNE 73,
// VERIFIER SI TOUT MARCHE 
$eventsList = new Events();
$events = $eventsList->listAllEvents();

$speakersList = new Speakers();
$speakers = $speakersList->listAll();

$valid = true;

if (isset($_POST['upload'])) {


    @$title = htmlentities($_POST['title']);
    @$caption = htmlentities($_POST['caption']);
    @$display_choice = htmlentities($_POST['display']);
    @$event = htmlentities($_POST['event']);
    @$speaker = htmlentities($_POST['speaker']);

    if(empty($_FILES['picture'])) {
        $valid = false;
        echo "Veuillez chosiir une image";
    }

    if(empty($title) || empty($caption) ) {
        $valid = false;
        echo "Les champs * sont obligatoires";
    }


    if($display_choice == "Oui") {
        $display = 1 ;
    } else if ($display_choice =="Non") { 
        $display = 0;
    } else { 
        $valid = false;
        echo "Erreur dans le choix de l'affichage : choisissez oui ou non";
    }

    if(isset($event)) {
        $eventId = new Events();
        $id = $eventId->getEventId($event);
        $id_event = $id['id'];
        

    } else { 
        $id_event = null;
    }

    if(isset($speaker)) {
        $speakerId = new Speakers();
        $id = $speakerId->getSpeakerId($speaker);
        $id_speaker = $id['id'];

    } else {
        $id_speaker = null;
    }


    if(isset($_FILES['picture']) && !empty($_FILES['picture']['name'])) { 
        
        $max_size =  2097152 ; // security - limit 2mo
        $valid_extensions = array('jpg', 'jpeg', 'gif', 'png'); // security - only images
        
        foreach ($_FILES['picture']['size'] as $picture_size){
            if ($picture_size > $max_size) {
                $valid = false;
                echo "Par mesure de sécurité, veuillez seulement importer des images inférieures à 2mo.";
                return false;
            }
        }

        $i = 0;


        foreach (array_combine($_FILES['picture']['name'], $_FILES['picture']['tmp_name']) as  $picture_name => $tmp_name) {
            var_dump($picture_name);
            var_dump($tmp_name);


            $i++;

            $extension_upload = strtolower(substr(strrchr($picture_name, '.'), 1)); // return the files extension with strrch and delete the point with substr, and all to lowercase with strtolower
            if (!in_array($extension_upload, $valid_extensions)) { 
                $valid = false;
                echo "Le fichier doit être au format jpg, jpeg, gif ou png";
                return false;
    
            } else {
                $file_path =  "../../../view/assets/events/pictures/".$picture_name;
                $result = move_uploaded_file($tmp_name, $file_path);
                $picture = $title."_".$i.".".$extension_upload;
                var_dump($picture);
    
                if($result == false) {
                    $valid = false;
                    echo "Erreur lors de l'importation de votre bannière d'évènement";
                    return false;
                }

                if ($valid == true) {
                    $uploadImage = new Gallery();
                    $uploadImage->uploadImage($picture, $caption, $display, $id_event, $id_speaker);
                    echo "Votre photo a bien été ajoutée à la gallerie";

                }
    
                
            }



        }






        
    }



}



?>