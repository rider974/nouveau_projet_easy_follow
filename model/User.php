<?php 
function getUserData(){
    // obj = récupérer la ligne qui correspond à User mail et mdp 

    require_once "model/connexionBdd.php";

        $req = $bdd->prepare("SELECT idUser, email,  prenom, nom FROM Utilisateurs ");
       
        $req->execute();
    
        $donnees = $req->fetchAll(); 
        $tabUsers = [];
        if ($donnees !== null ){
            $x= ;
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