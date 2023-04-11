@extends('layouts.auth')

@section('title', 'Daftar PIK-R')

@section('styles')
  <link href="/auth/css/bs-stepper.min.css" rel="stylesheet">
@endsection

@section('form')
  @error('username')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  @error('passwordConfirm')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  @error('basis')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  @error('pembina')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  @error('desa_id')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <form class="login100-form validate-form p-b-33 p-t-5" id="stepper-form" action="/register" method="post" novalidate>
    @csrf
    <div class="bs-stepper">
      <div class="bs-stepper-header" role="tablist">
        <!-- your steps here -->
        <div class="step" data-target="#account-part">
          <button class="step-trigger" id="account-part-trigger" type="button" role="tab" aria-controls="account-part">
            <span class="bs-stepper-circle">1</span>
            <span class="bs-stepper-label">Akun</span>
          </button>
        </div>

        <div class="line"></div>

        <div class="step" data-target="#identitas-part">
          <button class="step-trigger" id="identitas-part-trigger" type="button" role="tab" aria-controls="identitas-part">
            <span class="bs-stepper-circle">2</span>
            <span class="bs-stepper-label">Identitas</span>
          </button>
        </div>

        <div class="line"></div>

        <div class="step" data-target="#alamat-part">
          <button class="step-trigger" id="alamat-part-trigger" type="button" role="tab" aria-controls="alamat-part">
            <span class="bs-stepper-circle">3</span>
            <span class="bs-stepper-label">Alamat</span>
          </button>
        </div>
      </div>

      <div class="bs-stepper-content">
        <!-- your steps content here -->
        <div class="content" id="account-part" role="tabpanel" aria-labelledby="account-part-trigger">
          <div class="wrap-input100 validate-input" data-validate="Masukkan username">
            <input class="input100" name="username" type="text" value="{{ old('username') }}" required placeholder="Username">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Masukkan email yang valid">
            <input class="input100" name="email" type="email" value="{{ old('email') }}" required placeholder="Email">
            <span class="focus-input100" data-placeholder="&#xe818;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Masukkan password">
            <input class="input100" name="password" type="password" required placeholder="Masukkan Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Konfirmasi password">
            <input class="input100" name="passwordConfirm" type="password" required placeholder="Konfirmasi Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn primary" type="button" onclick="stepper_next()">Selanjutnya</button>
          </div>
        </div>

        <div class="content" id="identitas-part" role="tabpanel" aria-labelledby="identitas-part-trigger">
          <div class="wrap-input100 validate-input" data-validate="Masukkan nama PIK-R">
            <input class="input100" name="nama" type="text" value="{{ old('nama') }}" required placeholder="Nama PIK-R">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Masukkan basis PIK-R">
            <select class="input100" name="basis" type="text" required>
              <option value="" hidden>Pilih Basis PIK-R</option>
              <optgroup label="Jalur Pendidikan">
                <option value="SMP/Sederajat" @if (old('basis') === 'SMP/Sederajat') selected @endif>Jalur Pendidikan - SMP/Sederajat</option>
                <option value="SMA/Sederajat" @if (old('basis') === 'SMA/Sederajat') selected @endif>Jalur Pendidikan - SMA/Sederajat</option>
                <option value="Perguruan Tinggi" @if (old('basis') === 'Perguruan Tinggi') selected @endif>Jalur Pendidikan - Perguruan Tinggi</option>
              </optgroup>
              <optgroup label="Jalur Masyarakat">
                <option value="Organisasi Keagamaan" @if (old('basis') === 'Organisasi Keagamaan') selected @endif>Jalur Masyarakat - Organisasi Keagamaan</option>
                <option value="LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan" @if (old('basis') === 'LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan') selected @endif>Jalur Masyarakat - LSM/Organisasi Kepemudaan/Organisasi Kemasyarakatan</option>
              </optgroup>
            </select>
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Masukkan nama pembina">
            <input class="input100" name="pembina" type="text" value="{{ old('pembina') }}" required list="list-pembina" placeholder="Nama pembina">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
            <datalist id="list-pembina">
              @foreach ($pembinas as $p)
                <option>{{ $p->nama }}</option>
              @endforeach
            </datalist>
          </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn secondary" type="button" onclick="stepper_prev()">Sebelumnya</button>
            <button class="login100-form-btn primary" type="button" onclick="stepper_next()">Selanjutnya</button>
          </div>
        </div>

        <div class="content" id="alamat-part" role="tabpanel" aria-labelledby="alamat-part-trigger">
          {{-- Dropdown --}}
          <div class="row">
            <fieldset class="form-group col-md-6">
              <select class="form-control" id="basicSelect" disabled>
                <option value="">75 | Gorontalo</option>
              </select>
            </fieldset>
            <fieldset class="form-group col-md-6">
              <select class="form-control" id="ddKabKota" name="ddKabKota">
                <option value="" hidden>Kabupaten/Kota</option>
                @foreach ($kabkotas as $kabkota)
                  <option value="{{ $kabkota->id }}">{{ $kabkota->kode . ' | ' . $kabkota->nama }}</option>
                @endforeach
              </select>
            </fieldset>
          </div>

          <div class="row">
            <fieldset class="form-group col-md-6">
              <select class="form-control" id="ddKecamatan" name="ddKecamatan" disabled>
                <option value="" hidden>Kecamatan</option>
              </select>
            </fieldset>
            <fieldset class="form-group col-md-6">
              <select class="form-control" id="ddDesa" name="desa_id" disabled>
                <option value="" hidden>Desa/Kelurahan</option>
              </select>
            </fieldset>
          </div>
          {{-- End Dropdown --}}

          <div class="wrap-input100 validate-input" data-validate="Masukkan alamat">
            <input class="input100" name="alamat" type="text" value="{{ old('alamat') }}" required placeholder="Masukkan alamat lengkap PIK-R">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn secondary" type="button" onclick="stepper_prev()">Sebelumnya</button>
            <button class="login100-form-btn primary" type="submit">Daftar</button>
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
        for (const input of invalids) {
          showValidate(input);
        }

        e.preventDefault();
      }
    });

    function showValidate(input) {
      const thisAlert = $(input).parent();

      $(thisAlert).addClass('alert-validate');
    }

    function stepper_next() {
      stepper.next();
    }

    function stepper_prev() {
      stepper.previous();
    }
  </script>

  {{-- Dropdown dependent --}}
  <script>
    $("#ddKabKota").on("change", function() {
      const kabkotaID = $(this).val();
      const ddKecamatan = $("#ddKecamatan");
      const ddDesa = $("#ddDesa");

      if (kabkotaID) {
        $.ajax({
          type: "get",
          url: `/api/kabkota/${kabkotaID}/kecamatans/`,
          dataType: "json",
          success: function(data) {
            if (data) {
              ddKecamatan.empty();
              ddKecamatan.append("<option value='' hidden>Kecamatan</option>");
              $.each(data, function(key, kecamatan) {
                ddKecamatan.append(`<option value="${kecamatan.id}">${kecamatan.kode} | ${kecamatan.nama}</option>`);
              });
              ddKecamatan.prop("disabled", false);

              ddDesa.val("");
              ddDesa.prop("disabled", true);
            } else {
              ddKecamatan.empty();
              ddKecamatan.prop("disabled", true);
            }
          },
        });
      } else {
        ddKecamatan.empty();
        ddKecamatan.prop("disabled", true);
      }
    });

    $("#ddKecamatan").on("change", function() {
      const kecamatanId = $(this).val();
      const ddDesa = $("#ddDesa");

      if (kecamatanId) {
        $.ajax({
          type: "get",
          url: `/api/kecamatan/${kecamatanId}/desas/`,
          dataType: "json",
          success: function(data) {
            if (data) {
              ddDesa.empty();
              ddDesa.append("<option value='' hidden>Desa/Kelurahan</option>");
              $.each(data, function(key, desa) {
                ddDesa.append(`<option value="${desa.id}">${desa.kode} | ${desa.nama}</option>`);
              });
              ddDesa.prop("disabled", false);
            } else {
              ddDesa.empty();
              ddDesa.prop("disabled", true);
            }
          },
        });
      } else {
        ddDesa.empty();
        ddDesa.prop("disabled", true);
      }
    });
  </script>
@endsection
