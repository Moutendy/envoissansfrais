var url = window.location.href;
var imageupdatefile;
// Rechercher l'indice du dernier "/" dans l'URL
var lastSlashIndex = url.lastIndexOf("/");

// Extraire l'ID de l'URL en utilisant la méthode slice
var id = url.slice(lastSlashIndex + 1);

let file;

// Vous pouvez maintenant utiliser la variable "id" comme bon vous semble

window.onload = function() {
    updateDonnees();
};
var img = document.getElementById("img");
var imgpost = document.createElement("img");
imgpost.classList.add("img-fluid");
imgpost.classList.add("border-radius-lg");


function updateDonnees() {
    var xhr = new XMLHttpRequest();
    var donnees;

    xhr.onreadystatechange = function() {

        if (xhr.readyState == 4 && xhr.status == 201) {
            donnees = JSON.parse(xhr.responseText);
            document.getElementById('desc').value = donnees.desc;
            imgpost.src = donnees.image;
        }
    };

    xhr.open('GET', '/api/post/' + id, true);
    xhr.send();
    img.appendChild(imgpost);
}
var inputFichier = document.getElementById('choisirFichier');


imgpost.addEventListener("click", function() {
    inputFichier.click();
});




function update() {
    var desc = document.getElementById('desc').value;
    let filedata = new FormData();

    filedata.append('image', imageupdatefile);
    filedata.append('desc', desc);


    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {

        if (xhr.readyState == 4 && xhr.status == 200) {


        } else {
            console.log(xhr.readyState);
            console.log(xhr.status);
        }
    };
    xhr.open('put', '/post/' + id, true);
    xhr.send(filedata);
}


function filedemande(event) {

    for (let i = 0; i < event.target.files.length; i++) {

        file = event.target.files[i];
    }
}