<?php
require('../../../model/database.php');
require('../../../model/class_speakers.php');

//TESTED - WORKING - BUT HAVE TO CORRECT REGEX
if(isset($_POST['register'])){

    //The variables are all well picked up and secure;
    $name = htmlentities(htmlspecialchars(trim($_POST['name'])));
    $job = ucwords(strtolower(htmlentities(htmlspecialchars(trim($_POST['job'])))));
    $company = ucwords(strtolower(htmlentities(htmlspecialchars(trim($_POST['company'])))));
    $website = htmlspecialchars(htmlentities(trim($_POST['website'])));
    $instagram = htmlspecialchars(htmlentities(trim($_POST['instagram'])));
    $linkedin = htmlspecialchars(htmlentities(trim($_POST['linkedin'])));
    $facebook = htmlspecialchars(htmlentities(trim($_POST['facebook'])));
    $contact_phone = htmlspecialchars(htmlentities(trim($_POST['contact_phone'])));
    $contact_email = htmlspecialchars(htmlentities(trim($_POST['contact_email'])));

    

    $valid = (boolean) true ; //Variable to manage errors - when an error is detected, become false;

    //ERRORS MANAGEMENT : only required field is name

    //Check name field filled and caracters allowed

    $regex ="/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]/u";


    if(empty($name)){
        $valid = false;
        echo "name vide";
       
    }


    //Check website and social media links format if it is fullfilled

    if (!empty($website)) {
        if((!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))) {
            $valid = false;
            echo "website : mauvais format";
        }
    }

    if (!empty($instagram)) {
        if((!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$instagram))) {
            $valid = false;
            echo "website : mauvais format";
        }
    }

    if (!empty($linkedin)) {
        if((!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedin))) {
            $valid = false;
            echo "website : mauvais format";
        }
    }

    if (!empty($facebook)) {
        if((!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$facebook))) {
            $valid = false;
            echo "website : mauvais format";
        }
    }

    //Check phone number format if field fullfilled

    if (!empty($contact_phone)) {

        if(!is_numeric($contact_phone)) {
            $valid = false;
            echo 'numéro : mauvais format';

        } else if (strlen($contact_phone) != 10) {
            $valid = false;
            echo "Numéro : 10 chiffres requis";
        }
    }

    //Check email format if field fullfilled

    if (!empty($contact_email)) {

        if(filter_var($contact_email, FILTER_VALIDATE_EMAIL) == false) {
            $valid = false;
            echo "L'email n'est pas au bon format.";

        }

    }

    if($valid == true) {

        $addSpeaker = new Speakers();
        $addSpeaker->addSpeaker($name, $job, $company, $website, $instagram, $linkedin, $facebook, $contact_phone, $contact_email);
        

    }









    


    



}




?>