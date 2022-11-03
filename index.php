<?php 

// je clique sur valider dans le formulaire de connexion

// le JS envoi une requete vers une addresse http précise avec une méthode demandé GET/POST/PUT/ DELETE

// je suis dirigé vers le router qui mappe la requete SRVER URI http avec un controller User ou Modele et la méthode qui va avec getUser par exemple l'envoi de paramétres en POST ou GET se fait via l'url  
$connexionOk = true ;
$_SESSION["idUser"] = 1; 
$idUser = $_SESSION["idUser"]; 
$data = "{}";

if ($_SERVER["REQUEST_URI"] !== null && $_SERVER["REQUEST_URI"] !== ""){

    if ($_SERVER["REQUEST_URI"] ==  "/api_example/connexion"){
        
        
        if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["pass"]) && !empty($_POST["pass"])){

            // die("ici");
        

            require_once 'controller/userController.php';
            $data =getUser($_POST["email"], $_POST["pass"]);
          
            
        } 
        echo $data;
    }

    if (isset($connexionOk) && $connexionOk == true){

        if ($_SERVER["REQUEST_URI"] ==  "/api_example/tableauDeBord"){
            require_once 'controller/userController.php';
                $data =getTableauDeBord();
                echo $data; 
            // récupérer les données en JS  
        }

        if ($_SERVER["REQUEST_URI"] ==  "/api_example/$idUser"){
            require_once 'controller/userController.php';
                $data =getTableauDeBord();
                echo $data; 
            // récupérer les données en JS  
        }
    }
}

