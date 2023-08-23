@extends('welcome')

@section('content')
<div class="columns body-columns">
    <div class="column is-half is-offset-one-quarter">
        <div class="card">
            <div class="header">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-48x48">
                            <img class="imageprofil" src="https://res.cloudinary.com/ameo/image/upload/v1639144778/typocat_svbspx.png" alt="small placeholder image">
                        </figure>
                    </div>
                    <div class="post-name">
                        <p class="title is-5">John Smith</p>
                        <p class="subtitle is-6">@johnsmith</p>
                    </div>
                </div>
            </div>

            <div class="card-image">
                <div class="text-post">
                   dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                    <a>@bulmaio</a>.
                    <a href="#">#css</a>
                    <a href="#">#responsive</a>
                    <br>
                    <time datetime="2018-1-1">11:09 PM - 1 Jan 2023</time>
                </div>

                <figure class="image is-4by3">
                    <img class="imagepost" src="https://cdn.pixabay.com/photo/2023/05/14/02/15/squirrel-7991828_1280.jpg" alt="Placeholder image">
                </figure>
            </div>
            <div class="card-content">

                <div class="level is-mobile">

                    <div class="level-left">
                        <div class="level-item has-text-centered">
                            <a href="">
                                <i class="material-icons">favorite_border</i>
                            </a>
                        </div>
                        <div class="content">
                            <p>
                                <strong class="likepost">33 </strong>
                            </p>
                        </div>
                        <div class="level-item has-text-centered">

                                <a href="" data-bs-toggle="modal" data-bs-target="#myModal">
                                    <i class="material-icons">chat_bubble_outline</i>
                                </a>
                                <strong class="commentaire">2 </strong>
                        </div>




                    </div>
                </div>


            </div>
        </div>
      </div>
    </div>
   </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Commentaire</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="header commentairedescription">
                <div class="media element">
                    <div class="media-left">
                        <figure class="image is-48x48">
                            <img class="imageprofilcomme" src="https://res.cloudinary.com/ameo/image/upload/v1639144778/typocat_svbspx.png" alt="small placeholder image">
                        </figure>
                    </div>
                    <div class="post-namecomment">
                        <p class="title is-9">John Smith</p>

                    </div>

                </div>
                <div class="text-postcomment element ">
                   <div class="text-comment ">
                    dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                   </div>

                 </div>
            </div>
            <div class="input-group mb-2">
                <input type="text" class="form-control" placeholder="Commentaire...">
                <button class="btn btn-primary" type="button">Send</button>

              </div>
        </div>

      </div>
    </div>
  </div>
@endsection
