<?php 


function getUser(){
    if (isset($_POST["email"]) && isset($_POST["mdp"]) && $_POST["email"] != "" && $_POST["mdp"] != ""){     
        require_once 'modele.php';
        // sécurité 
        $email = htmlspecialchars($_POST["email"]);
        $mdp = htmlspecialchars($_POST["mdp"]);
        // vérifier si on récupére quelque chose avec l'email et le mdp
        $user = new Utilisateur();
        $data = $user->getUser($email, $mdp);
           
            if ($data){
                // rediriger vers la route du tableau de bord et envoyez en json les données de l'utilisateur avec json_encode()
                $result["data"]= $data;
                $result["requete"]= "GET";
                   $results = json_encode($result);
                require_once " ";
            }
                else {
                    // sinon vers l'ecran de connexion
                   
                require_once " ";
                }
        }
    }


{'id':$id}


