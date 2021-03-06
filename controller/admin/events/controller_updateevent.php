<?php

require('../../../model/database.php');
require('../../../model/class_events.php');
require('../../../model/class_speakers.php');
//Verifying id is only numeric to protect against script injections
if(!is_numeric($_GET['id'])){
    header('Location: ../../../index.php');

} else {

    $id = htmlspecialchars($_GET['id']);
    //Array with all the infos of the concerned event;
    $eventArray = new Events();
    $eventInfos = $eventArray->eventInfos($id);




    //Array with all the speakers for the speaker selection inside the form to update an event-tested/working

    $speakersList = new Speakers();
    $speakers = $speakersList->listAll();


    //Converts the id in the options speakers field selection to display the name of the speakers

    $speakersArray = array(
        $id_speaker_1 = (int) $eventInfos['id_speaker_1'],
        $id_speaker_2 = (int) $eventInfos['id_speaker_2'],
        $id_speaker_3 = (int) $eventInfos['id_speaker_3'],
        $id_speaker_4 = (int) $eventInfos['id_speaker_4'],
    );

    for ($i = 0 ;  isset($speakersArray[$i]); $i++) {
        
        $getSpeaker[$i] = new Speakers();
        $speakerInfos[$i] = $getSpeaker[$i]->speakerInfos($speakersArray[$i]);
        $speakerName[$i] = $speakerInfos[$i]['name'];
       
    }

    //Converts the dates to a format that can fit the datetime-local format in the update form

    $beginningDate = new DateTime($eventInfos['beginning']) ;

    //Ending is not mandatory so if it exists in the database, we convert it to display it in the form

    if ($eventInfos['ending'] != null) {
        $endingDate = new DateTime($eventInfos['ending']) ;
    }



    //TESTED/WORKING
    if (isset($_POST['register'])) {

        //The variables are all well picked up and secure;
        $title = ucwords(strtolower(htmlentities(htmlspecialchars(trim($_POST['title'])))));
        $type = ucwords(strtolower(htmlentities(htmlspecialchars(trim($_POST['type'])))));
        $facebook_link = htmlspecialchars(htmlentities(trim($_POST['facebook_link'])));
        $thematic = ucwords(strtolower(htmlentities(htmlspecialchars(trim($_POST['thematic'])))));
        $beginning = htmlspecialchars($_POST['beginning']);
        $ending = htmlspecialchars($_POST['ending']);
        $ticketing = htmlspecialchars(htmlentities(trim($_POST['ticketing'])));
        $emplacement_name = ucwords(strtolower(htmlentities(htmlspecialchars(trim($_POST['emplacement_name'])))));
        $emplacement_facebook_link = htmlspecialchars(htmlentities(trim($_POST['emplacement_facebook_link'])));
        $emplacement_website = htmlspecialchars(htmlentities(trim($_POST['emplacement_website'])));
        $address = strtolower(htmlentities(htmlspecialchars(trim($_POST['address']))));
        $address_link= htmlspecialchars(htmlentities(trim($_POST['address_link'])));
        $description = htmlentities(htmlspecialchars(trim($_POST['description'])));
        $price = htmlspecialchars($_POST['price']);
        $speaker1 = htmlspecialchars($_POST['speaker_1']);
        $speaker2 = htmlspecialchars($_POST['speaker_2']);
        $speaker3 = htmlspecialchars($_POST['speaker_3']);
        $speaker4 = htmlspecialchars($_POST['speaker_4']);
        $cancelation = 0;
        $banner = '';

        $valid = (boolean) true ; //Variable to manage errors - when an error is detected, become false;
    
        //ERRORS MANAGEMENT : required fields are title and beginning
    
        if(empty($title)){
            $valid = false;
            echo "titre: vide";
        }
    
        if (empty($beginning)) {
            $valid = false;
            echo "d??but: vide";
        }
    
    
        //Against the database bug when ending is empty - some events don't have an ending which is planed
        if(empty($ending)) {
            $ending = null;
        }
    
       
        //Converts name of the speaker to and id for the FK in the table Events / null if empty or it causes a bug to add the event in the database
        if(!empty($speaker1)) {
            $get_id1 = new Speakers();
            $id1 = $get_id1->getSpeakerId($speaker1);
            $id_speaker_1 = (int) $id1['id'];
    
        } else {
            $id_speaker_1 = null;
        }
    
        if(!empty($speaker2)) {
            $get_id2 = new Speakers();
            $id2 = $get_id2->getSpeakerId($speaker2);
            $id_speaker_2 = (int) $id2['id'];
    
        } else {
            $id_speaker_2 = null;
        }
    
        if(!empty($speaker3)) {
            $get_id3 = new Speakers();
            $id3 = $get_id3->getSpeakerId($speaker3);
            $id_speaker_3 = (int) $id3['id'];
    
        } else {
            $id_speaker_3 = null;
        }
    
        if(!empty($speaker4)) {
            $get_id4 = new Speakers();
            $id4 = $get_id4->getSpeakerId($speaker4);
            $id_speaker_4 = (int) $id4['id'];
    
        } else {
            $id_speaker_4 = null;
        }

        //Upload the banner for the event

        if(isset($_FILES['banner']) && !empty($_FILES['banner']['name'])) { 
            $max_size =  2097152 ; // security - limit 2mo
            $valid_extensions = array('jpg', 'jpeg', 'gif', 'png'); // security - only images
            $extension_upload = strtolower(substr(strrchr($_FILES['banner']['name'], '.'), 1)); // return the files extension with strrch and delete the point with substr, and all to lowercase with strtolower

            if ($_FILES['banner']['size'] > $max_size) {
                $valid = false;
                echo "Le fichier ne doit pas d??passer 2mo";

            } else if (!in_array($extension_upload, $valid_extensions)) { 
                $valid = false;
                echo "Le fichier doit ??tre au format jpg, jpeg, gif ou png";

            } else {
                $file_path =  "../../../view/assets/events/banners/".$title.".".$extension_upload;
                $result = move_uploaded_file($_FILES['banner']['tmp_name'], $file_path);
                $banner = $title.".".$extension_upload;

                if($result == false) {
                    $valid = false;
                    echo "Erreur lors de l'importation de votre banni??re d'??v??nement";
                }

                
            }

            
        }
    
        if ( $valid == true ) {
            var_dump($_POST);
            $updateEvent = new Events();
            $updateEvent->updateEvent($id,$title, $banner, $type, $facebook_link, $thematic, $beginning, $ending, $ticketing, $emplacement_name, $emplacement_facebook_link, $emplacement_website, $address, $address_link, $description, $price, $cancelation, $id_speaker_1, $id_speaker_2, $id_speaker_3, $id_speaker_4);
            
        }
    
       

    
        
    }

    



    
}




?>