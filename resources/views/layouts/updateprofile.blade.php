@extends('parentprofil')

@section('content')
<section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            @if (@empty(Auth::user()->image_desc))
            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../asset/images/men-03.jpg'); background-size: cover;" loading="lazy"></div>
            @elseif (!@empty(Auth::user()->image_desc))
            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('{{asset('storage/app/public/users/'.Auth::user()->image_desc )}}'); background-size: cover;" loading="lazy"></div>
                @endif
                <span class="mask bg-gradient-dark opacity-8"></span>

            </div>
        </div>
          <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg p-3">
                  <h3 class="text-white text-primary mb-0">Update Post</h3>
                </div>
              </div>
              <div class="card-body">
                <p class="pb-3">
                    <div class="col-md-6">
                        <a href="{{route('home')}}" class="btn bg-gradient-success mt-3 mb-0">Home</a>
                      </div>
                </p>
                <br/>
                <p class="pb-3 col-md-6">
                    <div class="input-group input-group-static mb-4">
               @if (@empty(Auth::user()->image_profil))
               Photo de profil : <img src="../asset/images/men-03.jpg" class="col-md-3"/>
               @elseif (!@empty(Auth::user()->image_profil))
               Photo de profil : <img src="{{ asset('storage/app/public/users/'.Auth::user()->image_profil )}}"/>
                @endif
                </div>
                </p>
                <form action="/updateprofil" method="post"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="card-body p-0 my-3">
                    <div class="row">

                        <div class="col-md-6">
                            <label>photo de couverture</label>
                        </div>
                      <div class="col-md-6">

                        <div class="input-group input-group-static mb-4">

                          <input name="image_desc"  type="file" class="btn bg-gradient-primary mt-3 mb-0" accept=".jpg, .jpeg, .png, .svg, .gif">
                        </div>
                      </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>photo de profil</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-static mb-4">

                            <input type="file" name="image_profil"  accept=".jpg, .jpeg, .png, .svg, .gif"  class="btn bg-gradient-primary mt-3 mb-0"/>
                            </div>
                        </div>
                      </div>
                    <br/>
                      <div class="row">
                        <div class="col-md-12">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <a class="d-block blur-shadow-image" id="img">
                            </a>
                          </div>
                        </div>
                      </div>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <button type="submit"  class="btn bg-gradient-primary mt-3 mb-0">Update !</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
