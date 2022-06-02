<?php

require('../../../model/database.php');
require('../../../model/class_speakers.php');
require('../../../model/class_events.php');

//Array with all the speakers for the speaker selection inside the form to add an event-tested/working

$speakersList = new Speakers();
$speakers = $speakersList->listAll();


if (isset($_POST['register'])) {

    //The variables are all well picked up and secure;
    $title = ucwords(strtolower(htmlentities(htmlspecialchars(trim($_POST['title'])))));
    $type = ucwords(strtolower(htmlentities(htmlspecialchars(trim($_POST['type'])))));
    $facebook = htmlspecialchars(htmlentities(trim($_POST['facebook_link'])));
    $thematic = ucwords(strtolower(htmlentities(htmlspecialchars(trim($_POST['thematic'])))));
    $beginning = htmlspecialchars(trim($_POST['beginning']));
    $ending = htmlspecialchars(trim($_POST['ending']));
    $ticketing = htmlspecialchars(htmlentities(trim($_POST['ticketing'])));
    $emplacement_name = ucwords(strtolower(htmlentities(htmlspecialchars(trim($_POST['emplacement_name'])))));
    $emplacement_facebook = htmlspecialchars(htmlentities(trim($_POST['emplacement_facebook_link'])));
    $emplacement_website = htmlspecialchars(htmlentities(trim($_POST['emplacement_webiste'])));
    $address = strtolower(htmlentities(htmlspecialchars(trim($_POST['address']))));
    $emplacement_gmap = htmlspecialchars(htmlentities(trim($_POST['address_link'])));
    $description = ucwords(strtolower(htmlentities(htmlspecialchars(trim($_POST['description'])))));
    $price = htmlspecialchars($_POST['price']);
    $speaker1 = htmlspecialchars($_POST['speaker_1']);

    
    $valid = (boolean) true ; //Variable to manage errors - when an error is detected, become false;

    //ERRORS MANAGEMENT : required fields are title and beginning

   


    





    


    
}












?>