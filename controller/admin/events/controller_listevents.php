<?php

require('../../../model/database.php');
require('../../../model/class_events.php');

//Array with all the events - tested/working

$eventsList = new Events();
$eventsArray = $eventsList->listAllEvents();
var_dump($eventsArray);

?>