function recupUser(){
    var baseUrl = "http://localhost/api_example/connexion"
     fetch(baseUrl)
     .then((res) => res.json())
    .then((out) => {
        var user1 = document.getElementById("user1");
        //user1.innerHTML = out[0].prenom + " " + out[0].nom ;
        console.log(out);
    });
}

function recupTabDeBord(){
    var baseUrl = "http://localhost/api_example/tableauDeBord"
    fetch(baseUrl)
    .then((res) => res.json())
   .then((out) => {
       var user1 = document.getElementById("user1");
       user1.innerHTML = out[0].nomMission;
       console.log(out);
   });
}

function sendData(){
    var XHR = new XMLHttpRequest();
    urlEncodedData = "test";
    XHR.open('POST', 'http://localhost/api_example/connexion');
    XHR.setRequestHeader('Content-Type', 'application/json');
    XHR.send(urlEncodedData);
    console.log(XHR);
 
}
function sendUserData(){
    var req = new XMLHttpRequest();
    req.open("POST", "http://localhost/api_example/connexion", );
    req.setRequestHeader('Content-Type', 'application/json');
    let value  = document.getElementById('name').value; 
    req.responseType = "json";
    req.send({"POST": value});
}
