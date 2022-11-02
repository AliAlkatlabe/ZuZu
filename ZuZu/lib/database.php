<?php

require_once('Classes/Sushi.php');
  $db = new PDO ("mysql:host=localhost;dbname=zuzu", "root", "");

function getSushis() {
    global $db;
    $q = "SELECT * FROM sushi";
    $stm = $db->prepare($q);
    $stm->execute();
    $request = $stm->fetchAll(PDO::FETCH_CLASS);
    return $request;

}

