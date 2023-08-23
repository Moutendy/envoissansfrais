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
                <h3 class="mb-0">Validation</h3>
                <div class="d-block">
                    <button type="button" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</button>
                </div>
            </div>
<div class="card">
    <div class="table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Technology</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
            <th class="text-secondary opacity-7"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="d-flex px-2 py-1">
                <div>
                  <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">John Michael</h6>
                  <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">Manager</p>
              <p class="text-xs text-secondary mb-0">Organization</p>
            </td>
            <td class="align-middle text-center text-sm">
              <span class="badge badge-sm badge-danger">Online</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-normal">23/04/18</span>
            </td>
            <td class="align-middle">
              <a href="javascript:;" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="d-flex px-2 py-1">
                <div>
                  <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Alexa Liras</h6>
                  <p class="text-xs text-secondary mb-0">alexa@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">Programator</p>
              <p class="text-xs text-secondary mb-0">Developer</p>
            </td>
            <td class="align-middle text-center text-sm">
              <span class="badge badge-sm badge-secondary">Offline</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-normal">11/01/19</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="d-flex px-2 py-1">
                <div>
                  <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Laurent Perrier</h6>
                  <p class="text-xs text-secondary mb-0">laurent@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">Executive</p>
              <p class="text-xs text-secondary mb-0">Projects</p>
            </td>
            <td class="align-middle text-center text-sm">
              <span class="badge badge-sm badge-success">Online</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-normal">19/09/17</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="d-flex px-2 py-1">
                <div>
                  <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Michael Levi</h6>
                  <p class="text-xs text-secondary mb-0">michael@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">Programator</p>
              <p class="text-xs text-secondary mb-0">Developer</p>
            </td>
            <td class="align-middle text-center text-sm">
              <span class="badge badge-sm badge-success">Online</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-normal">24/12/08</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="d-flex px-2 py-1">
                <div>
                  <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Richard Gran</h6>
                  <p class="text-xs text-secondary mb-0">richard@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">Manager</p>
              <p class="text-xs text-secondary mb-0">Executive</p>
            </td>
            <td class="align-middle text-center text-sm">
              <span class="badge badge-sm badge-secondary">Offline</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-normal">04/10/21</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>

          <tr>
            <td>
              <div class="d-flex px-2 py-1">
                <div>
                  <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-xs">Miriam Eric</h6>
                  <p class="text-xs text-secondary mb-0">miriam@creative-tim.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0">Programtor</p>
              <p class="text-xs text-secondary mb-0">Developer</p>
            </td>
            <td class="align-middle text-center text-sm">
              <span class="badge badge-sm badge-secondary">Offline</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-normal">14/09/20</span>
            </td>
            <td class="align-middle">
              <a href="#!" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                Edit
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
        </div>
    </section>
</div>
@endsection
