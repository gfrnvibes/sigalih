<div class="container py-4 py-md-5">

    <h3 class="fw-bold mb-4 text-center">Edit Profil</h3>

    <div class="card shadow-sm mx-auto" style="max-width: 960px;">
        <div class="card-body p-3 p-md-4">

            <form wire:submit.prevent="editProfil">
                {{-- ROW: Avatar + Upload --}}
                <div class="row g-4 align-items-center mb-4">
                    <div class="col-12 col-md-6 d-flex align-items-center gap-3">
                        @if (auth()->user()->avatar)
                            <div class="avatar">
                                <img src="{{ Storage::url(Auth::user()->avatar) }}" class="rounded-circle object-fit-cover"
                                    alt="Avatar" width="96" height="96">
                            </div>
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->warga->nama }}"
                                class="img-thumbnail rounded-circle" alt="Avatar" width="96" height="96">
                        @endif

                        <div class="min-w-0">
                            <h5 class="fw-bold mb-0 text-truncate">{{ auth()->user()->warga->nama }}</h5>
                            <small class="text-muted d-block text-truncate">{{ auth()->user()->email }}</small>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="avatar" class="form-label mb-2">Ubah Foto Profil</label>
                        <input id="avatar" type="file" class="form-control" wire:model="avatar" accept="image/*">
                        @error('avatar') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- ROW: Email --}}
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-12 col-md-4">
                        <label for="email" class="col-form-label">Email</label>
                    </div>
                    <div class="col-12 col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            wire:model="email" value="{{ auth()->user()->email }}" autocomplete="email">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- ROW: Phone --}}
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-12 col-md-4">
                        <label for="phone" class="col-form-label">No. Telepon</label>
                    </div>
                    <div class="col-12 col-md-8">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                            wire:model="phone" value="{{ auth()->user()->phone }}" autocomplete="tel">
                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="d-grid d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary fw-bold">Simpan Perubahan</button>
                </div>
            </form>

            {{-- Identitas --}}
            <div class="form-group mt-4">
                <label class="form-label text-uppercase fw-bold text-muted mb-2">Identitas Lengkap</label>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-2">
                        <tbody>
                            <tr>
                                <td class="w-25">NIK</td>
                                <td>{{ auth()->user()->warga->nik }}</td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td class="text-uppercase">{{ auth()->user()->warga->nama }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    Kp. {{ auth()->user()->warga->alamat }},
                                    RT. {{ auth()->user()->warga->rt }},
                                    RW. {{ auth()->user()->warga->rw }},
                                    Ds. {{ auth()->user()->warga->desa }},
                                    Kec. {{ auth()->user()->warga->kec }},
                                    Kab. {{ auth()->user()->warga->kab }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    @if (auth()->user()->warga->jk == 'L')
                                        Laki - laki
                                    @elseif (auth()->user()->warga->jk == 'P')
                                        Perempuan
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Status Perkawinan</td>
                                <td>{{ auth()->user()->warga->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="mb-0">Identitas salah? <a href="https://wa.me/6283116613308" target="_blank"
                            rel="noopener">Hubungi Admin.</a></p>
                </div>
            </div>

        </div>
    </div>
    <style></style>
</div>