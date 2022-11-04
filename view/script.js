

function recupUserData(){
    let baseUrl = "http://localhost/api_example/connexion"
     fetch(baseUrl)
     .then((res) => res.json())
     .then((out) => {
        let user1 = document.getElementById("user1");
        user1.innerHTML = "user";
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


// Envoyez les données du formulaire de connexion et attendre s'il y a une réponse effectuer les actions...
function sendData(){
    var XHR = new XMLHttpRequest();
    let email = document.getElementById("email").value;
    let pass = document.getElementById("pass").value;
    XHR.open('POST', 'http://localhost/api_example/connexion', true);
    // XHR.setRequestHeader('Content-Type', 'application/json');
    XHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    console.log(XHR);
    XHR.send("email="+ email + "pass="+pass);
   
    var resp = XHR.responseText;
   // XHR.send(urlEncodedData);
    
}



function sendDataFetch(){
// envoyer les données du formulaire email et mdp et recevoir les données qui sont envoyés par le controller de User pour la connexion
    let mail= document.getElementById("email").value; 
    let password= document.getElementById("pass").value; 
    // let data = {'email':  mail, 'pass': password};
    let data = "email=" + mail + "&pass=" + password;
    fetch("http://localhost/api_example/connexion", {
        method: 'POST',
        headers: {
            
             'Content-Type': 'application/x-www-form-urlencoded'
            //  'Content-Type': 'application/json'
        },
        // body: JSON.stringify(data)
        // permet d'envoyer les données au bon format
        body : data
    })
    
          //  return response.json()
    .then((response) => { 

        return response.json();
    })
    .then((result) => {
        
        // stocker les données dans Local Storage
      
        localStorage.setItem('idUser', result.idUser);
        
      })
      .then((dashboard)=> {
        loadingDashboard();
      })
      .catch((error) => {
        console.error('There has been a problem with your fetch operation:', error);
      });  
}

function sendData2(functionData){
    functionData('https://example.com/answer', { answer: 42 })
  .then((data) => {
    console.log(data); // JSON data parsed by `data.json()` call
  });
}



function sendUserData(){
    var req = new XMLHttpRequest();
    req.open("POST", "http://localhost/api_example/connexion", );
    req.setRequestHeader('Content-Type', 'application/json');
    let value  = document.getElementById('name').value; 
    req.responseType = "json";
    req.send({"POST": value});
}


function loadingDashboard(){
  let data = "idUser="+ localStorage.getItem('idUser');
  fetch("http://localhost/api_example/dashboard", {
    method: 'POST',
    headers: {
        
         'Content-Type': 'application/x-www-form-urlencoded'
        //  'Content-Type': 'application/json'
    },
    // body: JSON.stringify(data)
    // permet d'envoyer les données au bon format
    body : data
})

      //  return response.json()
.then((response) => { 

    return response.json();
})
.then((result) => {
    
    // stocker les données dans Local Storage
  
  })
  .then((dashboard)=> {
    window.location = "https//";  
  })
  .catch((error) => {
    console.error('There has been a problem with your fetch operation:', error);
  });  

}
