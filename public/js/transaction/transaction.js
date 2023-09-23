window.onload = showContact;

var xhr = new XMLHttpRequest();
var select = document.getElementById("exampleFormControlSelect1");
var optionElement = document.getElementById("option");
var contactchoose;

var datefin = document.getElementById("datefin");

var datedebut = document.getElementById("datedebut");

var desc = document.getElementById("desc");

function showContact() {

    xhr.open("get", "/contact", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Les données ont été récupérées avec succès
            var options = JSON.parse(xhr.responseText);

            // Parcourir les options et les ajouter à la liste déroulante
            // options.contact.forEach(function(option) {


            //     optionElement.textContent = option.name;
            //     // select.appendChild(optionElement);
            //     console.log(option.name);

            // });

            for (let i = 0; i < options.contact.length; i++) {
                var optionElement = document.createElement("option");
                var x = options.contact[i];
                optionElement.textContent = x.name;
                optionElement.value = x.id;

                select.appendChild(optionElement);

            }

        }
    };
    xhr.send();
}