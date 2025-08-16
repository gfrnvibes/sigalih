<div class="container mt-md-5 p-4 p-md-3">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/berita">Kabar Sirnagalih</a></li>
            <li class="breadcrumb-item active" aria-current="page">Baca Berita</li>
        </ol>
    </nav>

    {{-- Body --}}
    <div class="row mt-3 gap-5">
        <div class="col-12 col-md-7">
            <div class="">
                <h2 class="fw-bold">{{ $post->title }}</h2>
                <p class="text-secondary">
                    <i
                        class="fas fa-calendar-alt text-secondary"></i>&nbsp;&nbsp;&nbsp;{{ $post->created_at->translatedFormat('l, d M Y') }}
                    &nbsp;&nbsp; <i class="fas fa-user text-secondary"></i>&nbsp;&nbsp;&nbsp;Admin
                </p>
            </div>
            <div>
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->image }}" class="rounded img-fluid"
                    style="width: 800px">
            </div>
            <div class="mt-3 mt-md-5 lh-lg">
                <p style="text-align: justify;">{{ $post->content }}</p>
            </div>
            {{--
            <hr class="mt-5 mb-3">
            <a href="">
                <div class="d-inline-flex align-items-center gap-3">
                    <i class="far fa-thumbs-up fs-3"></i>
                    <h6 class="fw-bold">12 Like</h6>
                </div>
            </a>
            <hr class="mt-3 mb-3">
            <h5 class="fw-bold mb-3">Komentar</h5>
            <form action="">
                <div class="row">
                    <div class="col-auto">
                        <i class="fas fa-user-circle fs-1 text-secondary"></i>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Komentar Anda">
                    </div>
                    <div class="col-auto">
                        <div class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                    </div>
                </div>
            </form>
            <hr class="text-secondary">
            <div class="row">
                <div class="col-auto">
                    <i class="fas fa-user-circle fs-1 text-secondary"></i>
                </div>
                <div class="col">
                    <p class="align-items-center fw-bold">Anonymous</p>
                    <p>Parah Banget Jir</p>
                    <a href="">
                        <small>Suka</small>
                        <small>Balas</small>
                    </a>
                </div>
            </div>
            <hr class="text-secondary"> --}}

        </div>
        <div class="col-12 col-md-4">
            <h5 class="mb-3">Kabar Lainnya</h5>
            <div class="row gap-3">
                @foreach ($posts as $item)
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ Storage::url($item->image) }}" class="rounded-2" alt="" style="width: 160px;">
                        </div>
                        <div class="col">
                            <h6 class="fw-bold">{!! $item->title !!}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Livewire.on('setTitle', title => {
                    document.title = title;
                });
            });
        </script>

    </div>
    <div>