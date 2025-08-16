<div class="container py-4" wire:poll>
    {{-- HERO / HEADER SESUAI JUDUL SURAT --}}
    <div class="hero hero--primary mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="d-none d-md-block">
                <div class="hero-badge">
                    <i class="fas fa-file-signature"></i>
                </div>
            </div>
            <div class="flex-grow-1">
                <nav aria-label="breadcrumb" class="mb-2">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('layanan') }}">Layanan</a></li>
                        <li class="breadcrumb-item active fw-semibold" aria-current="page">{{ $surat->nama_surat }}</li>
                    </ol>
                </nav>
                <h1 class="h3 h2-md fw-bold mb-2">{{ $surat->nama_surat }}</h1>
                <p class="text-secondary mb-0">{{ $surat->desc }}</p>
            </div>
        </div>
        <div class="hero-blob" aria-hidden="true"></div>
    </div>

    {{-- FLASH ALERTS, posisinya konsisten & ga loncat-loncat --}}
    @if (session()->has('success') || session()->has('error'))
        <div class="row mb-3">
            <div class="col-12 col-lg-10 mx-auto">
                @if (session()->has('success'))
                    <div class="alert alert-success rounded-3 shadow-sm d-flex align-items-center gap-2 mb-0">
                        <i class="bi bi-check2-circle fs-5"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                @else
                    <div class="alert alert-danger rounded-3 shadow-sm d-flex align-items-center gap-2 mb-0">
                        <i class="bi bi-x-circle fs-5"></i>
                        <div>{{ session('error') }}</div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    {{-- KONTEN 2 KOLOM SIMETRIS: kiri = deskripsi + form, kanan = status (kalau ada) --}}
    <div class="row g-4 align-items-start">
        {{-- KIRI --}}
        <div class="col-12 col-lg-7 order-2 order-lg-1">
            {{-- Deskripsi penuh (kalau mau); hero udah punya ringkasannya --}}
            {{-- <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-2">Tentang Surat Ini</h5>
                    <p class="mb-0">{{ $surat->desc }}</p>
                </div>
            </div> --}}

            {{-- FORMULIR PENGAJUAN --}}
            <div class="card">
                <div class="card-body p-4">
                    <div class="py-2 mb-3">
                        <h4 class="fw-bold">Formulir {{ $surat->nama_surat }}</h4>
                    </div>
                    <form wire:submit.prevent="submit">
                        @if (!empty($formFields))
                            @foreach ($formFields as $field)
                                <div class="mb-4">
                                    @if ($field->field_type === 'text')
                                        <label for="{{ $field->field_label }}"
                                            class="form-label text-capitalize">{{ $field->field_label }}</label>
                                        <input type="text" wire:model="formData.{{ $field->field_label }}"
                                            class="form-control @error('formData.' . $field->field_label) is-invalid @enderror"
                                            id="{{ $field->field_label }}" autocomplete="on">
                                        @error('formData.' . $field->field_label)
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    @elseif ($field->field_type === 'textarea')
                                        <label for="{{ $field->field_label }}"
                                            class="form-label text-capitalize">{{ $field->field_label }}</label>
                                        <textarea wire:model="formData.{{ $field->field_label }}"
                                            class="form-control @error('formData.' . $field->field_label) is-invalid @enderror" id="{{ $field->field_label }}"
                                            rows="3"></textarea>
                                        @error('formData.' . $field->field_label)
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    @elseif ($field->field_type === 'number')
                                        <label for="{{ $field->field_label }}"
                                            class="form-label text-capitalize">{{ $field->field_label }}</label>
                                        <input type="text" inputmode="numeric"
                                            wire:model="formData.{{ $field->field_label }}"
                                            class="form-control number @error('formData.' . $field->field_label) is-invalid @enderror"
                                            id="{{ $field->field_label }}">
                                        @error('formData.' . $field->field_label)
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    @elseif ($field->field_type === 'file')
                                        <label for="{{ $field->field_label }}"
                                            class="form-label text-capitalize">{{ $field->field_label }}</label>
                                        <input type="file" wire:model="formData.{{ $field->field_label }}"
                                            class="form-control @error('formData.' . $field->field_label) is-invalid @enderror"
                                            id="{{ $field->field_label }}"
                                            accept="image/*,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                        @error('formData.' . $field->field_label)
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    @elseif ($field->field_type === 'date')
                                        <label for="{{ $field->field_label }}"
                                            class="form-label text-capitalize">{{ $field->field_label }}</label>
                                        <input type="date" wire:model="formData.{{ $field->field_label }}"
                                            class="form-control @error('formData.' . $field->field_label) is-invalid @enderror"
                                            id="{{ $field->field_label }}">
                                        @error('formData.' . $field->field_label)
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    @elseif ($field->field_type === 'time')
                                        <label for="{{ $field->field_label }}"
                                            class="form-label text-capitalize">{{ $field->field_label }}</label>
                                        <input type="time" wire:model="formData.{{ $field->field_label }}"
                                            class="form-control @error('formData.' . $field->field_label) is-invalid @enderror"
                                            id="{{ $field->field_label }}">
                                        @error('formData.' . $field->field_label)
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger">Formulir Surat Kosong. Coba lagi nanti.</div>
                        @endif

                        <button type="submit" class="btn btn-primary fw-bold w-100 mb-4">Kirim Permohonan</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- KANAN: STATUS (sticky di desktop biar enak dibaca) --}}
        <div class="col-12 col-lg-5 order-1 order-lg-2">
            @if ($statusPermohonan)
                @if ($statusPermohonan === 'tunggu')
                    <div class="card border-warning  mb-4 position-lg-sticky top-lg-20">
                        <div class="card-body p-4 d-flex gap-3 align-items-start">
                            <i class="fas fa-history text-warning fs-1"></i>
                            <div>
                                <h5 class="card-title mb-1">Permohonan Sedang Diproses</h5>
                                <p class="card-text mb-2">
                                    Permohonan {{ $jenisSurat->nama_surat }} Anda sedang dalam proses. Mohon tunggu
                                    informasi lebih
                                    lanjut.
                                </p>
                                <small class="text-muted">
                                    {{ $request_surat->updated_at->format('d/m/Y') }} •
                                    {{ $request_surat->updated_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    </div>
                @elseif ($statusPermohonan === 'terima')
                    <div class="card border-success  mb-4 position-lg-sticky top-lg-20">
                        <div class="card-body p-4 d-flex gap-3 align-items-start">
                            <i class="fas fa-check-circle text-success fs-1"></i>
                            <div class="w-100">
                                <h5 class="card-title mb-1">Permohonan Diterima</h5>
                                <small class="card-text d-block mb-2">
                                    Permohonan {{ $jenisSurat->nama_surat }} Anda telah diterima.
                                    Berlaku hingga
                                    {{ \Carbon\Carbon::parse($request_surat->expired_at)->format('d/m/Y') }}.
                                </small>
                                @if ($request_surat->catatan_admin)
                                    <div class="mb-3">
                                        <small class="text-secondary">{{ $request_surat->catatan_admin }}</small>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap">
                                    <a href="{{ Storage::url($request_surat->file_surat) }}" target="_blank" download
                                        class="btn btn-sm btn-primary fw-bold rounded-3">
                                        <i class="bi bi-download me-2"></i>Download Surat
                                    </a>
                                    <small class="text-muted ms-auto">
                                        {{ $request_surat->updated_at->format('d/m/Y') }} •
                                        {{ $request_surat->updated_at->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($statusPermohonan === 'tolak')
                    <div class="card border-danger  mb-4 position-lg-sticky top-lg-20">
                        <div class="card-body p-4 d-flex gap-3 align-items-start">
                            <i class="fas fa-times-circle text-danger fs-1"></i>
                            <div>
                                <h5 class="card-title mb-1">Permohonan Ditolak</h5>
                                <p class="card-text mb-2">
                                    Permohonan {{ $jenisSurat->nama_surat }} Anda ditolak.
                                    Alasan: {{ $request_surat->catatan_admin }}
                                </p>
                                <small class="text-muted">
                                    {{ $request_surat->created_at->format('d/m/Y') }} •
                                    {{ $request_surat->created_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                {{-- DEFAULT: BELUM ADA RIWAYAT, tetap tampil biar layout simetris --}}
                <div class="card position-lg-sticky top-lg-20">
                    <div class="card-body p-4 d-flex gap-3 align-items-start">
                        <i class="fas fa-inbox text-secondary fs-1 d-none d-md-block"></i>
                        <div>
                            <h5 class="card-title mb-1">Belum Ada Riwayat</h5>
                            <p class="card-text mb-2">
                                Kamu belum pernah mengajukan {{ $surat->nama_surat }} sebelumnya.
                                Isi formulir untuk mulai pengajuan pertama kamu.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
    {{-- ✨ STYLE MINI: modern feel tapi tetap Bootstrap --}}
    <style>
        /* Hero dengan gradient & placeholder pattern di kanan */
        .hero-surat {
            --hero-gradient: linear-gradient(135deg, rgba(59, 130, 246, .12), rgba(16, 185, 129, .12));
            --hero-bg: radial-gradient(1200px 600px at 100% 0%, rgba(59, 130, 246, .15), transparent 60%),
                radial-gradient(900px 500px at 80% 40%, rgba(16, 185, 129, .12), transparent 55%);
            background: var(--hero-gradient);
        }

        .hero-blob {
            position: absolute;
            inset: 0;
            background: var(--hero-bg);
            pointer-events: none;
            mask-image: radial-gradient(90% 100% at 100% 0, #000 60%, transparent 100%);
            -webkit-mask-image: radial-gradient(90% 100% at 100% 0, #000 60%, transparent 100%);
        }

        .hero-badge {
            width: 48px;
            height: 48px;
            flex: 0 0 48px;
            background: rgba(255, 255, 255, .6);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(0, 0, 0, .05);
            font-size: 1.25rem;
        }

        .h2-md {
            font-size: clamp(1.5rem, 1.2rem + 1.2vw, 2rem);
        }

        /* Sticky di desktop untuk panel status */
        @media (min-width: 992px) {
            .position-lg-sticky {
                position: sticky;
            }

            .top-lg-20 {
                top: 20px;
            }
        }
    </style>
</div>
