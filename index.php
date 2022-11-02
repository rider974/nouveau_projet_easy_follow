<?php 


// je clique sur valider dans le formulaire de connexion

// le JS envoi une requete vers une addresse http précise avec une méthode demandé GET/POST/PUT/ DELETE

// je suis dirigé vers le router qui mappe la requete SRVER URI http avec un controller User ou Modele et la méthode qui va avec getUser par exemple l'envoi de paramétres en POST ou GET se fait via l'url  


if ($_SERVER["REQUEST_URI"] !== null && $_SERVER["REQUEST_URI"] !== ""){

    if ($_SERVER["REQUEST_URI"] ==  "/api_example/tableauDeBord"){
        require_once 'controller/User.php';
            $data = getUser();
        var_dump($data);
    }
}