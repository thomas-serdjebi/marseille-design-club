<?php

require('../../../model/database.php');
require('../../../model/class_events.php');

//Controller to delete an event -

//Verifying id is only numeric to protect against script injections
if(!is_numeric($_GET['id'])){
    header('Location: ../../../index.php');

} else {

    //Array with all the infos of the concerned speaker -tested/working

    $id = htmlspecialchars($_GET['id']);
    $event = new Events();
    $eventInfos = $event->eventInfos($id);

    //If delete is confirmed, launching the deleteEvent function
    
    if(isset($_POST['confirm_delete'])) {
        $deleteEvent = new Events();
        $deleteEvent->deleteEvent($id);
        header('Location: listevents.php');
    }
    

}


?>