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


    $caption = htmlentities($_POST['caption']);
    $display_choice = htmlentities($_POST['display']);
    $event = htmlentities($_POST['event']);
    $speaker = htmlentities($_POST['speaker']);

    if(empty($_FILE['image'])) {
        $valid = false;
        echo "Veuillez chosiir une image";
    }

    if(empty($caption)) {
        $valid = false;
        echo "Veuillez renseigner une légende";
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

    }

    if(isset($speaker)) {
        $speakerId = new Speakers();
        $id = $speakerId->getSpeakerId($speaker);
        $id_speaker = $id['id'];

    }

    if(isset($_FILES['banner']) && !empty($_FILES['banner']['name'])) { 
        $max_size =  2097152 ; // security - limit 2mo
        $valid_extensions = array('jpg', 'jpeg', 'gif', 'png'); // security - only images
        $extension_upload = strtolower(substr(strrchr($_FILES['banner']['name'], '.'), 1)); // return the files extension with strrch and delete the point with substr, and all to lowercase with strtolower

        if ($_FILES['banner']['size'] > $max_size) {
            $valid = false;
            echo "Le fichier ne doit pas dépasser 2mo";

        } else if (!in_array($extension_upload, $valid_extensions)) { 
            $valid = false;
            echo "Le fichier doit être au format jpg, jpeg, gif ou png";

        } else {
            $file_path =  "../../../view/assets/events/pictures/".$title.".".$extension_upload;
            $result = move_uploaded_file($_FILES['banner']['tmp_name'], $file_path);
            $banner = $title.".".$extension_upload;

            if($result == false) {
                $valid = false;
                echo "Erreur lors de l'importation de votre bannière d'évènement";
            }

            
        }

        
    }

}



?>