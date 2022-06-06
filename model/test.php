<?php

$db = new PDO("mysql:host=localhost;dbname=marseilledesignclub", 'root', '');
$db->exec('SET NAMES utf8');
echo 'Connexion réussie';


$sql = "SELECT id FROM speakers WHERE name = 'Arthur Fabre'";
$query = $db->prepare($sql);
$query->execute();

$id = $query->fetch();

var_dump($id);


?>