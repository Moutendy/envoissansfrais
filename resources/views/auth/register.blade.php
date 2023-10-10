@extends('parentprofil')

@section('content')
<div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Register</h4>
              </div>
            </div>
            <div class="card-body">
              <form role="form" class="text-start" method="POST" action="{{ route('register') }}">
                <div class="input-group input-group-outline my-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" :value="old('name')" placeholder="Nom">
                @error('name')

                    {{ $errors->first('name') }}

                @enderror
                </div>
                <div class="input-group input-group-outline my-3">

                  <input type="email" class="form-control" name="email" :value="old('email')" placeholder="Email">
                  @error('email')

                    {{ $errors->first('email') }}

                   @enderror
                </div>
                <div class="input-group input-group-outline mb-3">

                  <input type="password" class="form-control" name="password" :value="old('password')" placeholder="Mot de Passe">
                  @error('password')
                    {{ $errors->first('password') }}
                   @enderror
                </div>
                <div class="input-group input-group-outline mb-3">

                    <input type="password" class="form-control" name="password_confirmation" :value="old('password_confirmation')" placeholder="Confirmation Mot de Passe" >
                    @error('password_confirmation')
                        {{ $errors->first('password_confirmation') }}
                     @enderror
                </div>
                <div class="input-group input-group-outline my-3">

                    <input type="number" class="form-control" name="tel" :value="old('tel')" placeholder="Tel" required>
                    @error('tel')
                     {{ $errors->first('tel') }}
                     @enderror
                </div>
                  <div class="input-group input-group-outline my-3">

                    <input type="text" class="form-control" name="pays" :value="old('pays')" placeholder="Pays">
                    @error('pays')
                        {{ $errors->first('pays') }}
                     @enderror
                </div>
                  <div class="input-group input-group-outline my-3">
                    <input type="text" class="form-control" name="ville" :value="old('ville')" placeholder="Ville">
                    @error('ville')
                        {{ $errors->first('ville') }}
                     @enderror
                </div>
                  <div class="input-group input-group-static mb-4">
                    <label>Role(client ou agencier)</label>
                    <select name="role_model"  class="form-control" required>
                      @foreach($roles as $role)
                     <option value="{{ $role->id }}">
                      {{ $role->name }}
                     </option>
                      @endforeach
                  </select>
                  @error('role_model')
                  {{ $errors->first('role_model') }}
                   @enderror
                  </div>
                <div class="form-check form-switch d-flex align-items-center mb-3">
                  <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                  <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">Sign in</button>
                </div>
                <p class="mt-4 text-sm text-center">

                  <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('J ai pas de compte') }}
                    </a>
                </div>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
