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
                        <div class="mt-n8 mt-md-n9 text-center">
                            <a href="{{route('home')}}">
                            <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="{{ Auth::user()->image_profil }}" alt="bruce" loading="lazy">
                            </a>
                        </div>
                        <div class="row py-5">
                            <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h3 class="mb-0">{{ Auth::user()->name }}</h3>
                                    <div class="d-block">
                                        <a href="{{ route('contactshow') }}"class="btn btn-sm btn-outline-info text-nowrap mb-0">Contacts</a>
                                    </div>

                                    @if (!empty($role) && $role->name == 'agencier')
                                    <div class="d-block">
                                        <a href="{{ route('addpost') }}" class="btn btn-sm btn-outline-info text-nowrap mb-0">New Post</a>
                                    </div>
                                    @else

                                    @endif

                                </div>
                                <div class="row mb-4">
                                    <div class="col-auto">
                                        <span class="h6">{{ $post }}</span>
                                        <span>Posts</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="h6"> {{ $transactionSend }}</span>
                                        <span>Transaction(s)</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="h6">{{ $val }}</span>
                                        <span>Transaction validée (s)</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="h6"> {{ $cont }}</span>
                                        <span>Contact(s)</span>
                                    </div>

                                </div>
                                {{-- <p class="text-lg mb-0">
                                     <div class="col-auto">
                                        <span class="h6">Description</span>
                                    </div>If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality). Choose the path that leaves you more equanimous. <br>
                                    <a
                                        href="javascript:;" class="text-info icon-move-right">Faire un transfert
                                        <i class="fas fa-arrow-right text-sm ms-1"></i>
                                        </a>
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">

                <span>Contact(s)</span>
            </div>
            <div class="page-header min-vh-100" loading="lazy">

                @if (!empty($contactNewBysUser))

                @foreach ($contactNewBysUser as $contactNewBysUsers)
               <a href="{{ route('addcontact',$contactNewBysUsers->id) }}">

                <div class="card mt-4 nature">
                    <!-- Card image -->
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                      <img class="border-radius-lg w-100 img" src="{{ $contactNewBysUsers->image_profil }}" alt="Image placeholder">
                      <!-- List group -->

                     </div>
                    <!-- Card body -->
                    <div class="card-body">

                    </div>
                 </div>
            </a>
                @endforeach
                  @endif
            </div>
        </section>
        <!-- END Testimonials w/ user image & text & info -->
        <!-- START Blogs w/ 4 cards w/ image & text & link -->

        <!-- END Blogs w/ 4 cards w/ image & text & link -->
    </div>

@endsection

