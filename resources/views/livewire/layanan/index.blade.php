<div class="container p-4">

    {{-- Success Alert --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- HEADER: Layanan --}}
    <div class="hero hero--primary">
        <div class="container-fluid p-0">
            <div class="row g-3 align-items-center">
                {{-- KIRI: badge + judul + deskripsi --}}
                <div class="col-12 col-lg-6">
                    <div class="d-flex align-items-center align-items-center gap-3">
                        <div class="d-none d-md-block">
                            <div class="hero-badge">
                                <i class="fas fa-layer-group"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="fw-bold h2-md mb-1">Layanan Surat</h1>
                            <p class="text-secondary mb-0">Semua layanan surat dalam satu tempat.</p>
                            {{-- pojok kanan-bawah --}}
                            @auth
                                <a href="{{ route('riwayatPengajuan') }}"
                                    class="fw-bold text-decoration-none link-primary d-inline-flex align-items-center">
                                    Riwayat Pengajuan <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>

                {{-- KANAN: search (auto ke kanan di ≥lg) --}}
                <div class="col-12 col-lg-6">
                    <form class="d-flex ms-lg-auto justify-content-start justify-content-lg-end gap-2 hero-search"
                        role="search">
                        <input class="form-control form-control-lg hero-input" type="search" placeholder="Cari layanan"
                            aria-label="Search">
                        <button class="btn btn-success btn-lg px-4" type="submit">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Cards Section --}}
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-4 mt-md-3">
        @forelse ($surats as $surat)
            <div class="col d-flex">
                <a href="{{ route('createPermohonan', ['nama_surat' => $surat->nama_surat]) }}"
                    class="w-100 text-decoration-none text-dark">
                    <div class="card shadow-sm border-0 h-100 card-hover overflow-hidden">

                        {{-- Gambar / Warna Fallback --}}
                        @if (!empty($surat->image))
                            <img src="{{ asset('storage/surat/' . $surat->image) }}"
                                class="card-img-top object-fit-cover" alt="{{ $surat->nama_surat }}"
                                style="height: 160px;">
                        @else
                            <div class="p-5 d-flex align-items-center justify-content-center text-white"
                                style="height:160px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                <i class="fas fa-file-alt fa-2x"></i>
                            </div>
                        @endif

                        {{-- Konten Card --}}
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="fw-bold">{{ $surat->nama_surat }}</h5>
                            <small class="text-secondary">{!! Str::limit($surat->desc, 100) !!}</small>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="mx-auto">
                <h5 class="text-center text-secondary">
                    Layanan Administrasi saat ini belum tersedia.<br>
                    Coba lagi lain hari 🙏
                </h5>
            </div>
        @endforelse
    </div>
</div>
