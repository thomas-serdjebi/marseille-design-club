<?php

require('../../../model/database.php');
require('../../../model/class_speakers.php');
require('../../../model/class_events.php');

//Array with all the speakers for the speaker selection inside the form to add an event-tested/working

$speakersList = new Speakers();
$speakers = $speakersList->listAll();


//Tested-working

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


    
    $valid = (boolean) true ; //Variable to manage errors - when an error is detected, become false;

    //ERRORS MANAGEMENT : required fields are title and beginning

    if(empty($title)){
        $valid = false;
        echo "titre: vide";
    }

    if (empty($beginning)) {
        $valid = false;
        echo "début: vide";
    }

    if(empty($ending)) {
        $ending = null;
    }

    var_dump($ending);

   
    //Converts name of the speaker to and id for the FK in the table Events
    if(!empty($speaker1)) {
        $get_id1 = new Speakers();
        $id1 = $get_id1->getSpeakerId($speaker1);
        $id_speaker_1 = (int) $id1['id'];
        var_dump($id_speaker_1);

    } else {
        $id_speaker_1 = null;
    }

    if(!empty($speaker2)) {
        $get_id2 = new Speakers();
        $id2 = $get_id2->getSpeakerId($speaker2);
        $id_speaker_2 = (int) $id2['id'];
        var_dump($id_speaker_2);

    } else {
        $id_speaker_2 = null;
    }

    if(!empty($speaker3)) {
        $get_id3 = new Speakers();
        $id3 = $get_id3->getSpeakerId($speaker3);
        $id_speaker_3 = (int) $id3['id'];
        var_dump($id_speaker_3);

    } else {
        $id_speaker_3 = null;
    }

    if(!empty($speaker4)) {
        $get_id4 = new Speakers();
        $id4 = $get_id4->getSpeakerId($speaker4);
        $id_speaker_4 = (int) $id4['id'];
        var_dump($id_speaker_4);

    } else {
        $id_speaker_4 = null;
    }

    if ( $valid == true ) {
        $addEvent = new Events();
        $addEvent->addEvent($title, $type, $facebook_link, $thematic, $beginning, $ending, $ticketing, $emplacement_name, $emplacement_facebook_link, $emplacement_website, $address, $address_link, $description, $price, $cancelation, $id_speaker_1, $id_speaker_2, $id_speaker_3, $id_speaker_4);
    }

   


    





    


    
}












?>