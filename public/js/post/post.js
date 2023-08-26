const dropdown = document.querySelector('.comment-options-dropdown');
dropdown.style.display = 'none';

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


            for (; i < donnees.length; i++) {

                console.log(donnees);


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

                var icon_menu = document.createElement("i");
                icon_menu.classList.add("material-icons");
                icon_menu.classList.add("posi-icons");
                icon_menu.classList.add("imageprofil");
                icon_menu.querySelector("more-icon")
                icon_menu.textContent = "more_horiz";



                menu(icon_menu, donnees[i].id)
                header.appendChild(media);
                media.appendChild(headerleft);
                media.appendChild(post_name);
                headerleft.appendChild(figure);
                headerleft.appendChild(icon_menu);
                figure.appendChild(imghead);
                post_name.appendChild(title_is_5);
                post_name.appendChild(subtitle);



                var card_image = document.createElement("div");
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
        console.log(id);
        dropdown.style.display = dropdown.style.display ? 'block' : 'none';
    });

}
