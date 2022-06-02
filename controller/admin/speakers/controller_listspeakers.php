<?php

require('../../../model/database.php');
require('../../../model/class_speakers.php');

//Array with all the speakers -tested/working

$speakersList = new Speakers();
$speakersArray = $speakersList->listAll();
var_dump($speakersArray);

?>