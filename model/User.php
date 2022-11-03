<?php 
function getUserData(){
    // obj = récupérer la ligne qui correspond à User mail et mdp 

    require_once "model/connexionBdd.php";

        $req = $bdd->prepare("SELECT idUser, email,  prenom, nom FROM Utilisateurs ");
       
        $req->execute();
    
        $donnees = $req->fetchAll(); 
        $tabUsers = [];
        if ($donnees !== null ){
            $x= 0;
            foreach ($donnees as $data){
                $tabUsers[$x]["idUser"] = $data["idUser"];
                
                $tabUsers[$x]["email"] = $data["email"];
                
                $tabUsers[$x]["prenom"] = $data["prenom"];
                
                $tabUsers[$x]["nom"] = $data["nom"];
                
                $x++;
            }
        }
    
    
        return $tabUsers; 
    
    
    }

    // function to add the column gainTotal à chaque ajout de MIssion/Vacation, temps de travail aussi

    function getTableauDeBordUser($idUser){

        require_once "model/connexionBdd.php";

        $req = $bdd->prepare("SELECT  nomMission,SUM(nbHeuresTravail`) as nbHeuresTravailMoisEnCours, SUM(`tauxHoraireGain`*`nbHeuresTravail`) as GainTotalMoisEnCours FROM Vacation WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND idUserVacation = :idUser");
       

        $req->bindParam(":idUser", $idUser);
        $req->execute();
    
        $donnees = $req->fetchAll(); 
        $tabMission = [];

        if ($donnees !== null ){
            $x= 0;
            foreach ($donnees as $data){
                $tabMission[$x]["idVacation"] = $data["idVacation"];
                $tabMission[$x]["nomMission"] = $data["nomMission"];
                $tabMission[$x]["date"] = $data["date"];
                $tabMission[$x]["heureDebut"] = $data["heureDebut"];              
                $tabMission[$x]["heureFin"] = $data["heureFin"];
                $tabMission[$x]["tauxHoraireGain"] = $data["tauxHoraireGain"];
                $tabMission[$x]["gainObtenu"] = $data["gainObtenu"];
                $tabMission[$x]["nbHeuresTravail"] = $data["nbHeuresTravail"];
                $x++;
            }
            return $tabMission; 
        }
    }

function getCalendrierUser($mois){
    $req = $bdd->prepare("SELECT  date FROM Vacation WHERE MONTH(date) = :month AND idUserVacation = :idUser");

    $req->bindParam(":month", $mois);
    
    $req->bindParam(":idUser", $_SESSION["idUser"]);
    $req->execute();


    $result = $req->fetchAll();

    $tabCalendrier = [];

        if ($result !== null ){
            $x= 0;
            foreach ($result as $data){
                $tabCalendrier[$x]["idVacation"] = $data["idVacation"];
                $tabCalendrier[$x]["date"] = $data["date"];
                $x++;
            }
            return $tabMission; 
        } 

}