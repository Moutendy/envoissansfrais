@extends('parentprofil')

@section('content')
<header>
    <div class="page-header min-height-400" style="background-image: url('{{ Auth::user()->image_desc }}');" loading="lazy">
        <span class="mask bg-gradient-dark opacity-8"></span>
    </div>
</header>
   <!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">
        <!-- START Testimonials w/ user image & text & info -->
        <section class="py-sm-7 py-5 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <a href="{{route('home')}}">
                            <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="{{ Auth::user()->image_profil }}" alt="bruce" loading="lazy">
                        </a>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h3 class="mb-0">Contact</h3>
                            <div class="d-block">
                                <input type="text" id="contacte" class="btn btn-sm btn-outline-info text-nowrap mb-0" placeholder="Recherche Contact" />
                            </div>
                        </div>


                        <div class="row py-5">
                            <div class="card">
                             <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                  <thead>
                                    <tr>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pays</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ville</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tel</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if ($contacts)
                                    @foreach($contacts as $contact)
                                      <tr>



                                         <td>
                                            <div class="d-flex px-2 py-1">
                                              <div>
                                                <img src="{{ $contact->image_profil }}" class="avatar avatar-sm me-3">
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
