<?php

require('../../../model/class_speakers.php');

//Verifying id is only numeric to protect against script injections
if(!is_numeric($_GET['id'])){
    header('Location: ../../../index.php');

} else {

    //Array with all the infos of the concerned speaker -tested/working

    $id = htmlspecialchars($_GET['id']);
    $speakerInfos = new Speakers();
    $speakerArray = $speakerInfos->speakerInfos($id);
    
}


?>