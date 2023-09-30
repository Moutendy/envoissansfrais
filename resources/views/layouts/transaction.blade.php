@extends('parentprofil')

@section('content')

<header>
    <div class="page-header min-height-400" style="background-image: url('{{ Auth::user()->image_desc }}');" loading="lazy">
        <span class="mask bg-gradient-dark opacity-8"></span>
    </div>
</header>
<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">
    <!-- START Testimonials w/ user image & text & info -->
    <section class="py-sm-7 py-5 position-relative">
        <div class="container">
            <div class="mt-n8 mt-md-n9 text-center">
                <a href="{{route('home')}}">
                <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="{{ Auth::user()->image_profil }}" alt="bruce" loading="lazy">
                </a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h3 class="mb-0">Transaction</h3>
                <div class="d-block">
                    <a href="addtransaction" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</a>
                </div>
            </div>
<div class="card">
    <div class="table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Accepter</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date debut de transaction</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date fin de transaction</th>
            <th class="text-secondary opacity-7"></th>
          </tr>
        </thead>
        <tbody>
            @if (!@empty($transactionSend))

            @foreach ($transactionSend as $sendTransactions )
            <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="{{ $sendTransactions->image_profil }}" class="avatar avatar-sm me-3">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-xs">{{ $sendTransactions->name }}</h6>
                      <p class="text-xs text-secondary mb-0">{{ $sendTransactions->email }}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ $sendTransactions->desc }}</p>

                </td>
                <td class="align-middle text-center text-sm">
                    @if($sendTransactions->accept_transaction == 1)
                    <span class="badge bg-gradient-success">On</span>
                @elseif($sendTransactions->accept_transaction == 0)
                <span class="badge bg-gradient-danger">Off</span>

                @endif
                </td>
                <td class="align-middle text-center">
                  <span class=" badge bg-gradient-success">{{ $sendTransactions->startdate }}</span>
                </td>
                <td class="align-middle text-center">
                    <span class=" badge bg-gradient-danger">{{ $sendTransactions->end }}</span>
                  </td>

                <td class="align-middle">
                    @if (!empty($role))
                    @if ($role->name == 'agencier')
                    @if($sendTransactions->accept_transaction == 0)
                    <a href="{{route('updatetransaction',$sendTransactions->id )}}" class="badge bg-gradient-success" data-toggle="tooltip" data-original-title="Edit user">
                        Accepter la transaction
                      </a>
                    @elseif($sendTransactions->accept_transaction == 1)
                    <a  class="badge bg-gradient-success" data-toggle="tooltip" data-original-title="Edit user">
                        transaction en cours
                    </a>
                    @endif
                    @endif
                    @elseif (empty($role))

                    @endif
                </td>
              </tr>
            @endforeach
            @elseif(empty($transactionSend))
            Aucune Transaction
            @endif
        </tbody>
      </table>
    </div>
  </div>
        </div>

    </section>
</div>
@endsection
