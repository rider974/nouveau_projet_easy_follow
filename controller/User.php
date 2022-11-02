<?php 


require_once "model/User.php";

// param = email et mdp
function getUser(){
    $user = getUserData();
    $data=  json_encode($user, JSON_PRETTY_PRINT);
    return $data; 
}

// afficher les données: heures Totales et Gain pour le mois en cours
function getTableauDeBord(){
    $idUser = 2; 
    $tableauMission = getTableauDeBordUser($idUser); 
    $data = json_encode($tableauMission);
    return $data; 
}
