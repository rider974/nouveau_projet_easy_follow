<?php 


require_once "model/userModel.php";

// param = email et mdp
function getUser($email, $pass){
    $user = getUserData($email, $pass);
    if (!empty($user)){
        $_SESSION["idUser"] = $user["idUser"];
        $_SESSION["connexionOk"] = true; 
        $_SESSION["email"] = $user["email"]; 
    }
    $data=  json_encode($user, JSON_PRETTY_PRINT);
   
    return $data; 
}

// afficher les données: heures Totales et Gain pour le mois en cours
function getDashboard(){
    $dashboardMission = getDashboardUser(); 
    $data = json_encode($dashBoardMission);
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