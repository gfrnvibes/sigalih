<div class="container p-4">
    <div class="hero hero--transparansi mb-4">
        <div class="d-flex align-items-start align-items-center gap-3">
            <div class="d-none d-md-block">
                <div class="hero-badge">
                    <i class="fas fa-balance-scale"></i>
                </div>
            </div>
            <div>
                <nav aria-label="breadcrumb" class="mb-1">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="breadcrumb-item active fw-semibold" aria-current="page">Transparansi</li>
                    </ol>
                </nav>
                <h1 class="fw-bold h2-md mb-1">Transparansi Desa</h1>
                <p class="text-secondary mb-0">Laporan anggaran, realisasi, dan info keterbukaan publik.</p>
            </div>
        </div>
    </div>

    <div class="row gap-5 flex-column-reverse flex-md-row">
        <div class="col-12 col-md-6">
            <h5 class="mb-3">Infografis Laporan APB Desa</h5>
            <div id="carouselDanaDesa" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @forelse ($transparansis as $item)
                        <div class="carousel-item border @if ($loop->first) active @endif" >
                            <img src="{{ Storage::url($item->infografik) }}" class="img-fluid"
                                alt="{{ $item->keterangan }}">
                            {{-- <div class="carousel-caption d-none d-md-block">
                                    <h5 class="fw-bold">{{ $item->keterangan }}</h5>
                                    <p>Tahun : {{ $item->tahun }}</p>
                                </div> --}}
                        </div>
                    @empty
                        <div class="carousel-item active">
                            <img src="{{ asset('images/no-image.png') }}" class="d-block w-100" alt="No Image">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Tidak ada data</h5>
                            </div>
                        </div>
                    @endforelse
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselDanaDesa"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselDanaDesa"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
        <div class="col-12 col-md-4">
            <h5 class="mb-3">Download Laporan APB Desa</h5>
            @forelse ($transparansis as $item)
                <div class="card shadow-sm">
                    <div class="card-body p-3">
                        <h5 class="fw-bold">{{ $item->keterangan }}</h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <small>Tahun : {{ $item->tahun }}</small>
                            </div>
                            <a href="{{ Storage::url($item->dokumen) }}" class="me-5" target="_blank" download>
                                <small>Download Laporan</small>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Data belm tersedia</p>
            @endforelse
        </div>
    </div>

</div>
