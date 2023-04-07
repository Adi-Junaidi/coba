@extends('layouts.auth')

@section('title', 'Daftar PIK-R')

@section('styles')
  <link href="/auth/css/bs-stepper.min.css" rel="stylesheet">
@endsection

@section('form')
  <form class="login100-form validate-form p-b-33 p-t-5" id="stepper-form" action="/register" method="post">
    @csrf
    <div class="bs-stepper">
      <div class="bs-stepper-header" role="tablist">
        <!-- your steps here -->
        <div class="step" data-target="#logins-part">
          <button class="step-trigger" id="logins-part-trigger" type="button" role="tab" aria-controls="logins-part">
            <span class="bs-stepper-circle">1</span>
            <span class="bs-stepper-label">Logins</span>
          </button>
        </div>

        {{-- <div class="line"></div> --}}

        <div class="step" data-target="#information-part">
          <button class="step-trigger" id="information-part-trigger" type="button" role="tab" aria-controls="information-part">
            <span class="bs-stepper-circle">2</span>
            <span class="bs-stepper-label">Various information</span>
          </button>
        </div>

        <div class="step" data-target="#next-part">
          <button class="step-trigger" id="next-part-trigger" type="button" role="tab" aria-controls="next-part">
            <span class="bs-stepper-circle">3</span>
            <span class="bs-stepper-label">Next part</span>
          </button>
        </div>
      </div>
      <div class="bs-stepper-content">
        <!-- your steps content here -->
        <div class="content" id="logins-part" role="tabpanel" aria-labelledby="logins-part-trigger">
          <div class="wrap-input100 validate-input" data-validate="Masukkan Nama">
            <input class="input100" name="nama" type="text" placeholder="Masukkan Nama" required>
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter username">
            <input class="input100" name="username" type="text" placeholder="Username">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn secondary" type="button" onclick="stepper_prev()">Sebelumnya</button>
            <button class="login100-form-btn primary" type="button" onclick="stepper_next()">Selanjutnya</button>
          </div>
        </div>

        <div class="content" id="information-part" role="tabpanel" aria-labelledby="information-part-trigger">
          <div class="wrap-input100 validate-input" data-validate="Masukkan Nama">
            <input class="input100" name="nama" type="text" placeholder="Masukkan Nama" required>
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter username">
            <input class="input100" name="username" type="text" placeholder="Username">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn secondary" type="button" onclick="stepper_prev()">Sebelumnya</button>
            <button class="login100-form-btn primary" type="button" onclick="stepper_next()">Selanjutnya</button>
          </div>
        </div>

        <div class="content" id="next-part" role="tabpanel" aria-labelledby="next-part-trigger">
          <div class="wrap-input100 validate-input" data-validate="Enter email">
            <input class="input100" name="email" type="email" placeholder="Email">
            <span class="focus-input100" data-placeholder="&#xe818;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Masukkan password">
            <input class="input100" name="password" type="password" placeholder="Masukkan Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Konfirmasi password">
            <input class="input100" name="passwordConfirm" type="password" placeholder="Konfirmasi Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn" type="button" onclick="stepper_prev()">Sebelumnya</button>
            <button class="login100-form-btn" type="submit">Daftar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-3 text-center">Sudah punya akun? <a href="/login">Login</a></div>
  </form>
@endsection

@section('scripts')
  <script src="/auth/js/bs-stepper.min.js"></script>

  <script>
    const stepperEl = document.getElementById('stepper-form');
    const stepper = new Stepper(stepperEl);

    const stepperPanels = stepperEl.querySelectorAll('.bs-stepper-content > *');

    stepperEl.addEventListener('show.bs-stepper', e => {
      const fromStepIndex = e.detail.from;
      const fromPanel = stepperPanels[fromStepIndex];
      const invalids = fromPanel.querySelectorAll(':invalid');
      if (invalids.length > 0) {
        e.preventDefault();

        for (const input of invalids) {
          showValidate(input);
        }
      }
    });

    function showValidate(input) {
      var thisAlert = $(input).parent();

      $(thisAlert).addClass('alert-validate');
    }

    function stepper_next() {
      stepper.next();
    }

    function stepper_prev() {
      stepper.previous();
    }
  </script>
@endsection
