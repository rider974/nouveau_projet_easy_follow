<?php 


require_once "model/userModel.php";

// param = email et mdp
function getUser($email, $pass){
    $user = getUserData($email, $pass);
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
/*
function getCalendrier( $mois = date("m")){

    if (isset($_POST["moisEnCours"]) && $_POST["moisEnCours"] !== ""){
        $mois = $_POST["moisEnCours"];

    }
        $calendrier  = getCalendrierUser($mois);
    

}
*/