<div class="auth-wrap min-vh-100 d-flex align-items-center" style="background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);">
  <div class="container px-3 px-md-4">
    <div class="card shadow-sm mx-auto overflow-hidden w-100" style="max-width: 960px;">
      <div class="row g-0 align-items-stretch">

        {{-- KIRI: gambar besar (hidden di mobile) --}}
        <div class="col-md-6 d-none d-md-block">
          <img src="{{ asset('assets/img/Sirnagalih.jpg') }}"
               alt="Ilustrasi Desa Sirnagalih"
               class="h-100 w-100"
               style="object-fit: cover;">
        </div>

        {{-- KANAN: form login --}}
        <div class="col-12 col-md-6">
          <div class="card-body p-4 p-md-5">

            {{-- Logo --}}
            <div class="mb-3 text-center">
              <img src="{{ asset('assets/img/1.png') }}" alt="Logo Sirnagalih" width="48" height="48">
            </div>

            <div class="mb-4 text-center">
              <h4 class="fw-bold text-danger mb-0">Login Sirnagalih</h4>
            </div>

            {{-- Form --}}
            <form wire:submit.prevent="login" enctype="multipart/form-data" novalidate>
              {{-- NIK --}}
              <div class="mb-3">
                <input type="text"
                       class="form-control @error('nik') is-invalid @enderror"
                       id="nik" name="nik" placeholder="Masukan NIK"
                       autofocus autocomplete="username" inputmode="numeric"
                       wire:model="nik">
                @error('nik') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              {{-- Password --}}
              <div class="mb-3">
                <div class="input-group">
                  <input type="password"
                         class="form-control @error('password') is-invalid @enderror"
                         id="password" name="password"
                         placeholder="Masukan Password"
                         autocomplete="current-password"
                         wire:model="password">
                  {{-- kalau mau toggle eye, tinggal tambahin button di sini --}}
                </div>
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              {{-- Remember me --}}
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me">
                  <label class="form-check-label" for="remember-me"><small>Ingat saya</small></label>
                </div>
              </div>

              {{-- Error session --}}
              @if (session()->has('error'))
                <small class="text-danger d-block">{{ session('error') }}</small>
              @endif

              {{-- Actions --}}
              <div class="mt-3 mb-3">
                <button type="submit" class="btn btn-primary w-100 fw-bold">Masuk</button>
                <a href="/" class="btn btn-outline-secondary w-100 mt-2">Kembali</a>
              </div>
            </form>

            <div class="mt-2 text-center">
              <small>Belum memiliki akun?
                <a href="{{ route('register') }}" class="fw-bold">Daftar sekarang.</a>
              </small>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
