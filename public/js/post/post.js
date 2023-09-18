var menuicon = document.createElement("div");
var updatepost = document.createElement("li");
var deletepost = document.createElement("li");
var id_global;
var icon_close = document.createElement("i");
var card_image = document.createElement("div");
var user;
window.onload = function() {
    afficherDonnees();

};

function afficherDonnees() {
    var xhr = new XMLHttpRequest();
    var donnees;
    let descfor = "";
    let i = 0;
    let ipost = 0;
    var cardContainer = document.getElementById("card-container");


    xhr.onreadystatechange = function() {

        if (xhr.readyState == 4 && xhr.status == 201) {

            donnees = JSON.parse(xhr.responseText);
            menuicon.classList.add("comment-options-dropdown");
            menuicon.style.display = 'none';
            var ul = document.createElement("ul");

            updatepost.textContent = "Modifier";
            deletepost.textContent = "Supprimer";
            ul.appendChild(updatepost);
            ul.appendChild(deletepost);
            cardContainer.appendChild(menuicon);

            for (; i < donnees.length; i++) {




                var card = document.createElement("div");
                card.classList.add("card");

                var header = document.createElement("div");
                header.classList.add("header");

                var media = document.createElement("div");
                media.classList.add("media");

                var headerleft = document.createElement("div");
                headerleft.classList.add("media-left");

                var post_name = document.createElement("div");
                post_name.classList.add("post-name");

                var title_is_5 = document.createElement("div");
                title_is_5.classList.add("title");
                title_is_5.classList.add("is-9");
                title_is_5.textContent = donnees[i].user.name;
                var subtitle = document.createElement("div");
                subtitle.classList.add("subtitle");
                subtitle.classList.add("is-6");



                var figure = document.createElement("figure");
                figure.classList.add("image");
                figure.classList.add("is-48x48");

                var imghead = document.createElement("img");
                imghead.classList.add("imageprofil");
                imghead.src = donnees[i].user.image_profil;
                transaction(donnees[i].user.id);
                var icon_menu = document.createElement("i");
                icon_menu.classList.add("material-icons");
                icon_menu.classList.add("posi-icons");
                icon_menu.classList.add("imageprofil");
                icon_menu.querySelector("more-icon");
                icon_menu.textContent = "more_horiz";

                var icon_span = document.createElement("span");
                icon_span.classList.add("popup-close");

                icon_close.classList.add("fas");
                icon_close.classList.add("fa-times");
                icon_close.textContent = "+";




                menu(icon_menu, donnees[i].id);
                menuicon.appendChild(icon_span);
                icon_span.appendChild(icon_close);
                menuicon.appendChild(ul);
                header.appendChild(media);
                media.appendChild(headerleft);
                media.appendChild(post_name);
                headerleft.appendChild(figure);
                headerleft.appendChild(icon_menu);
                figure.appendChild(imghead);
                post_name.appendChild(title_is_5);
                post_name.appendChild(subtitle);




                card_image.classList.add("card-image");
                var title = document.createElement("div");
                title.classList.add("text-post");
                title.textContent = donnees[i].desc;
                var figurepost = document.createElement("figure");
                figurepost.classList.add("image");
                figurepost.classList.add("is-4by3");
                var img = document.createElement("img");
                img.classList.add("imagepost");
                img.src = donnees[i].image;


                card_image.appendChild(title);
                figurepost.appendChild(img);
                card_image.appendChild(figurepost);

                card.appendChild(header);
                card.appendChild(card_image);


                cardContainer.appendChild(card);
            }


        }
    };

    xhr.open('GET', '/api/post', true);

    xhr.send();
}

function menu(moreIcon, id) {

    moreIcon.addEventListener("click", function() {
        if (menuicon.style.display == 'none') {
            menuicon.style.display = 'block';
            id_global = id;
        } else {
            menuicon.style.display = 'none';
        }
    });

}
deletepost.addEventListener("click", function() {
    console.log(id_global);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {

        if (xhr.readyState == 4 && xhr.status == 201) {

        } else {
            console.log("echec");
        }
    }
    xhr.open('DELETE', '/api/post/' + id_global, true);

    xhr.send();
    location.reload();


});

icon_close.addEventListener("click", function() {

    menuicon.style.display = 'none';
});
updatepost.addEventListener("click", function(event) {

    // Empêche le comportement par défaut du lien (évite de charger une nouvelle page)
    event.preventDefault();

    // URL vers laquelle vous souhaitez rediriger
    const updatepostlien = '/updatepost/' + id_global; // Remplacez par l'URL de destination

    // Redirigez vers la nouvelle URL
    window.location.href = updatepostlien;

});

function transaction(userId) {
    card_image.addEventListener('click', function(event) {
        event.preventDefault();
        const redirectionlien = '/addtransaction/' + userId; // Remplacez par l'URL de destination

        // Redirigez vers la nouvelle URL
        window.location.href = redirectionlien
    })
}