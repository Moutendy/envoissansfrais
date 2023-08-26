@extends('welcome')

@section('content')
<div class="columns body-columns">
    <div class="column is-half is-offset-one-quarter" id="card-container">
          <div class="comment-options-dropdown">
            <ul>
              <li>Modifier</li>
              <li>Supprimer</li>
            </ul>
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
