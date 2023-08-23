@extends('parentprofil')

@section('content')
<header>
    <div class="page-header min-height-400" style="background-image: url('../assets/img/city-profile.jpg');" loading="lazy">
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
                            <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="../assets/img/bruce-mars.jpg" alt="bruce" loading="lazy">
                        </div>
                        <div class="row py-5">
                            <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h3 class="mb-0">Michael Roven</h3>
                                    <div class="d-block">
                                        <button type="button" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</button>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-auto">
                                        <span class="h6">323</span>
                                        <span>Posts</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="h6">3.5k</span>
                                        <span>Transaction</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="h6">260</span>
                                        <span>Transaction validées</span>
                                    </div>
                                </div>
                                <p class="text-lg mb-0">
                                     <div class="col-auto">
                                        <span class="h6">Description</span>
                                    </div>If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality). Choose the path that leaves you more equanimous. <br>
                                    <a
                                        href="javascript:;" class="text-info icon-move-right">Faire un transfert
                                        <i class="fas fa-arrow-right text-sm ms-1"></i>
                                        </a>
                                </p>
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