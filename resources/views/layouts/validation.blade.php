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
                <h3 class="mb-0">Note de Transaction(ok/bad)</h3>
                <div class="d-block">
                    <a href="{{route('home')}}" class="btn btn-sm btn-outline-info text-nowrap mb-0">Home</a>
                </div>
            </div>
     <div class="card">
    <div class="table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">user_send</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">user_receiver</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">user_agencier</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Nom de l'agent</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Tel de l'agent</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Nom du client</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Valider</th>
          </tr>
        </thead>
        <tbody>
        @if (!@empty($validationTransactions))
           @foreach ($validationTransactions  as $validationTransaction)
            <tr>
                <td>
                  <div class="d-flex px-2 py-1">

                    <div class="d-flex flex-column justify-content-center">
                        @if ($validationTransaction->user_send == 0)
                        <span class=" badge bg-gradient-danger">Bad</span>
                        @elseif($validationTransaction->user_send>0)
                        <span class=" badge bg-gradient-success">Ok</span>
                        @endif
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center">
                    @if ($validationTransaction->user_receiver == 0)
                    <span class=" badge bg-gradient-danger">Bad</span>
                    @elseif($validationTransaction->user_receiver>0)
                    <span class=" badge bg-gradient-success">Ok</span>
                    @endif
                </td>
                <td class="align-middle text-center">
                    @if ($validationTransaction->user_agencier == 0)
                    <span class=" badge bg-gradient-danger">Bad</span>
                    @elseif($validationTransaction->user_agencier>0)
                    <span class=" badge bg-gradient-success">Ok</span>
                    @endif

                </td>
                   <td>
                  <p class="text-xs text-secondary mb-0">{{ $validationTransaction->agencier_name }}</p>
                </td>
                <td>
                    <p class="text-xs text-secondary mb-0">{{ $validationTransaction->agencier_tel }}</p>
                </td>
                <td>
                    <p class="text-xs text-secondary mb-0">{{ $validationTransaction->user_send_name }}</p>
                </td>

                <td class="align-middle text-center">
                    @if ($role)
                    <a href="/noteTransaction/{{ $role->name }}/{{ $validationTransaction->id }}" class="badge bg-gradient-success"> Notez la transaction</a>
                    @endif
                </td>
              </tr>
              @endforeach
              @elseif($validationTransactions)
              @endif
        </tbody>
      </table>
    </div>
  </div>
        </div>
    </section>
</div>
@endsection
