<?php 
function getUserData($email, $pass){
    // obj = récupérer la ligne qui correspond à User mail et mdp 

    require_once "model/connexionBdd.php";

        $req = $bdd->prepare("SELECT idUser, email,  surname, name FROM users WHERE email = :email AND password= :pass");

       $req->bindParam(":email", $email);
       $req->bindParam(":pass", $pass);
        $req->execute();
    
        $datas = $req->fetch(); 
        $tabUsers = [];
        if ($datas !== null ){
            $x= 0;
            foreach ($datas as $data){
                $tabUsers[$x]["idUser"] = $data["idUser"];
                
                $tabUsers[$x]["email"] = $data["email"];
                
                $tabUsers[$x]["surname"] = $data["surname"];
                
                $tabUsers[$x]["name"] = $data["name"];
                
                $x++;
            }
        }
    
    
        return $tabUsers; 
    
    
    }

    // function to add the column gainTotal à chaque ajout de MIssion/Vacation, temps de travail aussi

    function getDashboardUser(){

        require_once "model/connexionBdd.php";

        $req = $bdd->prepare("SELECT  MONTH(`vacationDate`) as moisEnCours, SUM(`totalHours`) as nbHeuresTravailMoisEnCours, SUM(`hourRate`*`totalHours`) as GainTotalMoisEnCours FROM Vacation WHERE MONTH(`vacationDate`) = MONTH(CURRENT_DATE()) AND idUserVacation = :idUser)";
       

        $req->bindParam(":idUser", $_SESSION["idUser"]);
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