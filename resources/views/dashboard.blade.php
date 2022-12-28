@extends('layouts.main')

@section('container')
  <div class='layout-navbar' id="main">
    @include('partials.navbar')

    @include('sweetalert::alert')

    <div id="main-content">

      <div class="page-heading">
        <h3>Data PIK-R</h3>
      </div>
      <div class="page-content">
        <section class="row">
          <div class="col-12 col-lg-12">
            <div class="row">
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-3 py-4-5">
                    <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon purple mb-2">
                          <i class="iconly-boldShow"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Jumlah Pembina</h6>
                        <h4 class="font-extrabold mb-0">{{ $pembina->count() }}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-3 py-4-5">
                    <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon blue mb-2">
                          <i class="iconly-boldProfile"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Followers</h6>
                        <h4 class="font-extrabold mb-0">183.000</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-3 py-4-5">
                    <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon green mb-2">
                          <i class="iconly-boldAdd-User"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Following</h6>
                        <h4 class="font-extrabold mb-0">80.000</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-3 py-4-5">
                    <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon red mb-2">
                          <i class="iconly-boldBookmark"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Saved Post</h6>
                        <h4 class="font-extrabold mb-0">112</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Profile Visit</h4>
                  </div>
                  <div class="card-body">
                    <div id="chart-profile-visit"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-12 col-xl-8">
                <div class="card">
                  <div class="card-header">
                    <h4>Latest Comments</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover table-lg">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Comment</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="col-3">
                              <div class="d-flex align-items-center">
                                <div class="avatar avatar-md">
                                  <img src="{{ asset('dist') }}/assets/images/faces/5.jpg">
                                </div>
                                <p class="font-bold ms-3 mb-0">Si Cantik</p>
                              </div>
                            </td>
                            <td class="col-auto">
                              <p class=" mb-0">Congratulations on your graduation!</p>
                            </td>
                          </tr>
                          <tr>
                            <td class="col-3">
                              <div class="d-flex align-items-center">
                                <div class="avatar avatar-md">
                                  <img src="{{ asset('dist') }}/assets/images/faces/2.jpg">
                                </div>
                                <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                              </div>
                            </td>
                            <td class="col-auto">
                              <p class=" mb-0">Wow amazing design! Can you make another tutorial for
                                this design?</p>
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
          {{-- <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Visitors Profile</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-visitors-profile"></div>
                    </div>
                </div>
            </div> --}}
        </section>
      </div>
    @endsection
