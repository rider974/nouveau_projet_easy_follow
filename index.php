<?php 

// je clique sur valider dans le formulaire de connexion

// le JS envoi une requete vers une addresse http précise avec une méthode demandé GET/POST/PUT/ DELETE

// je suis dirigé vers le router qui mappe la requete SRVER URI http avec un controller User ou Modele et la méthode qui va avec getUser par exemple l'envoi de paramétres en POST ou GET se fait via l'url  

$data = "{error: do not pass security}";

if ($_SERVER["REQUEST_URI"] !== null && !empty($_SERVER["REQUEST_URI"])){

    if ($_SERVER["REQUEST_URI"] ==  "/api_example/connexion"){        
        
        if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["pass"]) && !empty($_POST["pass"])){
            require_once 'controller/userController.php';

           
            $data =getUser($_POST["email"], $_POST["pass"]);
        } 
        echo $data;
    }

    if (isset($_SESSION["connexionOk"]) && $_SESSION["connexionOk"] == true){

        if ($_SERVER["REQUEST_URI"] ==  "/api_example/dashboard"){
            require_once 'controller/userController.php';
                $data =getDashboard();
                echo $data; 
                
            // récupérer les données en JS  
        }

        if ($_SERVER["REQUEST_URI"] ==  "/api_example/$_SESSION[idUser]"){
            require_once 'controller/userController.php';
               
            // récupérer les données en JS  
        }
    }
}

