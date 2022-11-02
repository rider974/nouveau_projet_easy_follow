<?php 



    require_once 'model/credentials.php';
    try {
            
        $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $mdp);
    }
    catch(Exception $e ){
        
    die('Erreur : '.$e->getMessage());
    }



