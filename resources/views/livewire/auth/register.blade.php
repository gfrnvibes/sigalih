<div class="bg-auth min-vh-100 d-flex align-items-center">
    <div class="container px-3 px-md-4">
        <div class="card shadow mx-auto w-100 overflow-hidden" style="max-width: 960px;">
            <div class="row g-0 align-items-stretch">

                {{-- KIRI: gambar besar (hidden di mobile) --}}
                <div class="col-md-6 d-none d-md-block">
                    <img src="{{ asset('assets/img/Sirnagalih.jpg') }}" alt="Ilustrasi Desa Sirnagalih" class="h-100 w-100"
                        style="object-fit: cover;">
                </div>

                {{-- KANAN: form --}}
                <div class="col-12 col-md-6">
                    <div class="card-body p-4 p-md-5">

                        {{-- Logo (selalu tampil) --}}
                        <div class="mb-3 text-center">
                            <img src="{{ asset('assets/img/1.png') }}" alt="Logo Sirnagalih" width="48"
                                height="48">
                        </div>

                        <div class="mb-4 text-center">
                            <h4 class="fw-bold text-danger mb-0">Daftar Akun Sirnagalih</h4>
                        </div>

                        {{-- Form --}}
                        <form wire:submit.prevent="register" enctype="multipart/form-data" novalidate>
                            <div class="mb-3">
                                <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                    id="nik" name="nik" placeholder="Nomor Induk Kependudukan (NIK)" autofocus
                                    autocomplete="off" inputmode="numeric" wire:model="nik">
                                @error('nik')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Email" autocomplete="email"
                                    wire:model="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" placeholder="Nomor Telepon" autocomplete="tel"
                                    inputmode="tel" wire:model="phone">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Password" autocomplete="new-password"
                                    wire:model="password" />
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            @if (session()->has('error'))
                                <small class="text-danger d-block">{{ session('error') }}</small>
                            @endif

                            <div class="mt-3 mb-3">
                                <button type="submit" class="btn btn-primary d-grid w-100 fw-bold">Daftar</button>
                            </div>
                        </form>
                        {{-- End Form --}}

                        <div class="mt-2 text-center">
                            <p class="mb-0">Sudah memiliki akun?
                                <a href="{{ route('login') }}" class="fw-bold">Login</a>
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        /* background lembut halaman auth */
        .bg-auth {
            background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
        }

        /* kecilkan padding di mobile, lega di desktop (sudah via p-4/p-md-5, ini tambahan kalau mau) */
        @media (max-width: 575.98px) {
            .card-body {
                padding: 1.25rem !important;
            }
        }
    </style>
</div>
