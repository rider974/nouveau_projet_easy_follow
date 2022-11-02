<?Php 
header("content-type: application/json");

    $bdd = new PDO("mysql:host=localhost;dbname=api","userTuto", "mdpTuto");

    $response = [];

    if ($bdd){
        $req= $bdd->prepare("SELECT * from users");
        $req->execute();
        $res = $req->fetchAll();
        if ($res){
             $x= 0; 
            foreach($res as $re){
                $response[$x]["id"] = $re["id"];
                
                $response[$x]["name"] = $re["name"];

                $response[$x]["email"] = $re["email"];
                
                $response[$x]["age"] = $re["age"];
              $x++;
            }
            echo json_encode($response, JSON_PRETTY_PRINT);

            // JS appelle ce fichier pour afficher la vue avec les données
        }
        else {
            echo "Database connection failed";
        }
}

