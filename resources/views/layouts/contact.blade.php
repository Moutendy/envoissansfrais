@extends('parentprofil')

@section('content')
<header>
    @if (@empty(Auth::user()->image_profil))
    <div class="page-header min-height-400" style="background-image: url('../asset/images/team-member-01.jpg');" loading="lazy">
        <span class="mask bg-gradient-dark opacity-8"></span>
    </div>    @else
    <div class="page-header min-height-400" style="background-image: url('storage/app/public/users/{{ Auth::user()->image_desc }}');" loading="lazy">
        <span class="mask bg-gradient-dark opacity-8"></span>
    </div>
    @endif
</header>
   <!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4" id="card">
        <!-- START Testimonials w/ user image & text & info -->
        <section class="py-sm-7 py-5 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <a href="{{route('home')}}">
                            @if (@empty(Auth::user()->image_profil))
                            <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="../asset/images/men-03.jpg" alt="bruce" loading="lazy">
                            @else
                            <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="storage/app/public/users/{{ Auth::user()->image_profil }}" alt="bruce" loading="lazy">
                            @endif
                        </a>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h3 class="mb-0">Contact</h3>
                            <div class="d-block">
                                <input  type="text" id="contacte" class="btn btn-sm btn-outline-info text-nowrap mb-0" placeholder="Recherche Contact" onkeyup=search() />
                            </div>
                        </div>


                        <div class="row py-5">
                            <div class="card">
                             <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="table">
                                  <thead>
                                    <tr>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pays</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ville</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tel</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody id="bodyvalue">
                                    @if ($contacts)
                                    @foreach($contacts as $contact)

                                      <tr>



                                         <td>
                                            <div class="d-flex px-2 py-1">
                                              <div>
                                                @if (@empty($contact->image_profil))
                                                <img src="../asset/images/men-03.jpg" class="avatar avatar-sm me-3">
                                                @else
                                                <img src="{{ $contact->image_profil }}" class="avatar avatar-sm me-3">
                                                @endif
                                            </div>
                                              <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs"> {{ $contact->name }}</h6>
                                                <p class="text-xs text-secondary mb-0"> {{ $contact->name }}</p>
                                              </div>
                                            </div>
                                          </td>



                                          <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $contact->pays }}</p>

                                          </td>
                                          <td class="align-middle text-center text-sm">
                                            {{ $contact->ville }}
                                          </td>
                                          <td class="align-middle text-center">
                                            <span class=" badge bg-gradient-success">{{ $contact->tel }}</span>
                                          </td>
                                          <td class="align-middle text-center">
                                              <span class=" badge bg-gradient-danger">{{ $contact->email }}</span>
                                          </td>
                                          <td class="align-middle text-center">
                                            <span class="badge bg-gradient-danger" onclick="sup({{ $contact->contact }})" >Suprimer</span>
                                        </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                  </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END Testimonials w/ user image & text & info -->
        <!-- START Blogs w/ 4 cards w/ image & text & link -->

        <!-- END Blogs w/ 4 cards w/ image & text & link -->
    </div>
    @endsection
