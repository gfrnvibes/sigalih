<div class="container p-4">
    {{-- HERO KABAR DESA --}}
    <div class="hero hero--news mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="d-none d-md-block">
                <div class="hero-badge">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
            <div class="flex-grow-1">
                <nav aria-label="breadcrumb" class="mb-2">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="breadcrumb-item active fw-semibold" aria-current="page">Kabar Desa</li>
                    </ol>
                </nav>
                <h1 class="fw-bold h3 h2-md mb-2 d-flex align-items-center gap-2">Kabar Desa</h1>
                <p class="text-secondary mb-0">Update kegiatan, pengumuman, dan info terbaru dari desa. Stay in the
                    loop!
                </p>
            </div>
        </div>
        <div class="hero-blob" aria-hidden="true"></div>
    </div>


    {{-- BERITA --}}
    <div class="row justify-content-between">
        {{-- Berita Terbaru --}}
        <div class="col-12 col-md-5 mb-4">
            <h5 class="mb-3">Berita Terbaru</h5>
            @foreach ($post as $item)
                <a href="{{ route('show', $item->slug) }}">
                    <div class="card">
                        <img src="{{ Storage::url($item->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">{{ $item->title }}</h4>
                            <p class="card-text">
                                <small class="text-secondary">
                                    <i class="fas fa-calendar-alt me-2"></i>{{ $item->created_at->format('l, M Y') }}
                                </small>
                            </p>
                            <p class="card-text">{!! Str::limit($item->content, 200) !!} </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Berita Lainnya --}}
        <div class="col-12 col-md-6">
            <h5 class="mb-3">Berita Lainnya</h5>
            <div class="row gap-3">
                @foreach ($posts as $post)
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ Storage::url($post->image) }}" class="" alt=""
                                style="width: 160px;">
                        </div>
                        <div class="col">
                            <h6 class="fw-bold">{{ $post->title }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- <hr class="mt-5 mb-5"> --}}

    {{-- VIDEO --}}
    {{-- <div class="row gap-5">
        <div class="col">
            <h4 class="fw-bold mb-3">Video</h4>
            <iframe class="w-100" src="https://www.youtube.com/watch?v=GEyUDgXmHHI" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
            <h5 class="fw-bold">Profil Desa Sirnagalih Kecamatan Cisurupan Kabupaten Garut, Jawa Barat</h5>

        </div>
        <div class="col-6">
            <h5 class="mb-3">Video Lainnya</h5>
            <div class="row gap-3">
                @for ($i = 0; $i < 4; $i++)
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="https://fisipol.uma.ac.id/wp-content/uploads/2022/01/pengertian-desa.jpg"
                                class="" alt="" style="width: 160px;">
                        </div>
                        <div class="col">
                            <h6 class="fw-bold">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate,
                                hic?</h6>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <hr class="mt-5 mb-5"> --}}

    {{-- BERITA LAINNYA --}}
    {{-- <div class="row gap-3">
        <h4 class="fw-bold">Berita Lainnya</h4>
        @foreach ($lainnya as $lain)
            <div class="col gap-3 align-items-center">
                <img src="{{ Storage::url($lain->image) }}" class="w-100"
                    alt="">
                <h6 class="mt-3 fw-bold">{{ $lain->title }}
                </h6>
            </div>
        @endforeach
    </div> --}}
</div>
