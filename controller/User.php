<?php 


require_once "model/User.php";


function getUser(){
    $user = getUserData();
    $data=  json_encode($user, JSON_PRETTY_PRINT);
    return $data; 
}
