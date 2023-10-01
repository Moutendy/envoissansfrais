@extends('parentprofil')

@section('content')

<header>
    <div class="page-header min-height-400" style="background-image: url('../assets/img/city-profile.jpg');" loading="lazy">
        <span class="mask bg-gradient-dark opacity-8"></span>
    </div>
</header>
<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">
    <!-- START Testimonials w/ user image & text & info -->
    <section class="py-sm-7 py-5 position-relative">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h3 class="mb-0">Validation Agencier</h3>
                <div class="d-block">
                    <button type="button" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</button>
                </div>
            </div>
     <div class="card">
            @if($validationTransactions)
            @foreach ($validationTransactions as $validationTransaction)
            {{ $validationTransaction }}
            @endforeach
            @elseif(!$validationTransactions)
            
            @endif
    <div class="table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description De la transaction</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de Debut</th>
            <th class="text-secondary opacity-7"></th>
          </tr>
        </thead>
        <tbody>

            @if (!@empty($validation))
           @foreach ($validation  as $val)

           @endforeach
            <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="{{ $val->image_profil}}" class="avatar avatar-sm me-3">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-xs">{{ $val->name}}</h6>
                      <p class="text-xs text-secondary mb-0">{{ $val->email}}</p>
                    </div>
                  </div>
                </td>
                <td>

                  <p class="text-xs text-secondary mb-0">{{ $val->rolename }}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="">{{ $val->accept_transaction }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                    <span class="">{{ $val->desc }}</span>
                  </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-normal">{{ $val->startdate }}</span>
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Accepter
                  </a>
                </td>
              </tr>
            @endif


        </tbody>
      </table>
    </div>
  </div>
        </div>
    </section>
</div>
@endsection
