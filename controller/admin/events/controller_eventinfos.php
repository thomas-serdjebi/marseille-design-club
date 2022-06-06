<?php

require('../../../model/database.php');
require('../../../model/class_events.php');

//Verifying id is only numeric to protect against script injections
if(!is_numeric($_GET['id'])){
    header('Location: ../../../index.php');

} else {

    //Array with all the infos of the concerned event -tested/working

    $id = htmlspecialchars($_GET['id']);
    $eventArray = new Events();
    $eventInfos = $eventArray->eventInfos($id);

    var_dump($eventInfos);
    
}


?>