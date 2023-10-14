@extends('transaction')

@section('content')
<section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signin.jpg'); background-size: cover;" loading="lazy"></div>
          </div>
          <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg p-3">
                  <h3 class="text-white text-primary mb-0">Faire une Transaction</h3>
                </div>
              </div>
              <div class="card-body">
                <p class="pb-3">
                    <div class="col-md-6">
                        <a href="{{route('home')}}" class="btn bg-gradient-success mt-3 mb-0">Home</a>
                      </div>
                </p>
                <br/>
                <form id="contact-form" method="post" action="{{route('storeTransaction')}}">
                    {{ csrf_field() }}
                  <div class="card-body p-0 my-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          <label>Description</label>
                          <input type="text" name="desc" class="form-control" placeholder="Description">
                          @if ($errors->has('desc'))
                          <span class="text-danger">{{ $errors->first('desc') }}</span>
                          @endif
                        </div>
                      </div>

                      <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label>Contacts</label>
                          <select name="user_receiver"  class="form-control" >
                            @if ($listContact)
                            @foreach($listContact as $contact)
                            <option value="{{ $contact->id }}">
                             {{ $contact->name }}
                            </option>
                             @endforeach
                            @else
                            <option >
                                Aucun contact
                            </option>
                            @endif
                            @if ($errors->has('user_receiver'))
                            <span class="text-danger">{{ $errors->first('user_receiver') }}</span>
                            @endif
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="input-group input-group-static mb-4">
                            <label>Date début</label>
                            <input name="start"  type="date"  id="datedebut" class="form-control datepicker" >
                            @if ($errors->has('start'))
                            <span class="text-danger">{{ $errors->first('start') }}</span>
                            @endif
                        </div>
                        </div>
                        <div class="col-md-6 ps-md-2">
                          <div class="input-group input-group-static mb-4">
                            <label>Date fin</label>
                            <input name="end" type="date" id="datefin"  class="form-control datepicker">
                            @if ($errors->has('end'))
                            <span class="text-danger">{{ $errors->first('end') }}</span>
                            @endif
                        </div>
                        </div>
                      </div>

                    <div class="row">
                        <div class="col-md-6 ps-md-2">
                            <div class="input-group input-group-static mb-4">

                                <label>Nom de l'agencier : <b></b></label>
                                <select name="user_agencier" class="form-control">
                                    <option value="{{ $users->id }}">
                                        {{ $users->name }}
                                    </option>
                                    @if ($errors->has('user_agencier'))
                            <span class="text-danger">{{ $errors->first('user_agencier') }}</span>
                                     @endif
                                </select>
                            </div>
                          </div>
                      <div class="col-md-6">
                        <button type="submit" class="btn bg-gradient-primary mt-3 mb-0">Ajouter !</button>
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
