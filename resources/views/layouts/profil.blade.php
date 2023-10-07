@extends('parentprofil')
@section('content')
<header>
    <div class="page-header min-height-400" style="background-image: url('{{ Auth::user()->image_desc }}');" loading="lazy">
        <span class="mask bg-gradient-dark opacity-8"></span>
    </div>
</header>

    <!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4" id="card">
        <!-- START Testimonials w/ user image & text & info -->
        <section class=" position-relative" class="section" id="men">
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="container" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="men-item-carousel">
                                <div class="owl-men-item owl-carousel">
                                    @if (!empty($contactNewBysUser))
                                    @foreach ($contactNewBysUser as $contactNewBysUsers)

                                    <div class="item">
                                        <div class="thumb">
                                            <div class="hover-content">
                                                <ul>
                                                    <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <a href="{{ route('addcontact',$contactNewBysUsers->id) }}">
                                            <img src="{{ $contactNewBysUsers->image_profil }}" alt="">
                                            </a>
                                        </div>
                                        <div class="down-content">
                                            <h4>Classic Spring</h4>
                                            <span>$120.00</span>
                                            <ul class="stars">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>

                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

@endsection

