window.onload = function() {
    afficherDonnees();
};

function afficherDonnees() {
    var xhr = new XMLHttpRequest();
    var donnees;

    xhr.onreadystatechange = function() {

        if (xhr.readyState == 4 && xhr.status == 201) {

            donnees = JSON.parse(xhr.responseText);
            console.log(donnees);
            donnees.forEach(function(element) {
                var desc = document.getElementById('desc');
                desc.innerHTML = element.desc; // Supposons que "nom" soit un champ de données.
                console.log(element.desc);
            });


        }
    };

    xhr.open('GET', '/api/post', true);
    xhr.send();
}