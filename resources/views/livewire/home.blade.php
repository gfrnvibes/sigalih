<div>
    <!-- Hero -->
    <div class="text-center bg-image" style=" background-image: url('{{ asset('assets/img/desa Sirnagalih.jpg') }}');">
        <div class="mask h-100" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <div class="h4">ᮝᮤᮜᮥᮏᮩᮀ ᮞᮥᮙ᮪ᮕᮤᮀ ᮓᮤ ᮞᮤᮁᮔᮌᮜᮤᮂ</div>
                    <h1 class="mb-3 fw-bold h1">Wilujeng Sumping di Sirnagalih</h1>
                    <p class="fst-italic h6 mb-4s px-3">"Dituntun ku santun, dipiara ku rasa, dilatih peurih, diasuh
                        lungguh, <br> diasah ku kanyaah, disipuh ku karipuh."</p>
                    {{-- <a data-mdb-ripple-init class="btn btn-outline-light mt-3 rounded-5 fw-bold" href="#!"
                        role="button">Selengkapnya<i class="fas fa-paper-plane ms-2"></i></a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Hero -->

    {{-- Layanan --}}
    <div class="container-fluid">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1 class="fw-bold">Layanan Surat</h1>
                <p class="text-body-secondary mb-0">Pilih jenis surat yang kamu butuhin. Klik, ajukan, beres.</p>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                @forelse ($surats as $surat)
                    @php
                        // Fallback image: pake field image_url kalau ada, kalau enggak pakai placeholder
                        $img =
                            $surat->image_url ?? asset('assets/img/surat/' . ($surat->slug ?? 'placeholder') . '.webp');
                        // Badge kategori optional
                        $kategori = $surat->kategori ?? null;
                        // Flag "baru" optional
                        $isBaru = $surat->is_baru ?? false;
                        // Estimasi proses (optional), contoh field: waktu_proses
                        $waktu = $surat->waktu_proses ?? null;

                        $img =
                            $surat->image_url ??
                            match (Str::slug($surat->nama_surat)) {
                                default => 'https://placehold.co/600x400?text=' . $surat->nama_surat,
                            };
                    @endphp

                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 card-hover overflow-hidden bg-white">
                            <div class="position-relative">
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

                                {{-- Badge pojok kiri atas --}}
                                @if ($isBaru)
                                    <span
                                        class="badge rounded-pill text-bg-success position-absolute top-0 start-0 m-3">
                                        Baru
                                    </span>
                                @endif

                                @if ($kategori)
                                    <span class="badge rounded-pill text-bg-primary position-absolute top-0 end-0 m-3">
                                        {{ $kategori }}
                                    </span>
                                @endif
                            </div>

                            <div class="card-body d-flex flex-column">
                                {{-- Header singkatan + judul --}}
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    {{-- Avatar singkatan (fallback kalau ga ada gambar spesifik) --}}
                                    <div class="rounded-3 border fw-bold text-uppercase d-inline-flex align-items-center justify-content-center flex-shrink-0"
                                        style="width:48px;height:48px;border-width:2px;">
                                        {{ Str::of($surat->singkatan)->upper() }}
                                    </div>
                                    <h5 class="card-title fw-bold mb-0">{{ $surat->nama_surat }}</h5>
                                </div>

                                {{-- Desc --}}
                                <p class="card-text text-body-secondary mb-3">
                                    {!! Str::limit(strip_tags($surat->desc ?? ''), 110) !!}
                                </p>

                                {{-- Meta kecil --}}
                                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                                    @if ($waktu)
                                        <span class="badge text-bg-light border">
                                            <i class="fa-regular fa-clock me-1"></i> {{ $waktu }}
                                        </span>
                                    @endif
                                    @isset($surat->biaya)
                                        <span class="badge text-bg-light border">
                                            <i class="fa-solid fa-tags me-1"></i> {{ $surat->biaya }}
                                        </span>
                                    @endisset
                                </div>

                                <div class="mt-auto text-end">
                                    <a href="{{ route('createPermohonan', ['nama_surat' => $surat->nama_surat]) }}"
                                        class="btn btn-danger fw-semibold rounded-3">
                                        Ajukan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <div class="alert alert-danger text-center rounded-4">
                            Layanan belum tersedia. Stay tuned ya 👀
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-5 text-center">
                <a href="{{ route('layanan') }}" class="fw-bold fs-5 link-underline link-underline-opacity-0">
                    Lihat semua Layanan<i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>

    <style>
        .card-hover {
            transition: transform .18s ease, box-shadow .18s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 .75rem 2rem rgba(0, 0, 0, .08);
        }

        .object-fit-cover {
            object-fit: cover;
        }
    </style>


    {{-- Bank Sampah --}}
    <div class="container-fluid mb-5 mb-md-0" style="background-color: rgb(255, 248, 248, 0.6)">
        <div class="container p-md-5">
            <div class="row align-items-center justify-content-center gap-5">
                <div class="col-md-5 col-sm-12 mt-4 mt-md-0">
                    <img src="{{ asset('assets/img/banksampah.png') }}" alt="" class="w-100">
                </div>
                <div class="col-md-5 col-sm-12">
                    @if (auth()->check())
                        <h2 class="fw-bold">Hey, ajak rekanmu buat ikutan Program Bank Sampah</h4>
                            <p class="lead my-3">Ayo sama-sama bersihkan lingkungan dan dapatkan manfaat program bank
                                sampah.</p>
                            <div class="d-flex justify-content-center justify-content-md-start">
                                <a href="https://api.whatsapp.com/send?text=Ayo%20ikuti%20Program%20Bank%20Sampah%20di%20https://sigalih.desa.id"
                                    class="btn btn-success card-grow fw-bold mt-3 rounded-5 mb-4 mb-md-0 shadow"
                                    target="_blank"
                                    style="background-image: linear-gradient(to right, #0a9659 0%, #3cba53 100%);">
                                    <i class="fab fa-whatsapp me-2"></i>Bagikan di WhatsApp
                                </a>
                            </div>
                    @endif

                    @if (!auth()->check())
                        <h2 class="fw-bold">Kamu bisa dapat Uang dengan mengikuti program Bank Sampah</h4>
                            <p class="lead my-3">Hey, kabar baik! dengan mengikuti program Bank Sampah, kamu bisa dapat
                                uang
                                lho. Ayo ikuti sekarang!</p>
                            <div class="d-flex justify-content-center justify-content-md-start">
                                <a href="{{ route('login') }}"
                                    class="btn btn-success card-grow fw-bold mt-3 rounded-5 mb-4 mb-md-0 shadow"
                                    style="background-image: linear-gradient(to right, #0a9659 0%, #3cba53 100%);">
                                    Ikuti Sekarang<i class="fas fa-paper-plane ms-2"></i></a>
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Transparansi --}}
    <div class="container-fluid mb-5 mb-md-0">
        <div class="container p-md-5">
            <div class="row align-items-center justify-content-center gap-5">
                <div class="col-md-6 col-sm-12">
                    <h2 class="fw-bold">Untuk kesejahteraan Masyarakat, kami berkomitmen pada Transparansi</h4>
                        <p class="lead my-3">Kami terus berupaya meningkatkan kepercayaan masyarakat dengan bersikap
                            terbuka dalam pengelolaan Dana Desa</p>
                        <div class="d-flex justify-content-center justify-content-md-start">
                            <a href="{{ route('dana-desa') }}"
                                class="img-fluid btn btn-success card-grow fw-bold mt-3 rounded-5 shadow"
                                style="background-image: linear-gradient(to right, #960a0a 0%, #ba3c3c 100%);">
                                Lihat Transparansi<i class="fas fa-paper-plane ms-2"></i></a>
                        </div>
                </div>
                <div class="col-md-5 col-sm-12 d-none d-md-block">
                    <div id="carouselDanaDesa" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse ($transparansis as $item)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ Storage::url($item->infografik) }}" class="object-fit-cover w-100"
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
            </div>
        </div>
    </div>

    {{-- Berita & Galeri --}}
    <div class="container-fluid">
        <div class="container p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold">Kabar Desa Terbaru</h2>
                <a href="{{ route('berita') }}" class="fw-bold d-none d-md-block">Lihat semua <i
                        class="fas fa-arrow-right ms-2"></i></a>
            </div>
            <div class="row gap-5">
                <div class="col-12 col-md-5">
                    @foreach ($post as $item)
                        <img src="{{ Storage::url($item->image) }}" class="img-fluid rounded" alt="...">
                        <div class="mt-3">
                            <h4 class="fw-bold">{{ $item->title }}</h4>
                            <div class="d-none d-md-block">
                                <p class="card-text">
                                    <small class="text-secondary">
                                        <i class="fas fa-calendar-alt me-2"></i>
                                        {{ $item->created_at->translatedFormat('d F Y') }}
                                    </small>
                                </p>
                                <p class="card-text">
                                    {!! Str::limit($item->content, 200) !!}
                                    <span>
                                        <a href="{{ route('show', $item->slug) }}">Baca selengkapnya</a>
                                    </span>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12 col-md-6 d-none d-md-block">
                    <div class="row row-cols-md-2 g-5">
                        @foreach ($posts as $post)
                            <div class="col">
                                <a href="" class="link-decoration">
                                    <div class="ratio ratio-16x9 mb-2">
                                        <img src="{{ Storage::url($post->image) }}"
                                            alt=""class="rounded object-fit-cover">
                                    </div>
                                    <p class="fw-bold">{{ $post->title }}
                                        {{-- </><br>
                                        <span>
                                            <small>{!! Str::limit($post->content, 100) !!}
                                                <span>
                                                    <a href="">baca selengkapnya</a></span></small>
                                        </span> --}}
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center justify-content-md-start">
                <a href="{{ route('berita') }}"
                    class="img-fluid btn btn-success card-grow fw-bold mt-3 rounded-5 d-md-none shadow"
                    style="background-image: linear-gradient(to right, #960a0a 0%, #ba3c3c 100%);">
                    Semua Berita<i class="fas fa-paper-plane ms-2"></i></a>
            </div>
        </div>
    </div>

    {{-- Penduduk --}}
    {{-- <div class="container-fluid" style="background-color: rgb(255, 248, 248, 0.6)">
        <div class="container p-5">
            <h1 class="text-center fw-bold mb-5">Kependudukan Sirnagalih</h1>
            <div class="row row-cols-1 row-cols-md-4 g-5">
                <div class="col d-flex align-items-center justify-content-center card-grow">
                    <div class="text-center">
                        <div class="mb-3">
                            <img src="{{ asset('assets/img/undraw_people_re_8spw.svg') }}" alt=""
                                class="w-50">
                        </div>
                        <h4 class="fw-bold">7.096 Jiwa</h4>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center card-grow">
                    <div class="text-center d-flex flex-column">
                        <div class="mb-3">
                            <img src="{{ asset('assets/img/undraw_small_town_re_7mcn.svg') }}" alt=""
                                class="w-75">
                        </div>
                        <div class="mt-auto">
                            <h4 class="fw-bold">3 Dusun</h4>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center card-grow">
                    <div class="text-center d-flex flex-column">
                        <div class="mb-3">
                            <img src="{{ asset('assets/img/undraw_off_road_re_leme.svg') }}" alt=""
                                class="w-50">
                        </div>
                        <div class="mt-auto">
                            <h4 class="fw-bold">8 Rukun Warga (RW)</h4>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center card-grow">
                    <div class="text-center d-flex flex-column">
                        <div class="mb-3">
                            <img src="{{ asset('assets/img/undraw_celebration_re_kc9k.svg') }}" alt=""
                                class="w-50">
                        </div>
                        <div class="mt-auto">
                            <h4 class="fw-bold">49 Rukun Tangga (RT)</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-center">
                <a href="" class="fw-bold fs-5">Lihat semua statistik<i
                        class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div> --}}


    {{-- Kontak --}}
    {{-- <section class="container p-5">
        <h2 class="text-center fw-bold mb-5">Kritik dan Saran Masyarakat</h2>
        <div class="row justify-content-around">
            <div class="col-lg-4 text-center d-flex fw-bold align-items-center justify-content-center">
                Beri kami kritik dan saran yang membangun untuk kemajuan Website juga Desa Sirnagalih.
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Kritik dan Saran</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button class="btn btn-primary fw-bold mx-auto">Kirim<i class="fas fa-paper-plane ms-2"></i></button>
            </div>
        </div>
    </section> --}}
</div>
</div>
