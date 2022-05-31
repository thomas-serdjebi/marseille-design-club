<?php
require('../../model/class_speakers.php');

if(isset($_POST['register'])){

    //The variables are all well picked up and secure;
    $firstname = htmlspecialchars(htmlentities(ucwords(strtolower(trim($_POST['firstname'])))));
    $lastname = htmlspecialchars(htmlentities(ucwords(strtolower(trim($_POST['lastname'])))));
    $job = htmlspecialchars(htmlentities(ucwords(strtolower(trim($_POST['job'])))));
    $company = htmlspecialchars(htmlentities(ucwords(strtolower(trim($_POST['job'])))));
    $website = htmlspecialchars(htmlentities(trim($_POST['website'])));
    $instagram = htmlspecialchars(htmlentities(trim($_POST['instagram'])));
    $linkedin = htmlspecialchars(htmlentities(trim($_POST['linkedin'])));
    $facebook = htmlspecialchars(htmlentities(trim($_POST['facebook'])));
    $contact_phone = htmlspecialchars(htmlentities(trim($_POST['contact_phone'])));
    $contact_email = htmlspecialchars(htmlentities(trim($_POST['contact_email'])));

    


    



}




?>