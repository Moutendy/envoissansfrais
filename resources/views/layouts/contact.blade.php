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
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h3 class="mb-0">Transaction Receiver</h3>
                            <div class="d-block">
                                <a href="addtransaction" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</a>
                            </div>
                        </div>
                        @if ($contacts)
                        @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}">
                         {{ $contact->name }}
                        </option>
                         @endforeach
                        @endif

                        <div class="row py-5">
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

                                      <tr>
                                          <td>
                                            <div class="d-flex px-2 py-1">
                                              <div>
                                                <img src="" class="avatar avatar-sm me-3">
                                              </div>
                                              <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs">ksflksfkf</h6>
                                                <p class="text-xs text-secondary mb-0">hjshshhshs</p>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <p class="text-xs font-weight-bold mb-0">hsgsyzhizjkz</p>

                                          </td>
                                          <td class="align-middle text-center text-sm">
                                            ndsidjposdkjdf
                                          </td>
                                          <td class="align-middle text-center">
                                            <span class=" badge bg-gradient-success">kjdjdjdjdjd</span>
                                          </td>
                                          <td class="align-middle text-center">
                                              <span class=" badge bg-gradient-danger">hsgsjshjshjs</span>
                                            </td>

                                          <td class="align-middle">

                                              <a href="dqsfqsfqsfqfqsf" class="badge bg-gradient-success" data-toggle="tooltip" data-original-title="Edit user">
                                                  Accepter la transaction
                                                </a>


                                          </td>
                                        </tr>

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
